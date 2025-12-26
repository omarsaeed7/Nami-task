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
        Schema::create('work_times', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->double('hours', 8, 2);

            $table->foreignId('emp_id')
                ->constrained('employees')
                ->onDelete('cascade')
                ->onUpdate('cascade')
                ->name('work_times_ibfk_1');

            $table->foreignId('project_id')
                ->constrained('projects')
                ->onDelete('cascade')
                ->onUpdate('cascade')
                ->name('work_times_ibfk_2');

            $table->foreignId('module_id')
                ->constrained('modules')
                ->onDelete('cascade')
                ->onUpdate('cascade')
                ->name('work_times_ibfk_3');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('work_times');
    }
};
