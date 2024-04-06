<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::table('users', function (Blueprint $table) {
            $table->string('country')->after('email');
            $table->text('skills')->after('country')->nullable();
            $table->text('bio')->after('skills')->nullable();
            $table->integer('score', unsigned: true)->after('bio')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('country');
            $table->dropColumn('skills');
            $table->dropColumn('bio');
            $table->dropColumn('Score');
        });
    }
};
