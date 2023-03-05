<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Detail;

class DetailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $details = [
            [
                'restaurant_id' => 1,
                'area' => '東京都',
                'genre' => '寿司',
            ],
            [
                'restaurant_id' => 2,
                'area' => '大阪府',
                'genre' => '焼肉',
            ],
            [
                'restaurant_id' => 3,
                'area' => '福岡県',
                'genre' => '居酒屋',
            ],
            [
                'restaurant_id' => 4,
                'area' => '東京都',
                'genre' => 'イタリアン',
            ],
            [
                'restaurant_id' => 5,
                'area' => '福岡県',
                'genre' => 'ラーメン',
            ],
            [
                'restaurant_id' => 6,
                'area' => '東京都',
                'genre' => '焼肉',
            ],
            [
                'restaurant_id' => 7,
                'area' => '大阪府',
                'genre' => 'イタリアン',
            ],
            [
                'restaurant_id' => 8,
                'area' => '東京都',
                'genre' => 'ラーメン',
            ],
            [
                'restaurant_id' => 9,
                'area' => '大阪府',
                'genre' => '居酒屋',
            ],
            [
                'restaurant_id' => 10,
                'area' => '東京都',
                'genre' => '寿司',
            ],
            [
                'restaurant_id' => 11,
                'area' => '大阪府',
                'genre' => '焼肉',
            ],
            [
                'restaurant_id' => 12,
                'area' => '福岡県',
                'genre' => '焼肉',
            ],
            [
                'restaurant_id' => 13,
                'area' => '東京都',
                'genre' => '居酒屋',
            ],
            [
                'restaurant_id' => 14,
                'area' => '大阪府',
                'genre' => '寿司',
            ],  
            [
                'restaurant_id' => 15,
                'area' => '東京都',
                'genre' => 'ラーメン',
            ],
            [   
                'restaurant_id' => 16,
                'area' => '大阪府',
                'genre' => '居酒屋',
            ],
            [   
                'restaurant_id' => 17,
                'area' => '東京都',
                'genre' => '寿司',
            ],
            [
                'restaurant_id' => 18,
                'area' => '東京都',
                'genre' => '焼肉',
            ],
            [
                'restaurant_id' => 19,
                'area' => '福岡県',
                'genre' => 'イタリアン',
            ],
            [
                'restaurant_id' => 20,
                'area' => '大阪府',
                'genre' => '寿司',
            ],
        ];

        foreach ($details as $detail) {
            Detail::create($detail);
        }
    }
}
