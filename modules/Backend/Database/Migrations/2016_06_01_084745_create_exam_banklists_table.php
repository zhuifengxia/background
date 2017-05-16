<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamBanklistsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //题库表
        Schema::create('exam_banklists', function(Blueprint $table)
        {
            $table->engine = 'InnoDB';//使用InnoDB引擎
            $table->increments('id');//ID
            $table->string('bankname',100)->nullable();//题库名称
            $table->integer('bankfid')->nullable();//上级题库分类ID（问答挑战里的分类）
            $table->string('startdate',50)->nullable();//考试时间
            $table->integer('isstart')->nullable();//是否开启活动
            $table->integer('infoid')->nullable();//活动介绍 表ID
            $table->integer('anum')->nullable();//每关A型题目数
            $table->integer('bnum')->nullable();//每关B型题目数
            $table->integer('cnum')->nullable();//每关C型题目数
            $table->integer('kutype')->nullable();//题库分类ID
            $table->integer('xuhao')->nullable();//序号
            //$table->timestamps();显示更新编辑时间
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('exam_banklists');
    }

}
