<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamVdoctortypesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //村医的一级、二级分类表
        Schema::create('exam_vdoctortypes', function(Blueprint $table)
        {
            $table->engine = 'InnoDB';//使用InnoDB引擎
            $table->increments('id');//ID
            $table->string('typename',100)->nullable();//名称
            $table->integer('typefid')->nullable();//上级分类Id
            $table->integer('typenum')->nullable();//序号
            $table->integer('addtime')->nullable();//提交时间
            $table->string('typeinfo',50)->nullable();//备注
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
        Schema::drop('exam_vdoctortypes');
    }

}
