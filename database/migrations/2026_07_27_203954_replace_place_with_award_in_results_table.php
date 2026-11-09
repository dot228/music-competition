<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('results', function (Blueprint $table) {
            $table->string('award')->nullable()->after('category');
        });

        DB::table('results')->where('place', 1)->update(['award' => 'grand_prix']);
        DB::table('results')->where('place', 2)->update(['award' => 'laureate_1']);
        DB::table('results')->where('place', 3)->update(['award' => 'laureate_2']);
        DB::table('results')->where('place', '>=', 4)->update(['award' => 'laureate_3']);

        Schema::table('results', function (Blueprint $table) {
            $table->dropColumn('place');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('results', function (Blueprint $table) {
            $table->integer('place')->nullable()->after('category');
        });

        Schema::table('results', function (Blueprint $table) {
            $table->dropColumn('award');
        });
    }
};
