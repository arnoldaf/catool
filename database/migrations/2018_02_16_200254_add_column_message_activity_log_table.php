<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnMessageActivityLogTable extends Migration
{
    private $tbl = 'activity_logs';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasColumn($this->tbl, 'message')) {
            return;
        }
        Schema::table($this->tbl, function (Blueprint $table) {
            $table->string('message')->nullable(true)->after('ip');
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
