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
        Schema::create('ticket_replies', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('ticket_id')->unsigned()->nullable();
            $table->text('message')->nullable();
            $table->string('image')->nullable();
            $table->string('reply_date')->nullable();
            $table->timestamps();
            $table->foreign('ticket_id')->references('id')->on('open_tickets')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ticket_replies');
    }
};
