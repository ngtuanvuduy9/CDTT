<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('employee_code')->unique(); // Mã NV
            $table->string('fullname'); // Họ tên
            $table->string('cccd', 12)->unique(); // CCCD
            $table->date('dob')->nullable(); // Ngày sinh
            $table->enum('gender', ['Nam', 'Nữ']); // Giới tính
            $table->string('education_level')->nullable(); // Trình độ          
            $table->string('email', 100)->unique();
            $table->string('phone', 20)->nullable();
            $table->string('address')->nullable();
            $table->foreignId('department_id')->constrained()->onDelete('cascade');
            $table->foreignId('position_id')->constrained()->onDelete('cascade');
            $table->date('hired_date')->nullable(); // ngày vào làm
            $table->decimal('salary', 15, 2)->default(0);
            $table->string('photo')->nullable(); // ảnh đại diện
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
