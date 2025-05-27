<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'username')) {
                // Let op: unique index moet apart toegevoegd worden, niet in dezelfde statement als nullable
                $table->string('username')->nullable()->after('name');
                $table->unique('username');
            }
            if (!Schema::hasColumn('users', 'verjaardag')) {
                $table->date('verjaardag')->nullable()->after('username');
            }
            if (!Schema::hasColumn('users', 'profielfoto')) {
                $table->string('profielfoto')->nullable()->after('verjaardag');
            }
            if (!Schema::hasColumn('users', 'over_mij')) {
                $table->text('over_mij')->nullable()->after('profielfoto');
            }
        });
    }

    public function down()
    {
        // Let op: SQLite kan problemen geven met dropColumn, dus beter checken
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'username')) {
                $table->dropUnique(['username']);
                $table->dropColumn('username');
            }
            if (Schema::hasColumn('users', 'verjaardag')) {
                $table->dropColumn('verjaardag');
            }
            if (Schema::hasColumn('users', 'profielfoto')) {
                $table->dropColumn('profielfoto');
            }
            if (Schema::hasColumn('users', 'over_mij')) {
                $table->dropColumn('over_mij');
            }
        });
    }
};
