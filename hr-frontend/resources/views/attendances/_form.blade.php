@csrf
<div class="mb-3">
    <label for="employee_id" class="form-label">Nhân viên</label>
    <select name="employee_id" id="employee_id" class="form-control" required>
        <option value="">-- Chọn nhân viên --</option>
        @foreach($employees as $emp)
            <option value="{{ $emp->id }}" {{ (isset($attendance) && $attendance->employee_id == $emp->id) || old('employee_id') == $emp->id ? 'selected' : '' }}>
                {{ $emp->fullname }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label for="date" class="form-label">Ngày</label>
    <input type="date" name="date" class="form-control" value="{{ $attendance->date ?? old('date') }}" required>
</div>

<div class="mb-3">
    <label for="status" class="form-label">Trạng thái</label>
    <select name="status" class="form-control" required>
        @foreach(['Có mặt', 'Nghỉ', 'Đi muộn', 'Vắng'] as $status)
            <option value="{{ $status }}" {{ (isset($attendance) && $attendance->status == $status) || old('status') == $status ? 'selected' : '' }}>
                {{ $status }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label for="check_in" class="form-label">Giờ vào</label>
    <input type="time" name="check_in" class="form-control" value="{{ $attendance->check_in ?? old('check_in') }}">
</div>

<div class="mb-3">
    <label for="check_out" class="form-label">Giờ ra</label>
    <input type="time" name="check_out" class="form-control" value="{{ $attendance->check_out ?? old('check_out') }}">
</div>

<div class="mb-3">
    <label for="note" class="form-label">Ghi chú</label>
    <textarea name="note" class="form-control">{{ $attendance->note ?? old('note') }}</textarea>
</div>

<button type="submit" class="btn btn-success">Lưu</button>
<a href="{{ route('attendances.index') }}" class="btn btn-secondary">Quay lại</a>