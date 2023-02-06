<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class ContatoHasCategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        DB::table('contatos_has_categorias')->insert([
            'contatos_id' => 1,
            'categorias_id' => 1
        ]);

    }
}
