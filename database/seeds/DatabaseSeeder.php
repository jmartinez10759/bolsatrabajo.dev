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
         #$this->call(UsersTableSeeder::class);
         #$this->call(BlmEstadosSeeder::class);
         #$this->call(BlmJobsOffersSeeder::class);
         $this->call(BlmNivelesAcademicosSeeder::class);
         $this->call(BlmCategoriasSeeder::class);
         $this->call(SdeMenusSeeder::class);
         $this->call(SdeRolesSeeder::class);
         $this->call(SdeRolMenusSeeder::class);
    }
}
