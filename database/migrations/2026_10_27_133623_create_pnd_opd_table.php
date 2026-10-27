<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pnd_opd', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_opd', 255);
            $table->unsignedSmallInteger('no_urut');
            $table->integer('created_by');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pnd_opd');
    }
};
