<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infos', function (Blueprint $table) {
            $table->id();
            $table->string('mail')->nullable();
            $table->string('phone')->nullable();
            $table->string('telegram')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('behance')->nullable();
            $table->string('github')->nullable();
        });

        Schema::create('info_localizations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('info_id')->unsigned()->index();
            $table->foreign('info_id')->references('id')->on('infos')->onDelete('cascade');
            $table->string('lang', 2);
            $table->string('name')->nullable();
            $table->text('about')->nullable();
            $table->text('contact')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('info_localizations');
        Schema::dropIfExists('infos');

    }
}
