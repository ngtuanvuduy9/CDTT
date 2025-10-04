<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index()
    {
        $attendances = Attendance::with('employee')->get();
        return response()->json(['data' => $attendances], 200);
    }

    public function show($id)
    {
        $attendance = Attendance::with('employee')->find($id);
        if (!$attendance) {
            return response()->json(['message' => 'Chấm công không tồn tại'], 404);
        }
        return response()->json(['data' => $attendance], 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'date' => 'required|date',
            'status' => 'required|in:Có mặt,Nghỉ,Đi muộn,Vắng',
            'check_in' => 'nullable|date_format:H:i',
            'check_out' => 'nullable|date_format:H:i',
            'note' => 'nullable|string',
        ]);

        $attendance = Attendance::create($validated);

        return response()->json(['message' => 'Thêm chấm công thành công', 'data' => $attendance], 201);
    }

    public function update(Request $request, $id)
    {
        $attendance = Attendance::find($id);
        if (!$attendance) {
            return response()->json(['message' => 'Chấm công không tồn tại'], 404);
        }

        $validated = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'date' => 'required|date',
            'status' => 'required|in:Có mặt,Nghỉ,Đi muộn,Vắng',
            'check_in' => 'nullable|date_format:H:i',
            'check_out' => 'nullable|date_format:H:i',
            'note' => 'nullable|string',
        ]);

        $attendance->update($validated);

        return response()->json(['message' => 'Cập nhật chấm công thành công', 'data' => $attendance], 200);
    }

    public function destroy($id)
    {
        $attendance = Attendance::find($id);
        if (!$attendance) {
            return response()->json(['message' => 'Chấm công không tồn tại'], 404);
        }

        $attendance->delete();
        return response()->json(['message' => 'Xóa chấm công thành công'], 200);
    }
}
