<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableActivityLog extends Migration
{
    private $tbl = 'activity_logs';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->tbl)) {
            return;
        }
        Schema::create($this->tbl, function (Blueprint $table) {
            $table->increments('id');
            $table->integer('activity_id')->nullable(true);
            $table->string('activity_name');
            $table->integer('user_id')->nullable(true);
            $table->string('ip');
            $table->text('info');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->tbl);
    }
}
