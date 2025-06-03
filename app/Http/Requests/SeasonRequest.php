<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeasonRequest extends FormRequest
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
            'season_number' => 'required|integer|min:1',
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'release' => 'required|date',
            'poster_url' => 'nullable|string',
            'trailer_url' => 'nullable|string',
            'is_hot' => 'nullable|integer,0,1',
        ];
    }

    public function messages(): array
    {
        return [
            'season_number.required' => 'Mùa hiện tại là bắt buộc.',
            'season_number.integer' => 'Mùa hiện tại phải là số.',
            'season_number.min' => 'Mùa hiện tại phải là số nguyên dương.',
            'title.string' => 'Tên phim phải là chuỗi.',
            'title.max' => 'Tên phim không được vượt quá 255 ký tự.',
            'description.string' => 'Mô tả phải là chuỗi.',
            'release.required' => 'Ngày phát hành là bắt buộc.',
            'release.date' => 'Ngày phát hành không hợp lệ.',
            'poster_url.string' => 'URL poster không hợp lệ.',
            'trailer_url.string' => 'URL trailer không hợp lệ.',
            'is_hot.integer' => 'Trạng thái hot phải là số nguyên (0 hoặc 1).',
        ];
    }
}
