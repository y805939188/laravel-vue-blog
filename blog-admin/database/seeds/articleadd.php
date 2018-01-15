<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

//这是数据填充的第二种方法 
//先在命令行中 php artisan make:seeder name
//会在database下的seeds中生成一个name文件
//在该文件中写如下的方法
//最后在命令行中 php artisan db:seed --class=classname
//或者在DatabaseSeeder.php 文件中的run方法中 添加 $this -> call(classname::class);
//然后在命令行中执行 php artisan db:seed 这样也可以



class articleadd extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        //
        $arr = [];
        for($i = 0; $i < 10; $i++) {
            $tmp = [];
            $tmp['title'] = $faker->sentence(3);
            $tmp['introduction'] = $faker->paragraph(1);
            $tmp['content'] = $faker->paragraph(3);
            $tmp['catelog_id'] = rand(1, 10);
            $tmp['created_at'] = date('Y-m-d H:i:s');
            $tmp['updated_at'] = date('Y-m-d H:i:s');
            $arr[] = $tmp; //先把生成的数据放进数组
        }
        DB::table('articles') -> insert($arr);
        //最后一次性插入 这样效率比较高
    }
}
