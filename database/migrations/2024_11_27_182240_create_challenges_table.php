<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::create('challenges', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->datetime('challenge_date'); // Combined date and time
        $table->integer('total_participants')->nullable();
        $table->text('amount')->nullable();
        // $table->integer('charity_id')->nullable(); // Regular integer without foreign key constraint
        $table->string('social_links')->nullable();
        $table->longText('description')->nullable();
        $table->longText('rules')->nullable();
        $table->longText('encouragement')->nullable();
        $table->string('photo_path')->nullable();
        $table->string('video_path')->nullable();
        $table->foreignId('user_id')->constrained()->cascadeOnDelete();
        $table->softDeletes();
        $table->timestamps();
    });
}

    public function down()
    {
        Schema::dropIfExists('challenges');
    }
};
