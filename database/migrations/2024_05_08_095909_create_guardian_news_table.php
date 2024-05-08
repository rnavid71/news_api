<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guardian_news', function (Blueprint $table) {
            $table->id();
            $table->string('news_id');
            $table->string('title');
            $table->string('type');
            $table->string('section_id');
            $table->string('section_name');
            $table->string('url');
            $table->timestamp('published_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('guaridan_news');
    }
};
