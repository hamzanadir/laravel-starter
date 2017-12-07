<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');
	        $table->string('first_name')->nullable();
	        $table->string('last_name')->nullable();
	        $table->string('job')->nullable();
	        $table->text('bio')->nullable();
	        $table->string('phone')->nullable();
	        $table->text('address')->nullable();
	        $table->string('city')->nullable();
	        $table->string('country')->nullable();
	        $table->date('birth_day')->nullable();
	        $table->string('zip_code')->nullable();
	        $table->string('avatar_path')->nullable();
	        $table->timestamps();

	        $table->integer('user_id')->unsigned()->index();
	        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
