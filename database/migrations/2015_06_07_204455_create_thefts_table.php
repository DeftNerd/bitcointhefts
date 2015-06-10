<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTheftsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('thefts', function(Blueprint $table)
        {
        	$table->increments('id');
        	$table->string('name');
		$table->string('slug');
		$table->datetime('started_at')->nullable();
		$table->datetime('ended_at')->nullable();
		$table->string('type')->nullable();
		$table->text('victims')->nullable();
		$table->string('denomination')->nullable();
		$table->bigInteger('btc_then')->nullable();
		$table->bigInteger('btc_now')->nullable();
		$table->bigInteger('usd_then')->nullable();
		$table->bigInteger('usd_now')->nullable();
		$table->datetime('calculated_at')->nullable();
		$table->text('transactions')->nullable();
		$table->string('status')->nullable();
		$table->text('description')->nullable();
		$table->text('details')->nullable();
		$table->text('suspects')->nullable();
        	$table->timestamps();
		$table->softDeletes();
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('thefts');
    }
}
