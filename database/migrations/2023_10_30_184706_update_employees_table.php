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
        Schema::table('employees', function (Blueprint $table) {
            $table->string('surname')->after('name');
            $table->string('email')->after('surname');
            $table->string('job')->after('age');
            $table->string('address')->after('job');
            $table->text('workData')->after('address');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->dropColumn('surname');
            $table->dropColumn('email');
            $table->dropColumn('job');
            $table->dropColumn('address');
            $table->dropColumn('workData');
        });
    }
};
