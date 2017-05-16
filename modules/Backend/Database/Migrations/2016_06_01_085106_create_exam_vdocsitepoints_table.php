<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamVdocsitepointsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //村医的知识点下的要点表
        Schema::create('exam_vdocsitepoints', function(Blueprint $table)
        {
            $table->engine = 'InnoDB';//使用InnoDB引擎
            $table->increments('id');//ID
            $table->string('title',100)->nullable();//要点标题
            $table->text('content')->nullable();//要点内容
            $table->integer('addtime')->nullable();//添加时间
            $table->integer('pointnum')->nullable();//序号
            $table->string('pointsign',50)->nullable();//标记（熟练、了解等）
            $table->string('imgurl',2000)->nullable();//图片路径
            $table->integer('siteid')->nullable();//知识点ID
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
        Schema::drop('exam_vdocsitepoints');
    }

}
