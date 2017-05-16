<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamCexamlistsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // C型题目表
        Schema::create('exam_cexamlists', function(Blueprint $table)
        {
            $table->engine = 'InnoDB';//使用InnoDB引擎
            $table->increments('id');//ID
            $table->integer('caseid')->nullable();//病例ID
            $table->string('title',500)->nullable();//题目
            $table->string('options',1000)->nullable();//选项（每个选项用| 隔开）
            $table->string('answer',50)->nullable();//答案
            $table->string('analysis',1000)->nullable();//解析
            $table->string('analysisimg',500)->nullable();//解析图片路径
            $table->string('optionsimg',2000)->nullable();//选项中图片路径
            $table->string('titleimg',200)->nullable();//题目的图片路径

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
        Schema::drop('exam_cexamlists');
    }

}
