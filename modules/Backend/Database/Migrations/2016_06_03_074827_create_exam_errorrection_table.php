<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamErrorrectionTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //网页版纠错表
        Schema::create('exam_errorrection', function(Blueprint $table)
        {
            $table->engine = 'InnoDB';//使用InnoDB引擎
            $table->increments('id');//ID
            $table->integer('userid')->nullable();//用户ID
            $table->integer('userfrom')->nullable();//用户来源
            $table->integer('banktypeid')->nullable();//题库ID
            $table->integer('deptypeid')->nullable();//科室分类Id
            $table->string('chapter',50)->nullable();//章节
            $table->integer('examtype')->nullable();//题目类型（A型题为1、B型题为2、C型题为3）
            $table->integer('gettime')->nullable();//提交时间
            $table->integer('topicid')->nullable();//题目Id
            $table->integer('errtype')->nullable();//（纠错0？解析1）
            $table->string('errcontent',200)->nullable();//纠错内容
            $table->string('parsing',500)->nullable();//解析内容
            $table->integer('isdeal')->nullable();//是否处理(0是未处理，1是处理)
//            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('exam_errorrection');
    }

}
