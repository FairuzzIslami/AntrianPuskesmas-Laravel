<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Tambahkan kolom poli (boleh null karena tidak semua user dokter)
            if (!Schema::hasColumn('users', 'poli')) {
                $table->string('poli')->nullable()->after('role');
            }

            // Tambahkan juga status_antrian jika belum ada
            if (!Schema::hasColumn('users', 'status_antrian')) {
                $table->string('status_antrian')->nullable()->after('poli');
            }
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'poli')) {
                $table->dropColumn('poli');
            }
            if (Schema::hasColumn('users', 'status_antrian')) {
                $table->dropColumn('status_antrian');
            }
        });
    }
};
