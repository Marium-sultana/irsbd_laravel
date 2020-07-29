<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIrsMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('irs_members', function (Blueprint $table) {
            $table->increments('id');
            $table->string('member_name');
            $table->string('member_designation');
            $table->string('member_image');
            $table->integer('member_contact_no');
            $table->string('member_email');
            $table->string('member_profile_link', 10000);
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
        Schema::dropIfExists('irs_members');
    }
}
