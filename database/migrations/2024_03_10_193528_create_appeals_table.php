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
        Schema::create('appeals', function (Blueprint $table) {
            $table->id();
            $table->string('fio');
            $table->bigInteger('hudud_id');
            $table->bigInteger('tuman_id');
            $table->string('manzil');
            $table->string('email');
            $table->string('tel');
            $table->string('tad');
            $table->string('tadname')->nullable();
            $table->string('jins');
            $table->date('tugilgan');
            $table->date('maqom');
            $table->date('files');
            $table->date('xizmat');
            $table->date('vitext');
            $table->string('status')->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appeals');
    }
};
