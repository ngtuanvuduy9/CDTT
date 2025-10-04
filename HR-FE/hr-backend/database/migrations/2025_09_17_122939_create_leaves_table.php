<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeavesTable extends Migration
{
    public function up()
    {
        Schema::create('leaves', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('type'); // Loại nghỉ (P = phép năm, KP = không phép...)
            $table->text('reason')->nullable(); // Lý do nghỉ
            $table->string('status')->default('Chờ duyệt'); // Trạng thái: Chờ duyệt, Đã duyệt, Từ chối
            $table->timestamps();

            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('leaves');
    }
}
