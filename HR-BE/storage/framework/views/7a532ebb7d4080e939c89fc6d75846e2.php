

<?php $__env->startSection('title', 'Quản lý Nhân viên'); ?>

<?php $__env->startSection('content'); ?>
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2><i class="fas fa-users"></i> Quản lý Nhân viên</h2>
        <a href="<?php echo e(route('admin.employees.create')); ?>" class="btn btn-primary">
            <i class="fas fa-plus"></i> Thêm nhân viên
        </a>
    </div>

    <div class="card shadow">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="table-primary">
                        <tr>
                            <th>ID</th>
                            <th>Tên</th>
                            <th>Email</th>
                            <th>Phòng ban</th>
                            <th>Chức vụ</th>
                            <th>Trạng thái</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td><?php echo e($employee->id); ?></td>
                                <td>
                                    <strong><?php echo e($employee->name); ?></strong>
                                    <br>
                                    <small class="text-muted"><?php echo e($employee->username); ?></small>
                                </td>
                                <td><?php echo e($employee->email); ?></td>
                                <td>
                                    <?php if($employee->department): ?>
                                        <span class="badge bg-info"><?php echo e($employee->department->name); ?></span>
                                    <?php else: ?>
                                        <span class="text-muted">Chưa phân công</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if($employee->position): ?>
                                        <span class="badge bg-success"><?php echo e($employee->position->name); ?></span>
                                    <?php else: ?>
                                        <span class="text-muted">Chưa có chức vụ</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php switch($employee->status):
                                        case ('active'): ?>
                                            <span class="badge bg-success">Hoạt động</span>
                                        <?php break; ?>

                                        <?php case ('inactive'): ?>
                                            <span class="badge bg-warning">Tạm nghỉ</span>
                                        <?php break; ?>

                                        <?php case ('terminated'): ?>
                                            <span class="badge bg-danger">Đã nghỉ việc</span>
                                        <?php break; ?>
                                    <?php endswitch; ?>
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="<?php echo e(route('admin.employees.show', $employee)); ?>"
                                            class="btn btn-info btn-sm">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="<?php echo e(route('admin.employees.edit', $employee)); ?>"
                                            class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="<?php echo e(route('admin.employees.destroy', $employee)); ?>" method="POST"
                                            class="d-inline"
                                            onsubmit="return confirm('Bạn có chắc chắn muốn xóa nhân viên này?')">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="7" class="text-center">Không có nhân viên nào</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\ChuyenDeThucTap\HR-BE\resources\views/admin/employees/index.blade.php ENDPATH**/ ?>