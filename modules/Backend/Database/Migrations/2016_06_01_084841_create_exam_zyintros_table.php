<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamZyintrosTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //医考天地活动介绍表
        Schema::create('exam_zyintros', function(Blueprint $table)
        {
            $table->engine = 'InnoDB';//使用InnoDB引擎
            $table->increments('id');//ID
            $table->string('activename',100)->nullable();//考试冠名
            $table->string('activeinfo',2000)->nullable();//介绍
            $table->string('activelink',200)->nullable();//链接
            $table->string('imgpath',500)->nullable();//图片地址
            $table->string('activeurl',500)->nullable();//网址
            $table->string('activemsg',500)->nullable();//备注
            $table->string('logo',500)->nullable();//Logo
            $table->integer('rounds');//总关数
            $table->string('examname',50)->nullable();//考试模块的文字
            $table->integer('examtime')->nullable();//每关答题时间
            $table->string('simulatename',50)->nullable();//模拟考模块的文字
            $table->integer('simulatetime')->nullable();//模拟考的时间
            //$table->timestamps();显示跟新编辑时间
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('exam_zyintros');
    }

}
