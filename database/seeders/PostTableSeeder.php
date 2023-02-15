<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $param = [
            'user_name' => 'A子',
            'contents' => '初投稿！',
        ];
        DB::table('posts')->insert($param);

        $param = [
            'user_name' => 'B郎',
            'contents' => 'シーディングでデータ追加中です。',
        ];
        DB::table('posts')->insert($param);

        $param = [
            'user_name' => 'C美',
            'contents' => '個人課題に取り組み中です。',
        ];
        DB::table('posts')->insert($param);
    }
}
