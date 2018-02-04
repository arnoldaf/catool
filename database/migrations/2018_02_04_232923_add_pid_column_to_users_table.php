<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPidColumnToUsersTable extends Migration
{
    private $tbl = 'users';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasColumn($this->tbl, 'p_id')) {
            return;
        }    
        Schema::table($this->tbl, function (Blueprint $table) {
            $table->integer('p_id')->nullable(true)->after('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table($this->tbl, function (Blueprint $table) {
            //
        });
    }
}
