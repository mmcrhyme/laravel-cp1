<?php

namespace Database\Seeders;
// <!-- sail artisan make:seeder TweetsSeeder にて作成 -->

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// // 以下を追加
// use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Str;
use App\Models\Tweet;

class TweetsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Tweetモデルからカウント数分ダミーデータを生成
        //sail artisan db:seed
        Tweet::factory()->count(10)->create();
        
    }
}
