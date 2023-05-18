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
        Schema::create('galleries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('creator')->default('cafepurr');
            $table->string('url');
            $table->string('description')->default('A Cafe Purr Web Gallery');
            $table->string('fav_image')->nullable();
            $table->integer('rating')->default(0);
            $table->boolean('isMember')->default(true);
            $table->boolean('isNSFW')->default(true);
            $table->boolean('isPrivate')->default(true);
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
        Schema::dropIfExists('galleries');
    }
};
