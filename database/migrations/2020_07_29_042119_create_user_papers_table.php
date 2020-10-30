<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPapersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_papers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('paper_title');
            $table->string('author_name');
            $table->integer('user_id')->unsigned(); 
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('file_location');
            $table->text('abstract');
            $table->tinyInteger('status');
            $table->string('review')->nullable();
            $table->text('text')->nullable();
            $table->string('manuscript_type');
            $table->string('subject_area');
            $table->string('suggested_reviewer');
            $table->string('cover_letter');
            $table->string('agreement_letter');
            $table->string('other_files');
            $table->string('user_email');
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
        Schema::dropIfExists('user_papers');
    }
}
