<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamAnalysisTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //用户提交的分析表
        Schema::create('exam_analysis', function(Blueprint $table)
        {
            $table->engine = 'InnoDB';//使用InnoDB引擎
            $table->increments('id');//ID
            $table->integer('userid');//用户ID
            $table->string('nickname',50);//昵称
            $table->string('userimg',200)->nullable();//头像地址
            $table->integer('userfrom')->nullable();//用户来源（0为官网，1为万方）
            $table->text('parsing',16)->nullable();//解析内容
            $table->integer('addtime')->nullable();//提交时间
            $table->integer('zannum')->nullable();//点赞数
            $table->string('pointsign',50)->nullable();//标记
            $table->integer('topicid')->nullable();//题目ID
            $table->integer('examtype')->nullable();//题目类型（1为A型题、2为B型题、3为C型题）

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
        Schema::drop('exam_analysis');
    }

}
