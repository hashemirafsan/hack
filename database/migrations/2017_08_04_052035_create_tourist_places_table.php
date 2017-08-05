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
            
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->decimal('lat', 10, 8)->nullable();
            $table->decimal('lng', 11, 8)->nullable();
            $table->string('area_code')->nullable();
            $table->string('is_approved')->default(0);

            $table->timestamps();

            $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');
        });


        /**
            INSERT INTO `tourist_places` (`user_id`, `lat`, `lng`, `area_code`, `created_at`, `updated_at`) VALUES
            (1, 24.91080697,    91.82918493,    'Sylhet District',  '2017-08-04 11:34:35',  '2017-08-04 11:34:35'),
            (1, 24.90963422,    91.83125492,    'Sylhet District',  '2017-08-04 11:34:35',  '2017-08-04 11:34:35'),
            (1, 24.90818046,    91.83312697,    'Sylhet District',  '2017-08-04 11:34:35',  '2017-08-04 11:34:35');
        **/
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
