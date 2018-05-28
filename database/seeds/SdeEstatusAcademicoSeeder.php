<?php

use Illuminate\Database\Seeder;

class SdeEstatusAcademicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $estatus_academico = ['Cursando','Trunca','Concluida','Titulado'];

        for ($i=0; $i < count( $estatus_academico ); $i++) {

              App\Model\SdeEstatusAcademicoModel::create([
                  'nombre'		  => $estatus_academico[$i]
                  ,'estatus'    => 1
              ]);

        }


    }
}
