<?php
namespace App\Traits;

use Illuminate\Database\Eloquent\Model;

trait HasStatusTrait
{
    /**
     * Hàm thay đổi trạng thái của model
     *
     * @param  Model $model
     * @param  string $status
     * @return \Illuminate\Http\JsonResponse
     */
    public function changeStatus(Model $model, $status)
    {
        try {
            $model->status = $status;
            $model->save();

            return response()->json([
                'success' => true,
                'message' => 'Trạng thái đã được cập nhật.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Không thể cập nhật trạng thái.'
            ], 500);
        }
    }
}
