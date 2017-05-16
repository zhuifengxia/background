<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamUserfeedbackTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //网页版反馈表
        Schema::create('exam_userfeedback', function(Blueprint $table)
        {
            $table->engine = 'InnoDB';//使用InnoDB引擎
            $table->increments('id');//ID
            $table->integer('userid');//用户Id
            $table->string('nicknam',20);//昵称
            $table->string('feedbacktitle',100);//标题
            $table->string('feedbackcotent',1000);//反馈内容
            $table->integer('feedbacktime')->nullable();//提交时间
            $table->string('answername',20)->nullable();//回答人姓名
            $table->string('answercontent',1000)->nullable();//回复内容
            $table->integer('answertime')->nullable();//回复时间
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
        Schema::drop('exam_userfeedback');
    }

}
