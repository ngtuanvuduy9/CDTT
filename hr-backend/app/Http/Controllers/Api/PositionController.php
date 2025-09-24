<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    // Lấy danh sách vị trí
    public function index()
    {
        $positions = Position::all();
        return response()->json(['data' => $positions], 200);
    }

    // Lấy 1 vị trí theo id
    public function show($id)
    {
        $position = Position::find($id);
        if (!$position) {
            return response()->json(['message' => 'Vị trí không tồn tại'], 404);
        }
        return response()->json(['data' => $position], 200);
    }

    // Thêm vị trí
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255'
        ]);

        $position = Position::create([
            'title' => $request->title
        ]);

        return response()->json(['message' => 'Thêm vị trí thành công', 'data' => $position], 201);
    }

    // Cập nhật vị trí
    public function update(Request $request, $id)
    {
        $position = Position::find($id);
        if (!$position) {
            return response()->json(['message' => 'Vị trí không tồn tại'], 404);
        }

        $request->validate([
            'title' => 'required|string|max:255'
        ]);

        $position->update([
            'title' => $request->title
        ]);

        return response()->json(['message' => 'Cập nhật vị trí thành công', 'data' => $position], 200);
    }

    // Xóa vị trí
    public function destroy($id)
    {
        $position = Position::find($id);
        if (!$position) {
            return response()->json(['message' => 'Vị trí không tồn tại'], 404);
        }

        $position->delete();
        return response()->json(['message' => 'Xóa vị trí thành công'], 200);
    }
}
