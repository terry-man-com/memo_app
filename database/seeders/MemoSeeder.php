<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 一件だけinsert
        DB::table('memos')->insert([
            'title'      => 'PHP',
            'body'       => 'PHPは、〜の略です。',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        # paramに配列を代入
        $param = [
            [
                'title'      => 'HTML',
                'body'       => 'HTMLは、〜の略です。',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'title'      => 'CSS',
                'body'       => "CSSは、\nCascading Style Sheets\nの略です。",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        ];
        # DB::table ->insertでレコードの登録
        DB::table('memos')->insert($param);
    }
}
