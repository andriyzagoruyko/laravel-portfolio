<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterProjectsTableCreateLangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn('image');
            $table->dropColumn('name');
            $table->dropColumn('description');
        });

        Schema::create('project_localizations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('project_id')->unsigned()->index();
            $table->string('lang', 2);
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_localizations');
        Schema::table('projects', function (Blueprint $table) {
            $table->string('name', 60);
            $table->text('description')->nullable();
        });

    }
}
