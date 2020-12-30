<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 生成数据集合
        User::factory()->count(10)->create();

        // 单独处理第一个用户的数据
        $user = User::find(1);
        $user->name = 'Oyxiaoxi';
        $user->email = 'Oyxiaoxi@hotmail.com';
        $user->avatar = 'https://img.zcool.cn/community/01bd97554324500000019ae9def95a.jpg@1280w_1l_2o_100sh.jpg';
        $user->save();
    }
}
