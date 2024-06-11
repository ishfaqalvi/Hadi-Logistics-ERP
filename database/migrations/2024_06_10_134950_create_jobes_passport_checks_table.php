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
        Schema::create('jobes_passport_checks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jobe_id')->constrained()->cascadeOnDelete();
            $table->foreignId('passport_check_id')->constrained()->cascadeOnDelete();
            $table->boolean('checked')->default(0);
            $table->text('description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobes_passport_checks');
    }
};