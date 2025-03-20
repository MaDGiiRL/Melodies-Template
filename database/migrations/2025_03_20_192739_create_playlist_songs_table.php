<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('playlist_songs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('playlist_id')->constrained()->onDelete('cascade');
            $table->string('song_name');
            $table->string('artist_name');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('playlist_songs');
    }
};
