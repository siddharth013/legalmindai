<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // public function up(): void
    // {
    //     Schema::create('cases', function (Blueprint $table) {
    //         $table->id();
    //         $table->timestamps();
    //     });
    // }
    
    public function up()
    {
        Schema::create('cases', function (Blueprint $table) {
            $table->id();
            $table->string('case_title');
            $table->string('case_number')->nullable()->unique();
            $table->string('client_name');
            $table->string('client_phone');
            $table->string('client_email')->nullable();
            $table->string('case_category');
            $table->text('case_description');
            $table->date('date_filed');
            $table->enum('priority', ['Low', 'Medium', 'High', 'Urgent']);
            $table->enum('status', ['Open', 'In Progress', 'Closed', 'On Hold']);
            $table->string('police_station_name');
            $table->string('police_incharge_name');
            $table->string('police_incharge_phone');
            $table->string('police_incharge_email')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cases');
    }
};
