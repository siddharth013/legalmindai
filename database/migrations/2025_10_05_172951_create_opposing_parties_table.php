<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOpposingPartiesTable extends Migration
{
    public function up()
    {
        Schema::create('opposing_parties', function (Blueprint $table) {
            $table->id();
            $table->foreignId('case_id')->constrained('cases')->onDelete('cascade');
            $table->string('name')->nullable();
            $table->text('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('opposing_parties');
    }
}
