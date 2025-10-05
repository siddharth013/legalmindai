<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNextActionsTable extends Migration
{
    public function up()
    {
        Schema::create('next_actions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('case_id')->constrained('cases')->onDelete('cascade');
            $table->date('action_date');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('next_actions');
    }
}
