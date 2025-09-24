<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Cho phép request này chạy
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email,' . $this->id,
            'phone' => 'nullable|string|max:15',
            'department_id' => 'required|exists:departments,id',
            'position_id' => 'required|exists:positions,id',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Tên nhân viên là bắt buộc',
            'email.required' => 'Email là bắt buộc',
            'email.email' => 'Email không hợp lệ',
            'email.unique' => 'Email đã tồn tại',
            'department_id.required' => 'Vui lòng chọn phòng ban',
            'department_id.exists' => 'Phòng ban không tồn tại',
            'position_id.required' => 'Vui lòng chọn chức vụ',
            'position_id.exists' => 'Chức vụ không tồn tại',
            'photo.image' => 'Ảnh không hợp lệ',
            'photo.mimes' => 'Ảnh phải là jpg, jpeg hoặc png',
            'photo.max' => 'Ảnh tối đa 2MB',
        ];
    }
}
