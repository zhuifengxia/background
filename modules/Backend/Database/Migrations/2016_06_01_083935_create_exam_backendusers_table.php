<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamBackendusersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //后台管理员表
        Schema::create('exam_backendusers', function(Blueprint $table)
        {
            $table->engine = 'InnoDB';//使用InnoDB引擎

            $table->increments('id'); //ID
            $table->string('username',16); //用户名
            $table->char('password',60);//密码
            $table->string('userlarvel',16)->nullable();//权限
            $table->string('userinfo',500)->nullable();//备注
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
        Schema::drop('exam_backendusers');
    }

}
