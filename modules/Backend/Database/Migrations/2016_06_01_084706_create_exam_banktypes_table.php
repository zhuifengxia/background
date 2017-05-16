<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamBanktypesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //医考天地题库分类表
        Schema::create('exam_banktypes', function(Blueprint $table)
        {

            $table->engine = 'InnoDB';//使用InnoDB引擎
            $table->increments('id');//ID
            $table->string('banktypename',50)->nullable();//分类名称
            $table->integer('banknum')->nullable();//序号
            $table->string('isdevelop',50)->nullable();//是否显示
            $table->integer('bankfid')->nullable();//上级分类ID
            $table->string('logo',200)->nullable();//logo
            //$table->timestamps('');显示更新编辑时间
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('exam_banktypes');
    }

}
