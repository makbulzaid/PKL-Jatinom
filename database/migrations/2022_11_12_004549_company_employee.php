<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // public function up()
    // {
    //     Schema::create('company_employee', function (Blueprint $table) {
    //         $table->id();
    //         $table -> foreignId('employee_id')->constrained('employees')->cascadeOnDelete();
    //         $table -> foreignId('company_id')->constrained('companies')->cascadeOnDelete();
    //         $table->timestamps();
    //     });
    // }
    public function up()
    {
        Schema::create('company_employee', function (Blueprint $table) {
            $table->id();
            $table -> foreignId('employee_id')->constrained()->onDelete('cascade');
            $table -> foreignId('company_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_employee');
    }
};
