<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EpisodeRequest extends FormRequest
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
            'episode_number' => 'required|integer|min:1',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'release' => 'required|date',
            'duration' => 'required|integer',
            'poster_url' => 'nullable|string',
            'trailer_url' => 'nullable|string',
        ];
    }

    public function messages(): array
    {
        return [
            'episode_number.required' => 'Tập hiện tại là bắt buộc.',
            'episode_number.integer' => 'Tập hiện tại phải là số.',
            'episode_number.min' => 'Tập hiện tại phải là số nguyên dương.',
            'title.required' => "Tên phim là bắt buộc.",
            'title.string' => 'Tên phim phải là chuỗi.',
            'title.max' => 'Tên phim không được vượt quá 255 ký tự.',
            'description.string' => 'Mô tả phải là chuỗi.',
            'release.required' => 'Ngày phát hành là bắt buộc.',
            'release.date' => 'Ngày phát hành không hợp lệ.',
            'poster_url.string' => 'URL poster không hợp lệ.',
            'trailer_url.string' => 'URL trailer không hợp lệ.',
        ];
    }
}
