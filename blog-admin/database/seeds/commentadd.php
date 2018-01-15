<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
class commentadd extends Seeder
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
            $tmp['article_id'] = rand(1, 10);
            $tmp['content'] = $faker->sentence(3);
            $tmp['user_email'] = rand(1000000, 99999999) . '@qq.com';
            $tmp['created_at'] = date('Y-m-d H:i:s');
            $tmp['updated_at'] = date('Y-m-d H:i:s');
            $arr[] = $tmp; //先把生成的数据放进数组
        }
        DB::table('comments') -> insert($arr);
        //最后一次性插入 这样效率比较高
    }
}
