<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('records', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->tinyInteger('variation')->default(0);
            $table->tinyInteger('test')->default(1);

            $table->tinyInteger('age')->nullable();
            $table->tinyInteger('gender')->nullable();
            $table->tinyInteger('correct')->nullable();
            $table->tinyInteger('total')->nullable();
            $table->tinyInteger('good_at_math')->nullable();
            $table->tinyInteger('motivation_before')->nullable();
            $table->tinyInteger('motivation_after')->nullable();
            $table->string('location')->nullable();
            $table->string('ip')->nullable();
            $table->string('notes')->nullable();
            $table->string('answers', 2000)->nullable();

            $table->timestamp('started_at')->nullable();
            $table->timestamp('finished_at')->nullable();
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
        Schema::dropIfExists('records');
    }
}
