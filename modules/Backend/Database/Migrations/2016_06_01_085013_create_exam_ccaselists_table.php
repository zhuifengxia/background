<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamCcaselistsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //C型题小题目表
        Schema::create('exam_ccaselists', function(Blueprint $table)
        {
            $table->engine = 'InnoDB';//使用InnoDB引擎
            $table->increments('id');//ID
            $table->integer('banktypeid')->nullable();//题库ID
            $table->integer('deptypeid')->nullable();//科室类别ID
            $table->string('casecontent',1000)->nullable();//病例内容
            $table->integer('addtime')->nullable();//提交时间
            $table->string('img1',500)->nullable();//病例中的图片路径1
            $table->string('img2',500)->nullable();//病例中的图片路径2
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
        Schema::drop('exam_ccaselists');
    }

}
