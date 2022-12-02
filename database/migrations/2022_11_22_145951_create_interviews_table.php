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
        Schema::create('interviews', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->string('email');
            $table->string('resume');
            $table->string('status');
            $table->string('salary')->nullable();
            $table->unsignedInteger('role_id');
            $table->enum('result', ['accept', 'reject', 'pending'])->default('pending');
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('enrollment_id');
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
        Schema::dropIfExists('interviews');
    }
};
