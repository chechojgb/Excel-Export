<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('calls', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('phone_number');
            $table->integer('hold_time');
            $table->integer('muted_time');
            $table->integer('queue_time');
            $table->enum('type_id', ['1', '2']);
            $table->integer('campaign_id');
            $table->integer('user_id');
            $table->enum('state_id', ['1', '2', '3', '4']);
            $table->timestamp('start')->nullable();
            $table->timestamp('end')->nullable();
            $table->timestamps();
            $table->json('user_to_user')->nullable();
            $table->string('hanging')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
