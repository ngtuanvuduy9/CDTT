<?php

namespace App\Http\Controllers\Api;

use App\Models\Employee;
use App\Http\Requests\EmployeeRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class EmployeeController extends Controller {

    /**
     * Lấy thông tin nhân viên đang đăng nhập (dùng cho FE dashboard)
     */
    public function me(Request $request)
    {
        $user = $request->user();
        if (!$user) {
            return response()->json(['message' => 'Chưa đăng nhập'], 401);
        }
        $employee = Employee::with(['department', 'position'])->find($user->id);
        if (!$employee) {
            return response()->json(['message' => 'Không tìm thấy nhân viên'], 404);
        }
        // Xử lý trường ảnh
        if ($employee->photo) {
            $employee->photo_url = asset('storage/' . $employee->photo);
        } else {
            $employee->photo_url = 'https://ui-avatars.com/api/?name=' . urlencode($employee->name) . '&size=150&background=007bff&color=ffffff&bold=true';
        }
        // Thêm các trường cần thiết cho dashboard
        $result = [
            'username' => $employee->username,
            'name' => $employee->name,
            'gender' => $employee->gender ?? '',
            'birth_date' => $employee->birth_date,
            'birth_place' => $employee->birth_place ?? '',
            'department' => $employee->department ? [
                'id' => $employee->department->id,
                'name' => $employee->department->name
            ] : null,
            'position' => $employee->position ? [
                'id' => $employee->position->id,
                'name' => $employee->position->name
            ] : null,
            'phone' => $employee->phone,
            'qualification' => $employee->qualification,
            'photo_url' => $employee->photo_url,
        ];
        return response()->json($result, 200);
    }
    /**
     * Lấy danh sách nhân viên kèm thông tin phòng ban và chức vụ
     */
    public function index()
    {
        // with(['department', 'position']) để eager load quan hệ
        $employees = Employee::with(['department', 'position'])->get();

        // Transform data để include full URL cho photo
        $employees = $employees->map(function ($employee) {
            if ($employee->photo) {
                $employee->photo_url = asset('storage/' . $employee->photo);
            } else {
                $employee->photo_url = 'https://ui-avatars.com/api/?name=' . urlencode($employee->name) . '&size=150&background=007bff&color=ffffff&bold=true';
            }
            return $employee;
        });

        return response()->json($employees, 200);
    }

    /**
     * Lấy thông tin 1 nhân viên
     */
    public function show($id)
    {
        $employee = Employee::with(['department', 'position'])->findOrFail($id);
        if ($employee->photo) {
            $employee->photo_url = asset('storage/' . $employee->photo);
        } else {
            $employee->photo_url = 'https://ui-avatars.com/api/?name=' . urlencode($employee->name) . '&size=150&background=007bff&color=ffffff&bold=true';
        }
        return response()->json($employee, 200);
    }

    /**
     * Thêm nhân viên
     */
    public function store(EmployeeRequest $request)
    {
        $data = $request->validated();
        if (isset($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        }
        $employee = Employee::create($data);
        // Trả luôn kèm quan hệ
        $employee->load(['department', 'position']);
        return response()->json($employee, 201);
    }

    /**
     * Cập nhật nhân viên
     */
    public function update(EmployeeRequest $request, $id)
    {
        $employee = Employee::findOrFail($id);
        $data = $request->validated();
        if (isset($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        }
        $employee->update($data);
        $employee->load(['department', 'position']);
        return response()->json($employee, 200);
    }

    /**
     * Xóa nhân viên
     */
    public function destroy($id)
    {
        Employee::destroy($id);
        return response()->json(null, 204);
    }

    /**
     * Upload ảnh nhân viên
     */
    public function uploadPhoto(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('employees', $filename, 'public');

            return response()->json([
                'success' => true,
                'photo_path' => $path,
                'photo_url' => asset('storage/' . $path)
            ], 200);
        }

        return response()->json(['success' => false, 'message' => 'No file uploaded'], 400);
    }
}
