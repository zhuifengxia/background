<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamVdocexamlistsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //村医的题目表
        Schema::create('exam_vdocexamlists', function(Blueprint $table)
        {
            $table->engine = 'InnoDB';//使用InnoDB引擎
            $table->increments('id');//ID
            $table->string('title')->nullable();//题目
            $table->integer('typeid')->nullable();//分类Id
            $table->integer('addtime')->nullable();//提交时间
            $table->integer('isradio')->nullable();//单选0、多选1
            $table->string('img1',200)->nullable();//题目图片路径1
            $table->string('img2',200)->nullable();//题目图片路径2
            $table->string('analysis',2000)->nullable();//解析
            $table->string('option1',500)->nullable();//选项1
            $table->string('option2',500)->nullable();//选项2
            $table->string('option3',500)->nullable();//选项3
            $table->string('option4',500)->nullable();//选项4
            $table->string('option5',500)->nullable();//选项5
            $table->string('option6',500)->nullable();//选项6
            $table->string('answer',50)->nullable();//答案
            $table->string('analysisimg',500)->nullable();//解析图片路径
            $table->string('optionimg',2000)->nullable();//选项图片路径，#隔开
            //$table->timestamps();//显示编辑更新时间
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('exam_vdocexamlists');
    }

}
