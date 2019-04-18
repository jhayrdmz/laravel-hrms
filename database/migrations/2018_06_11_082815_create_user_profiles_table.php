<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('user_id')->unsigned();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('gender')->nullable();
            $table->string('birthdate')->nullable();
            $table->text('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('date_hired')->nullable();
            $table->string('employment_status')->nullable();
            $table->string('tin_id')->nullable();
            $table->string('sss_id')->nullable();
            $table->string('pagibig_id')->nullable();
            $table->string('philhealth')->nullable();
            $table->string('emergency_person')->nullable();
            $table->string('emergency_phone')->nullable();
            $table->string('emergency_address')->nullable();
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
        Schema::dropIfExists('user_profiles');
    }
}
