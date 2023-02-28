<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(
            array(
                EnderecoSeeder::class,
                ContatoHasCategoriaSeeder::class,
                TipoTelefoneSeeder::class,
                TelefoneSeeder::class,
                ContatoSeeder::class,
                CategoriaSeeder::class

            ));
    }
}
