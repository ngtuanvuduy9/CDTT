<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::with(['department', 'position'])->paginate(10);
        return response()->json($employees);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'employee_code' => 'required|unique:employees',
            'fullname' => 'required|string|max:255',
            'cccd' => 'required|digits:12|unique:employees,cccd',
            'dob' => 'nullable|date',
            'gender' => 'nullable|in:Nam,Nữ,Khác',
            'education_level' => 'nullable|string|max:255',
            'email' => 'required|email|unique:employees,email',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'department_id' => 'nullable|exists:departments,id',
            'position_id' => 'nullable|exists:positions,id',
            'hired_date' => 'nullable|date',
            'salary' => 'nullable|numeric|min:0',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // <= xử lý upload file ảnh
        ]);

        // xử lý upload file ảnh nếu có
        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('employees', 'public');
        }

        $employee = Employee::create($data);

        return response()->json([
            'message' => 'Tạo nhân viên thành công',
            'employee' => $employee->load(['department', 'position'])
        ], 201);
    }

    public function show($id)
    {
        $employee = Employee::with(['department', 'position'])->findOrFail($id);
        return response()->json($employee);
    }

    public function update(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);

        $data = $request->validate([
            'employee_code' => 'required|unique:employees,employee_code,' . $id,
            'fullname' => 'required|string|max:255',
            'cccd' => 'required|digits:12|unique:employees,cccd,' . $id,
            'dob' => 'nullable|date',
            'gender' => 'nullable|in:Nam,Nữ,Khác',
            'education_level' => 'nullable|string|max:255',
            'email' => 'required|email|unique:employees,email,' . $id,
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'department_id' => 'nullable|exists:departments,id',
            'position_id' => 'nullable|exists:positions,id',
            'hired_date' => 'nullable|date',
            'salary' => 'nullable|numeric|min:0',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // nếu có ảnh mới, xóa ảnh cũ trước khi lưu
        if ($request->hasFile('photo')) {
            if ($employee->photo && Storage::disk('public')->exists($employee->photo)) {
                Storage::disk('public')->delete($employee->photo);
            }
            $data['photo'] = $request->file('photo')->store('employees', 'public');
        }

        $employee->update($data);

        return response()->json([
            'message' => 'Cập nhật nhân viên thành công',
            'employee' => $employee->load(['department', 'position'])
        ]);
    }

    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);

        // xóa ảnh cũ nếu có
        if ($employee->photo && Storage::disk('public')->exists($employee->photo)) {
            Storage::disk('public')->delete($employee->photo);
        }

        $employee->delete();

        return response()->json(['message' => 'Xóa nhân viên thành công']);
    }
}
