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
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone', 20)->nullable();
            $table->string('school_name', 150)->nullable();
            $table->string('province', 100)->nullable();
            $table->string('school_type', 20)->nullable();
            $table->string('class_level', 20)->nullable();
            $table->string('major', 100)->nullable();
            $table->string('role', 20)->default('student');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'phone',
                'school_name',
                'province',
                'school_type',
                'class_level',
                'major',
                'role',
            ]);
        });
    }
};