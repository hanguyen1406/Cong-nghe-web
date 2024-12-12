<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //bài 1
        Schema::create('medicines', function (Blueprint $table) {
            $table->id();
            $table->string('name',255);//tên thuốc
            $table->string('brand',100);//thương hiệu
            $table->string('dosage',150);//thông tin liều lượng
            $table->string('form',50);//dạng viên thuốc
            $table->float('price',10,2);//giá trên 1 đơn vị thuốc
            $table->integer('stoke');//số lượng tồn trong kho
            $table->timestamps();
        });
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('medicine_id');
            $table->foreign('medicine_id')
                ->references('id')
                ->on('medicines')
                ->onDelete('cascade');
            $table->integer('quantity');
            $table->dateTime('sale_date');
            $table->string('customer_phone', 10);
            $table->timestamps();
        });

        //bài 2
        Schema::create('classes', function (Blueprint $table) {
            $table->id();
            $table->enum('grade_level', ['Pre-K', 'Kindergarten']);
            $table->string('room_number', 10);
            $table->timestamps();
        });

        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->date('date_of_birth');
            $table->string('parent_phone', 20);
            $table->unsignedBigInteger('class_id');
            $table->foreign('class_id')->references('id')->on('classes')->onDelete('cascade');
            $table->timestamps();
        });

        //bài 3
        Schema::create('computers', function (Blueprint $table) {
            $table->id();
            $table->string('computer_name', 50);
            $table->string('model', 100);
            $table->string('operating_system', 50);
            $table->string('processor', 50);
            $table->integer('memory');
            $table->boolean('available')->default(true);
            $table->timestamps();
        });

        Schema::create('issues', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('computer_id');
            $table->foreign('computer_id')->references('id')->on('computers')->onDelete('cascade');
            $table->string('reported_by', 50)->nullable();
            $table->dateTime('reported_date');
            $table->text('description');
            $table->enum('urgency', ['Low', 'Medium', 'High']);
            $table->enum('status', ['Open', 'In Progress', 'Resolved']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('issues');
        Schema::dropIfExists('computers');
        Schema::dropIfExists('students');
        Schema::dropIfExists('classes');
        Schema::dropIfExists('medicines');
        Schema::dropIfExists('sales');
    }
};
