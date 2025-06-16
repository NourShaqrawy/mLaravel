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
        Schema::create('categories', 
        function (Blueprint $table) {
            
            $table->id(); //create id column

           

            $table->string('name', 50)->unique(); //)  والهدف من اليونك هو عدم تكرار اسماء الفئات(varchar) حقل الاسم مع نوع البيانات المخزنة فيه 

            $table->string('slug',50)->unique();// )(تاخذ نسخة عن الاسم)...تسهل عملية البحث عن طريق الاسم وذلك بحذف الاحرف الخاصة مثل المسافة و

            // $table->unsignedBigInteger('parent_id')->nullable();//parent of categories such web(parent) => laravel(chield)

            // $table->foreign('parent_id')
            //             ->references('id')
            //                  ->on('categories')
            //                        ->nullonDelete();//null عند حذف الاب ستصبح قيمة الابناء 
           

            $table->foreignID('parent_id')
            ->nullable()
            ->constrained('categories','id')
            ->nullOnDelete();

            $table->string('description')->nullable();

            $table->string('art_path')->nullable();//store path Image
            //ببعض الاحيان نحتاج لتخزين الصور وليس المسارات عندما تكون البيانات حساسة

             $table->timestamps();//من اجل تخزين تاريخ تعديل كل قيمة

             // php artisan migrate لتنفيذ هذا الكود نكتب في التيرميتال الامر التالي 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //Schema::dropIfExists('table');('categories');//roolback تستخدم عند تنفيذ 
    }
};
