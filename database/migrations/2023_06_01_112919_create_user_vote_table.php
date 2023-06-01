<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_vote', function (Blueprint $table) {
            $table->primary(['user_id', 'idea_id']);
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('idea_id');
            $table->timestamps();

            $table->foreign('idea_id')
                ->on('ideas')
                ->references('id')
                ->onDelete('cascade');

            $table->foreign('user_id')
                ->on('users')
                ->references('id')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_vote');
    }
};
