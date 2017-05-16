<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamVdoctorsitesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //村医的考点表
        Schema::create('exam_vdoctorsites', function(Blueprint $table)
        {
            $table->engine = 'InnoDB';//使用InnoDB引擎
            $table->increments('id');//ID
            $table->string('sitename',100)->nullable();//考点名称
            $table->integer('typeid')->nullable();//分类ID
            $table->integer('sitenum')->nullable();//序号
            $table->integer('addtime')->nullable();//提交时间
            $table->string('siteinfo',50)->nullable();//备注
            $table->string('ppturl',200)->nullable();//ppt路径
            //$table->timestamps();显示编辑更新时间
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('exam_vdoctorsites');
    }

}
