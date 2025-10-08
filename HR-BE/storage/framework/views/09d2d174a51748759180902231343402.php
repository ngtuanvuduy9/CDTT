

<?php $__env->startSection('title', 'Sửa Phòng ban'); ?>

<?php $__env->startSection('content'); ?>
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2><i class="fas fa-building"></i> Sửa Phòng ban: <?php echo e($department->name); ?></h2>
        <a href="<?php echo e(route('admin.departments.index')); ?>" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Quay lại
        </a>
    </div>

    <div class="card shadow">
        <div class="card-body">
            <?php if($errors->any()): ?>
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form action="<?php echo e(route('admin.departments.update', $department)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                <div class="mb-3">
                    <label for="name" class="form-label">Tên phòng ban <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="name" name="name"
                        value="<?php echo e(old('name', $department->name)); ?>" required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Mô tả</label>
                    <textarea class="form-control" id="description" name="description" rows="4"><?php echo e(old('description', $department->description)); ?></textarea>
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label">Trạng thái <span class="text-danger">*</span></label>
                    <select class="form-select" id="status" name="status" required>
                        <option value="">Chọn trạng thái</option>
                        <option value="active" <?php echo e(old('status', $department->status) === 'active' ? 'selected' : ''); ?>>Hoạt
                            động</option>
                        <option value="inactive" <?php echo e(old('status', $department->status) === 'inactive' ? 'selected' : ''); ?>>
                            Không hoạt động</option>
                    </select>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Cập nhật
                    </button>
                    <a href="<?php echo e(route('admin.departments.index')); ?>" class="btn btn-secondary">
                        <i class="fas fa-times"></i> Hủy
                    </a>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\ChuyenDeThucTap\HR-BE\resources\views/admin/departments/edit.blade.php ENDPATH**/ ?>