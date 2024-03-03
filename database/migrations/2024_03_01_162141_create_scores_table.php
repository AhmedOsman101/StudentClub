<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('scores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->integer('sunday');
            $table->integer('monday');
            $table->integer('tuesday');
            $table->integer('wednesday');
            $table->integer('thursday');
            $table->integer('friday');
            $table->integer('saturday');
            $table->integer('weekly_total')->storedAs('sunday + monday + tuesday + wednesday + thursday + friday + saturday');
            $table->timestamps();
        });

        // If you want to set a default value for weekly_total, you can do it like this:
        // DB::table('scores')->update(['weekly_total' => DB::raw('sunday + monday + tuesday + wednesday + thursday + friday + saturday')]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('scores');
    }
};
