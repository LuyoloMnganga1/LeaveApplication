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
        Schema::create('leaves_per_user', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('surname');
            $table->string('email');
            $table->string('Annual');
            $table->string('Vaccation');
            $table->string('Sick');
            $table->string('Study');
            $table->string('Family');
            $table->string('Maternity');
            $table->string('TimeOfWithoutPay')->nullable();
            $table->string('TotalDays');
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
        Schema::dropIfExists('leaves_per_user');
    }
};
