<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeriesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'release' => 'required|date',
            'duration' => 'required|integer',
            'actors' => 'nullable|string',
            'directors' => 'nullable|string',
            'categories' => 'required|array',
            'categories.*' => 'integer',
            'genres' => 'required|array',
            'genres.*' => 'integer',
            'country' => 'nullable|string',
            'poster_url' => 'nullable|string',
            'trailer_url' => 'nullable|string',
            'backdrop_url' => 'nullable|string',
            'rating' => 'nullable|numeric|min:0|max:5',
            'is_hot' => 'nullable|integer,0,1',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Tên phim là bắt buộc.',
            'title.string' => 'Tên phim phải là chuỗi.',
            'title.max' => 'Tên phim không được vượt quá 255 ký tự.',
            'description.string' => 'Mô tả phải là chuỗi.',
            'release.required' => 'Ngày phát hành là bắt buộc.',
            'release.date' => 'Ngày phát hành không hợp lệ.',
            'duration.required' => 'Thời gian là bắt buộc.',
            'duration.integer' => 'Thời gian phải là số nguyên.',
            'actors.string' => 'Diễn viên phải là chuỗi.',
            'directors.string' => 'Đạo diễn phải là chuỗi.',
            'categories.required' => 'Danh mục là bắt buộc.',
            'genres.required' => 'Thể loại là bắt buộc.',
            'poster_url.string' => 'URL poster không hợp lệ.',
            'trailer_url.string' => 'URL trailer không hợp lệ.',
            'backdrop_url.string' => 'URL backdrop không hợp lệ.',
            'rating.numeric' => 'Đánh giá phải là số.',
            'rating.min' => 'Đánh giá không được nhỏ hơn 0.',
            'rating.max' => 'Đánh giá không được lớn hơn 5.',
            'is_hot.integer' => 'Trạng thái hot phải là số nguyên (0 hoặc 1).',
        ];
    }
}
