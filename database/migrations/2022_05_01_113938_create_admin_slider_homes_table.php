<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_slider_homes', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('page')->default(1);
            $table->smallInteger('style')->default(1);
            $table->string('image');
            $table->string('thumb')->nullable();
            $table->smallInteger('order')->default(1);
            $table->smallInteger('active')->default(1);
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
        Schema::dropIfExists('admin_slider_homes');
    }
};
