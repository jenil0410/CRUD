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
        Schema::create('modules', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('Role_id');
            $table->foreign('Role_id')->references('id')->on('roles');
            $table->string('module');
            $table->enum('read', ['on', 'off'])->nullable();
            $table->enum('create', ['on', 'off'])->nullable();
            $table->enum('update', ['on', 'off'])->nullable();
            $table->enum('delete', ['on', 'off'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modules');
    }
};
