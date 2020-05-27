<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        'user'  => 'admin',
        'nombre' => 'Administrador Sistema',
        'nivel' => 1,
        'estatus' =>1,
        'email'     => 'geovannyp@aduanaldelvalle.mx',
        'backup_password' => '123456',
        'password'  => bcrypt('123456')
        ]);
    }
}
