<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamDeptypesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //科室类别表
        Schema::create('exam_deptypes', function(Blueprint $table)
        {
            $table->engine = 'InnoDB';//使用InnoDB引擎
            $table->increments('id');//ID
            $table->string('deptypename',100)->nullable();//类别名称
            $table->integer('depfid')->nullable();//上级ID
            $table->integer('banktypeid')->nullable();//题库ID
            $table->integer('depnum')->nullable();//序号
            $table->string('depinfo',500)->nullable();//备注
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
        Schema::drop('exam_deptypes');
    }

}
