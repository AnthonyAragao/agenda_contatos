<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class TipoTelefoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_telefones')->insert([
            'nome' => 'Fixo'
        ]);

        DB::table('tipo_telefones')->insert([
            'nome' => 'Celular'
        ]);
    }
}
