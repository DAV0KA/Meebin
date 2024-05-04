<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrashTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trash', function (Blueprint $table) {
            $table->id();
            $table->string('photo_url');
            $table->string('address');
            $table->text('request_comment')->nullable();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('trash_status_id')->default(1);
            $table->string('confirmation_photo_url')->nullable();
            $table->integer('price')->nullable();
            $table->string('city');
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
        Schema::dropIfExists('trash');
    }
}
