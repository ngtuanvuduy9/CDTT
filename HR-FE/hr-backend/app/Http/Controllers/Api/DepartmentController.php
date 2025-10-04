<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    // Lấy danh sách phòng ban
    public function index()
    {
        $departments = Department::all();
        return response()->json(['data' => $departments], 200);
    }

    // Lấy 1 phòng ban theo id
    public function show($id)
    {
        $department = Department::find($id);
        if (!$department) {
            return response()->json(['message' => 'Phòng ban không tồn tại'], 404);
        }
        return response()->json(['data' => $department], 200);
    }

    // Thêm phòng ban
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $department = Department::create([
            'name' => $request->name
        ]);

        return response()->json(['message' => 'Thêm phòng ban thành công', 'data' => $department], 201);
    }

    // Cập nhật phòng ban
    public function update(Request $request, $id)
    {
        $department = Department::find($id);
        if (!$department) {
            return response()->json(['message' => 'Phòng ban không tồn tại'], 404);
        }

        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $department->update([
            'name' => $request->name
        ]);

        return response()->json(['message' => 'Cập nhật phòng ban thành công', 'data' => $department], 200);
    }

    // Xóa phòng ban
    public function destroy($id)
    {
        $department = Department::find($id);
        if (!$department) {
            return response()->json(['message' => 'Phòng ban không tồn tại'], 404);
        }

        $department->delete();
        return response()->json(['message' => 'Xóa phòng ban thành công'], 200);
    }
}
