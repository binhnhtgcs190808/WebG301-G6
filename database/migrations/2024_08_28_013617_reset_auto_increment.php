<?php

use Illuminate\Support\Facades\DB;
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
        DB::statement('SET @newid=0;');
        DB::table('users')->orderBy('id')->update(['id' => DB::raw('(@newid:=@newid+1)')]);
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
