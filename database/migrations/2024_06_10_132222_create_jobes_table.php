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
        Schema::create('jobes', function (Blueprint $table) {
            $table->id();
            $table->string('jobe_no');
            $table->foreignId('customer_id')->constrained()->cascadeOnDelete();
            $table->foreignId('vehicle_id')->constrained()->cascadeOnDelete();
            $table->string('vehicle_year');
            $table->string('vehicle_chasis');
            $table->foreignId('consignee_id')->constrained()->cascadeOnDelete();
            $table->string('type');
            $table->string('notify')->default('Same as Consignee');
            $table->string('shipping_line_name')->nullable();
            $table->string('bl_no')->nullable();
            $table->unsignedBigInteger('bl_date')->nullable();
            $table->unsignedBigInteger('last_entry')->nullable();
            $table->unsignedBigInteger('last_entry_to_bl_days')->default(0);
            $table->string('collectortae')->nullable();
            $table->foreignId('shed_id')->constrained()->cascadeOnDelete()->nullable();
            $table->string('vessel')->nullable();
            $table->unsignedBigInteger('eta')->nullable();
            $table->string('igm')->nullable();
            $table->unsignedBigInteger('index')->nullable();
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
        Schema::dropIfExists('jobes');
    }
};
