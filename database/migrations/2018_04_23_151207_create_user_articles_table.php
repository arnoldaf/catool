<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserArticlesTable extends Migration
{
    private $tbl = 'user_articles';
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
            $table->integer('user_id');
            $table->integer('article_topic_id');
            $table->string('title');
            $table->text('description');
            $table->float('spent_hrs', 8, 2);
            $table->tinyInteger('status');
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
