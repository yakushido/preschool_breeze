<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("cloth_id");
            $table->unsignedBigInteger("size_id");
            $table->char('price');
            $table->timestamps();

            $table->foreign("cloth_id")
                ->references("id")
                ->on("cloths")
                ->onDelete("cascade");

            $table->foreign("size_id")
                ->references("id")
                ->on("sizes")
                ->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stocks');
    }
}
