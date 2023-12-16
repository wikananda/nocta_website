<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // public function up(): void
    // {
    //     Schema::table('users', function (Blueprint $table) {
    //         $table->renameColumn('tester-game1', 'tester_game1');
    //         $table->renameColumn('tester-game2', 'tester_game2');
    //     });
    // }

    // /**
    //  * Reverse the migrations.
    //  */
    // public function down(): void
    // {
    //     Schema::table('users', function (Blueprint $table) {
    //         $table->renameColumn('tester-game1', 'tester_game1');
    //         $table->renameColumn('tester-game2', 'tester_game2');
    //     });
    // }

        /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement('ALTER TABLE users CHANGE `tester-game1` tester_game1 TINYINT(1) DEFAULT 0 NOT NULL');
        DB::statement('ALTER TABLE users CHANGE `tester-game2` tester_game2 TINYINT(1) DEFAULT 0 NOT NULL');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('ALTER TABLE users CHANGE tester_game1 `tester-game1` TINYINT(1) DEFAULT 0 NOT NULL');
        DB::statement('ALTER TABLE users CHANGE tester_game2 `tester-game2` TINYINT(1) DEFAULT 0 NOT NULL');
    }
};
