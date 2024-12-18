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
        Schema::create('borrows', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('reader_id');
            $table->unsignedBigInteger('book_id');
            $table->date('borrow_date');
            $table->date('return_date');
            $table->boolean('status')->default(0); // 0: Đang mượn, 1: Đã trả
            $table->timestamps();
            $table->foreign('reader_id')->references('id')->on('readers');
            $table->foreign('book_id')->references('id')->on('books');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('borrows');
    }
};
