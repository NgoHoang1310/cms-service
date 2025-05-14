<?php

namespace App\Http\Controllers;

use App\Services\FirebaseService;
use App\Services\Queue\Producers\VideoProducer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FileController extends Controller
{
    protected FirebaseService $firebaseService;
    protected VideoProducer $videoProducer;

    public function __construct(FirebaseService $firebaseService, VideoProducer $videoProducer)
    {
        $this->firebaseService = $firebaseService;
        $this->videoProducer = $videoProducer;
    }

    public function upload(Request $request)
    {
        try {
            $path = $request->query('path');
            $file = $request->file('file');
            if (!$path) {
                return response()->json(['error' => 'Path is required'], 400);
            }

            $path = $this->firebaseService->uploadFile($file, $path);
            return response()->json(['id' => $path['path']], 200);

        } catch (\Exception $e) {
            return response()->json(['error' => 'File upload failed: ' . $e->getMessage()], 500);
        }

    }

    public function uploadTemp(Request $request)
    {
        try {
            $request->validate([
                'file' => 'required|file|max:5242880', // Max size 5GB
            ]);
            $path = $request->query('path');
            $file = $request->file('file');
            $uuid = Str::uuid()->toString();
            $tempPath = 'temp/' . $path . '/' . $uuid;
            $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();
            $fileName = Str::slug($originalName)  . '.' . $extension;
            $file->storeAs($tempPath, $fileName);

            return response()->json([
                'message' => 'Upload thành công',
                'temp_path' => $tempPath . '/' . $fileName,
                'file_name' => $fileName,
            ], 200);
        }catch (\Exception $e) {
            return response()->json(['error' => 'File upload temp failed: ' . $e->getMessage()], 500);
        }
    }

    public function delete(Request $request)
    {
        try {
            $content = json_decode($request->getContent(), true);

            if (!isset($content['id'])) {
                return response()->json(['error' => 'File ID is required'], 400);
            }

            $fileId = $content['id'];

            $this->firebaseService->deleteFile($fileId);

            return response()->json(['message' => 'File deleted: ' . $fileId], 200);
        }catch (\Exception $e) {
            return response()->json(['error' => 'File deletion failed: ' . $e->getMessage()], 500);
        }
    }

    public function deleteTemp(Request $request)
    {
        try {
            // Lấy path tương đối từ client gửi lên (từ temp_path đã lưu)
            $content = json_decode($request->getContent(), true); // FilePond gửi nội dung thô (raw body), không JSON

            if (!isset($content['id'])) {
                return response()->json(['error' => 'Không tìm thấy đường dẫn tệp'], 400);
            }

            // Xóa file
            if (Storage::exists($content['id'])) {
                Storage::delete($content['id']);

                // Nếu thư mục cha trống thì cũng có thể xóa luôn
                $directory = dirname($content['id']);
                if (empty(Storage::files($directory))) {
                    Storage::deleteDirectory($directory);
                }

                return response()->json(['message' => 'File đã được xóa']);
            }

            return response()->json(['error' => 'File không tồn tại'], 404);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Xóa file thất bại: ' . $e->getMessage()
            ], 500);
        }
    }

    public function deleteVideoS3(Request $request)
    {
        try {
            $content = json_decode($request->getContent(), true);
            $this->videoProducer->processVideo([
                'id' => $content['id'],
                'uuid' => $content['uuid'],
                'content_type' => $content['content_type'],
            ], VideoProducer::PROCESSING_TYPE_REVERT);
            return response()->json(['message' => 'Xóa video thành công'], 200);
        }catch (\Exception $e) {
            return response()->json(['error' => 'Xóa video thất bại: ' . $e->getMessage()], 500);
        }
    }
}
