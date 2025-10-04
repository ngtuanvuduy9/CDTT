@csrf
<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label">Mã NV</label>
        <input type="text" name="employee_code" value="{{ old('employee_code', $employee->employee_code ?? '') }}"
            class="form-control" required>
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Họ tên</label>
        <input type="text" name="fullname" value="{{ old('fullname', $employee->fullname ?? '') }}" class="form-control"
            required>
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">CCCD</label>
        <input type="text" name="cccd" maxlength="12" value="{{ old('cccd', $employee->cccd ?? '') }}"
            class="form-control" required>
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Ngày sinh</label>
        <input type="date" name="dob"
            value="{{ old('dob', isset($employee->dob) ? \Carbon\Carbon::parse($employee->dob)->format('Y-m-d') : '') }}"
            class="form-control">
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Giới tính</label>
        <select name="gender" class="form-select" required>
            <option value="">-- Chọn giới tính --</option>
            <option value="Nam" {{ old('gender', $employee->gender ?? '') == 'Nam' ? 'selected' : '' }}>Nam</option>
            <option value="Nữ" {{ old('gender', $employee->gender ?? '') == 'Nữ' ? 'selected' : '' }}>Nữ</option>
            <option value="Khác" {{ old('gender', $employee->gender ?? '') == 'Khác' ? 'selected' : '' }}>Khác</option>
        </select>
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Trình độ</label>
        <input type="text" name="education_level" value="{{ old('education_level', $employee->education_level ?? '') }}"
            class="form-control">
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" value="{{ old('email', $employee->email ?? '') }}" class="form-control"
            required>
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">SĐT</label>
        <input type="text" name="phone" value="{{ old('phone', $employee->phone ?? '') }}" class="form-control">
    </div>

    <div class="col-md-12 mb-3">
        <label class="form-label">Địa chỉ</label>
        <textarea name="address" rows="2" class="form-control">{{ old('address', $employee->address ?? '') }}</textarea>
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Phòng ban</label>
        <select name="department_id" class="form-select" required>
            <option value="">-- Chọn phòng ban --</option>
            @foreach ($departments as $dep)
                <option value="{{ $dep->id }}" {{ old('department_id', $employee->department_id ?? '') == $dep->id ? 'selected' : '' }}>
                    {{ $dep->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Vị trí</label>
        <select name="position_id" class="form-select" required>
            <option value="">-- Chọn vị trí --</option>
            @foreach ($positions as $pos)
                <option value="{{ $pos->id }}" {{ old('position_id', $employee->position_id ?? '') == $pos->id ? 'selected' : '' }}>
                    {{ $pos->title }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Ngày vào làm</label>
        <input type="date" name="hired_date"
            value="{{ old('hired_date', isset($employee->hired_date) ? \Carbon\Carbon::parse($employee->hired_date)->format('Y-m-d') : '') }}"
            class="form-control">
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Lương</label>
        <input type="number" step="0.01" name="salary" value="{{ old('salary', $employee->salary ?? 0) }}"
            class="form-control">
    </div>

    <div class="col-md-12 mb-3">
        <label class="form-label">Ảnh đại diện</label>
        <input type="file" name="photo" class="form-control">
        @if (!empty($employee->photo))
            <div class="mt-2">
                <img src="{{ asset('storage/employees/' . $employee->photo) }}" width="80" class="rounded shadow">
            </div>
        @endif
    </div>
</div>

<button type="submit" class="btn btn-primary">
    <i class="fas fa-save"></i> Lưu
</button>
<a href="{{ route('employees.index') }}" class="btn btn-secondary">Quay lại</a>