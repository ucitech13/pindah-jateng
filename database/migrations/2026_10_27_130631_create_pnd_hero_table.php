<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pnd_hero', function (Blueprint $table) {
            $table->increments('id');
            $table->string('judul', 255);
            $table->string('ribbon', 255);
            $table->text('deskripsi');
            $table->text('banner');
            $table->integer('created_by');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pnd_hero');
    }
};
