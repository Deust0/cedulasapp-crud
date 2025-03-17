<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ciudadanosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('info_usuarios')->insert([
            [
                'cedula' => 1001001001,
                'name' => 'Juan Pérez',
                'edad' => 30,
                'ciudad' => 'Quito',
                'nacimiento' => '1994-05-12',
                'estadocivil' => 'Soltero',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'cedula' => 1101101101,
                'name' => 'María López',
                'edad' => 25,
                'ciudad' => 'Guayaquil',
                'nacimiento' => '1999-02-20',
                'estadocivil' => 'Casada',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'cedula' => 1201201201,
                'name' => 'Carlos Rodríguez',
                'edad' => 40,
                'ciudad' => 'Cuenca',
                'nacimiento' => '1984-07-15',
                'estadocivil' => 'Divorciado',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'cedula' => 1301301301,
                'name' => 'Ana Torres',
                'edad' => 29,
                'ciudad' => 'Ambato',
                'nacimiento' => '1995-10-05',
                'estadocivil' => 'Soltera',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'cedula' => 1401401401,
                'name' => 'Fernando Gómez',
                'edad' => 35,
                'ciudad' => 'Loja',
                'nacimiento' => '1989-03-18',
                'estadocivil' => 'Casado',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}
