<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone', 20)->after('name');
            $table->string('school_name', 150)->after('phone');
            $table->string('province', 100)->after('school_name');
            $table->enum('school_type', ['SMA', 'SMK', 'MA', 'MAK'])->after('province');
            $table->enum('class_level', ['X', 'XI', 'XII'])->after('school_type');
            $table->string('major', 100)->after('class_level');
            $table->string('role')->default('student')->after('major');
        });
    }

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