<?php
namespace App\services;

use Kreait\Firebase\Auth;
use Kreait\Firebase\Storage;

class FirebaseService
{
    protected Auth $auth;
    protected Storage $storage;
    protected static string $bucketName;
    protected static string $firebaseHost;

    static public function initialize()
    {
        self::$bucketName = config('services.firebase.storage_bucket');
        self::$firebaseHost = config('services.firebase.host');
    }

    public function __construct()
    {
        $this->auth = app('firebase.auth');
        $this->storage = app('firebase.storage');
        self::initialize();
    }

    public function createUser(array $payload): bool|object
    {
        try {
            $userProperties = [
                'email' => $payload['email'],
                'password' => $payload['password'],
                'displayName' => $payload['user_name'] ?? null,
                'phoneNumber' => $payload['phone_number'] ?? null,
            ];

            return $this->auth->createUser($userProperties);
        } catch (\Exception $e) {
            return false;
        }
    }

    public function updateUserProfile(string $uid, array $data): bool
    {
        try {
            $user = $this->auth->getUser($uid);
            $updateAttributes = [];
            if (!empty($data['email']) && $data['email'] !== $user->email) {
                $updateAttributes['email'] = $data['email'];
            }

            if (!empty($data['password'])) {
                $updateAttributes['password'] = $data['password'];
            }

            if (!empty($data['user_name'])) {
                $updateAttributes['displayName'] = $data['user_name'];
            }

            if (!empty($data['avatar_link'])) {
                $updateAttributes['photoUrl'] = $data['avatar_link'];
            }
            if (!empty($updateAttributes)) {
                $this->auth->updateUser($uid, $updateAttributes);
            }
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function uploadFileToFirebase($file, $path)
    {
        try {
            $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
            $filePath = $path . '/' . $fileName;

            $bucket = $this->storage->getBucket(self::$bucketName);

            $bucket->upload(
                fopen($file->getRealPath(), 'r'),
                [
                    'name' => $filePath,
                    'predefinedAcl' => 'publicRead'
                ]
            );

            $url = self::$firebaseHost . '/v0/b/' . $bucket->name() . '/o/' . urlencode($filePath) . '?alt=media';

            return [
                'url' => $url,
                'path' => $filePath,
            ];
        } catch (\Exception $e) {
            return null;
        }
    }

    public function deleteFileFromFirebase($path)
    {
        try {
            if(empty($path)) {
                return false; // Không có đường dẫn
            }

            $bucket = $this->storage->getBucket(self::$bucketName);

            // Kiểm tra file có tồn tại không
            $object = $bucket->object($path);
            if ($object->exists()) {
                \Illuminate\Support\Facades\Log::warning('Deleting file from Firebase: ' . $path);
                $object->delete();
                return true; // Xoá thành công
            }

            return false; // Không tồn tại
        } catch (\Exception $e) {
            // Log lỗi nếu cần
            return false;
        }
    }

    public static function getFullLink($path): string
    {
        if(filter_var($path, FILTER_VALIDATE_URL)) return $path;
        self::initialize();
        return self::$firebaseHost . "/v0/b/" . self::$bucketName . "/o/" . urlencode($path) . '?alt=media' ;
    }
}
