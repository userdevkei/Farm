<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('farming');
            $table->string('type');
            $table->string('product');
            $table->string('support');
            $table->boolean('status')->nullable()->default('0');
            $table->string('investor')->nullable();
            $table->string('investment')->nullable();
            $table->string('security')->nullable();
            $table->string('amount')->nullable();
            $table->mediumText('description');
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
        Schema::dropIfExists('supports');
    }
}
