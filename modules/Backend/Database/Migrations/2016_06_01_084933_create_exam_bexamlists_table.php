<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamBexamlistsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // B型题目表
        Schema::create('exam_bexamlists', function(Blueprint $table)
        {
            $table->engine = 'InnoDB';//使用InnoDB引擎
            $table->increments('id');//ID
            $table->integer('banktypeid')->nullable();//题库ID
            $table->integer('deptypeid')->nullable();//科室类别ID
            $table->string('options',4000)->nullable();//选项（每个选项用#隔开）
            $table->string('title',4000)->nullable();//题目（每个题目用#隔开）
            $table->string('answer',500)->nullable();//答案（每个答案用#隔开）
            $table->integer('addtime')->nullable();//提交时间
            $table->string('analysis',500)->nullable();//解析（每个题目的解析用#隔开）
            $table->integer('uploaduserid')->nullable();//上传题目人的账号ID
            $table->string('analysis0',1000)->nullable();//总解析
            $table->string('analysis0img',500)->nullable();//总解析的图片路径
            $table->string('optionsimg',2000)->nullable();//选项中的图片路径（每个选项中的图片路径用#隔开）
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
        Schema::drop('exam_bexamlists');
    }

}
