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
        Schema::create('appointments', function (Blueprint $table) {
            $table->increments('id');
            $table->date('dateapp');
            $table->longText('note')->nullable();
            $table->unsignedInteger('patient_id');
            $table->unsignedInteger('doctor_id');
            $table->tinyInteger('statusapp')->default(1);
            $table->tinyInteger('status')->default(1);
            $table->unsignedInteger('user_cre');
            $table->unsignedInteger('user_upd')->nullable();
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
        Schema::dropIfExists('appointments');
    }
};
