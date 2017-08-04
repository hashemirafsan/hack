<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTouristPlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tourist_places', function (Blueprint $table) {
            
            $table->integer('user_id')->unsigned();
            $table->decimal('lat', 10, 8)->nullable();
            $table->decimal('lng', 11, 8)->nullable();
            $table->string('area_code')->nullable();

            $table->timestamps();

            $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tourist_places');
    }
}
