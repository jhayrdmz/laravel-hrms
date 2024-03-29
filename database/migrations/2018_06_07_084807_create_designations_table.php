<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDesignationsTable extends Migration {

  public function up() {
    Schema::create('designations', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('department_id');
      $table->string('designation_name');
    });
  }

  public function down() {
    Schema::dropIfExists('designations');
  }

}
