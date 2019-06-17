<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('areas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->int('parent_id')->unique();
            $table->int('level');
			 $table->string('abb');//各省的简写 北京-京
            $table->rememberToken();
            $table->timestamps();
        });
    }
	/**
	sql表结构
		CREATE TABLE `areas` (
		  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '表id',
		  `name` varchar(20) CHARACTER SET utf8 NOT NULL DEFAULT '' COMMENT '地区名称',
		  `parent_id` int(11) DEFAULT NULL COMMENT '父id',
		  `level` tinyint(1) DEFAULT '0' COMMENT '地区等级',
		  `abb` varchar(255) DEFAULT NULL,
		  PRIMARY KEY (`id`)
		) ENGINE=InnoDB AUTO_INCREMENT=3524 DEFAULT CHARSET=gbk;
	*

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('areas');
    }
}
