<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'user_name' => 'string|max:255',
            'email' => 'string|email|max:255',
            'phone_number' => 'numeric|digits:10',
            'password' => 'string|min:6',
            'birthday' => 'date',
            'avatar_link' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'user_name.string' => 'Tên người dùng phải là chuỗi.',
            'user_name.max' => 'Tên người dùng không được vượt quá 255 ký tự.',
            'email.string' => 'Email phải là chuỗi.',
            'email.email' => 'Email không hợp lệ.',
            'email.max' => 'Email không được vượt quá 255 ký tự.',
            'phone_number.numeric' => 'Số điện thoại phải số.',
            'phone_number.digits' => 'Số điện thoại không được vượt quá 10 ký tự.',
            'password.string' => 'Mật khẩu phải là chuỗi.',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự.',
            'birthday.date' => 'Ngày sinh phải đúng định dạng ngày.',
            'avatar_link.image' => 'File tải lên phải là hình ảnh.',
            'avatar_link.mimes' => 'Ảnh phải có định dạng: jpeg, png, jpg, gif.',
            'avatar_link.max' => 'Kích thước ảnh tối đa là 2MB.',
        ];
    }

}
