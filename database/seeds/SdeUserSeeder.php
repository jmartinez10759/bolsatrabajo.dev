<?php

use Illuminate\Database\Seeder;

class SdeUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Model\RequestUserModel::create([
           'id_rol'             => 1
          ,'name'               => "JORGE"
          ,'first_surname'      => "MARTINEZ"
          ,'second_surname'     => "QUEZADA"
          ,'email'              => "jorge.martinez@burolaboralmexico.com"
          ,'password'           => sha1('123456')
          ,'remember_token'     => str_random(50)
          ,'api_token'          => str_random(50)
          ,'status'             => 1
          ,'confirmed'          => 1
          ,'confirmed_code'     => ""
          ,'confirmed_nss'      => 0
        ]);
    }
}
