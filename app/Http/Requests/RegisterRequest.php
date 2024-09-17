<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * true: cho phép request được chuyển tiếp tới ứng dụng
     * false: request không được phép gửi đến hệ thống thay vào đó trả về response lỗi
     * đặt các kiểm tra xác thực và ủy quyền với người dùng hoặc các logic khác để kiểm
     * tra xem request có được chuyển tiếp đến controller hay không
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ];
    }
}
