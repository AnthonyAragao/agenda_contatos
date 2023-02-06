<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class EnderecoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('enderecos')->insert([
            'logradouro' => 'Rua Tercio Andrade',
            'numero' => '123',
            'cidade' => 'Sao Cristovao',
            'contatos_id' => 1
        ]);
    }
}
