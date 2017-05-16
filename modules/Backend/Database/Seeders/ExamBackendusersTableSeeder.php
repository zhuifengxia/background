<?php namespace Modules\Backend\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use DB;
class ExamBackendusersTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();
		DB::table('exam_backendusers')->insert([
            'username' => 'medicool_ldf',
            'password' => '$2y$10$h2Szs0HmsKsbH63dz606Bupb7TqLghz7dAus2nPZQIiM1thMTRY7C',
            'userlarvel' =>'0',
            'userinfo' =>'刘单风' ,
        ]);
        DB::table('exam_backendusers')->insert([
            'username' => 'medicool_xy',
            'password' => '$2y$10$h2Szs0HmsKsbH63dz606Bupb7TqLghz7dAus2nPZQIiM1thMTRY7C',
            'userlarvel' =>'0',
            'userinfo' =>'许影' ,
        ]);
        DB::table('exam_backendusers')->insert([
            'username' => 'medicool_szq',
            'password' => '$2y$10$h2Szs0HmsKsbH63dz606Bupb7TqLghz7dAus2nPZQIiM1thMTRY7C',
            'userlarvel' =>'0',
            'userinfo' =>'邵仲强' ,
        ]);
		// $this->call("OthersTableSeeder");
	}

}