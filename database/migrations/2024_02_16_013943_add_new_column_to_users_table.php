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
            $table->string('nationality', 100)->after('email');
            $table->text('skills')->after('nationality')->nullable();
            $table->text('bio')->after('skills')->nullable();
            $table->integer('Score', unsigned: true)->after('bio');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('nationality');
            $table->dropColumn('skills');
            $table->dropColumn('bio');
            $table->dropColumn('Score');
        });
    }
};