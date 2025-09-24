<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
public function index(Request $request)
{
    $query = Project::query();

    if ($request->filled('status')) {
        $query->where('status', $request->status);
    }

    if ($request->filled('keyword')) {
        $query->where('name', 'like', '%' . $request->keyword . '%');
    }

    $projects = $query->orderBy('created_at', 'desc')->paginate(10);

    return response()->json($projects);
}
    
public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'start_date' => 'required|date',
        'end_date' => 'nullable|date|after_or_equal:start_date',
        'status' => 'required|string',
        'budget' => 'nullable|numeric',
        'employee_ids' => 'nullable|array',
        'employee_ids.*' => 'exists:employees,id',
    ]);

    $data = collect($validated)->except('employee_ids')->toArray();
    $project = Project::create($data);

    if (!empty($validated['employee_ids'])) {
        $project->employees()->attach($validated['employee_ids']);
    }

    return response()->json([
        'message' => 'Tạo dự án thành công',
        'data' => $project->load('employees')
    ], 201);
}
    public function show($id)
    {
        $project = Project::with('employees')->find($id);
        if (!$project) {
            return response()->json(['message' => 'Không tìm thấy'], 404);
        }
        return response()->json(['data' => $project]);
    }

public function update(Request $request, $id)
{
    $project = Project::find($id);
    if (!$project) {
        return response()->json(['message' => 'Không tìm thấy dự án'], 404);
    }

    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'start_date' => 'required|date',
        'end_date' => 'nullable|date|after_or_equal:start_date',
        'status' => 'required|string',
        'budget' => 'nullable|numeric',
        'employee_ids' => 'nullable|array',
        'employee_ids.*' => 'exists:employees,id',
    ]);

    $data = collect($validated)->except('employee_ids')->toArray();
    $project->update($data);

    if (isset($validated['employee_ids'])) {
        $project->employees()->sync($validated['employee_ids']);
    }

    return response()->json([
        'message' => 'Cập nhật dự án thành công',
        'data' => $project->load('employees')
    ]);
}

    public function destroy($id)
    {
        $project = Project::find($id);
        if (!$project) {
            return redirect()->route('projects.index')->with('error', 'Không tìm thấy dự án');
        }

        $project->delete();
        return redirect()->route('projects.index')->with('success', 'Xóa dự án thành công');
    }
}
