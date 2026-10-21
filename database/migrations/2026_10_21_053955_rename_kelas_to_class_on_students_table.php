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
        if (Schema::hasColumn('students', 'kelas') && ! Schema::hasColumn('students', 'class')) {
            Schema::table('students', function (Blueprint $table) {
                $table->renameColumn('kelas', 'class');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('students', 'class') && ! Schema::hasColumn('students', 'kelas')) {
            Schema::table('students', function (Blueprint $table) {
                $table->renameColumn('class', 'kelas');
            });
        }
    }
};
