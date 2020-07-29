<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUploadedPapersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uploaded_papers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('paper_title');
            $table->string('author_name');
            $table->text('abstract');
            $table->integer('issue_id')->unsigned(); 
            $table->foreign('issue_id')->references('id')->on('issues');
            $table->string('file_location');
            $table->tinyInteger('status');
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
        Schema::dropIfExists('uploaded_papers');
    }
}
