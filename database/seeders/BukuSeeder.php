<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BukuSeeder extends Seeder
{
    public function run()
    {
        DB::table('bukus')->insert([
            [
                'title' => 'Buku 1',
                'author' => 'John Doe',
                'genre' => 'Adventure',
                'vote_count' => 0,
            ],
            [
                'title' => 'Buku 2',
                'author' => 'Jane Smith',
                'genre' => 'Mystery',
                'vote_count' => 0,
            ],
            [
                'title' => 'Buku 3',
                'author' => 'Albert',
                'genre' => 'Science',
                'vote_count' => 0,
            ],
            [
                'title' => 'Buku 4',
                'author' => 'Joko',
                'genre' => 'Cooking',
                'vote_count' => 0,
            ],
        ]);
    }
}
