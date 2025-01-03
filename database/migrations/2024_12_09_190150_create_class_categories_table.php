<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('class_categories', function (Blueprint $table) {
            $table->id();
            $table->string('class_name');
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('class_categories');
    }
}
