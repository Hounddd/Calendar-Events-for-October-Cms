<?php namespace JorgeAndrade\Events\Updates;

use October\Rain\Database\Updates\Migration;
use Schema;

class CreateDatesTable extends Migration
{

    public function up()
    {
        Schema::create('jorgeandrade_events_dates', function ($table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('title')->nullable();
            $table->string('url')->nullable();
            $table->date('date');
            $table->time('time_init');
            $table->time('time_end');
            $table->integer('event_id')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('jorgeandrade_events_dates');
    }

}
