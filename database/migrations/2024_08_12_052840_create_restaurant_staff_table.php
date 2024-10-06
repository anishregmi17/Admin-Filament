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
        Schema::create('restaurant_staff', function (Blueprint $table) {$table->id();
            $table->string('name');
            $table->string('profile')->nullable();
            $table->enum('role', [
                'restaurant_manager',
                'head_chef',
                'sous_chef',
                'waiter',
                'host',
                'bartender',
                'line_cook',
                'dishwasher',
                'prep_cook',
            ]);
            $table->string('contact');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restaurant_staff');
    }
};
