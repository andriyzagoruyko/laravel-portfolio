<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configs', function (Blueprint $table) {
            $table->id();
        });

        Schema::create('config_localizations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('config_id')->unsigned()->index();
            $table->string('lang', 2);
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('h1')->nullable();
            $table->foreign('config_id')->references('id')->on('configs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('config_localizations');
        Schema::dropIfExists('configs');
    }
}
