<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use PHPUnit\Framework\Attributes\After;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('posts', function (Blueprint $table) {   /* kalau perintah make:migration create akan schema nya akan create, 
                                                                    kalau table berarti dia memodifikasi table yang sudah ada(tabel posts) */
            $table->boolean('active')->after('content')->default(true);  //buka dokumentasi modifier ,,, ini menambah kolom setelah konten
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('active');
        });
    }
};
