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
        // $this->call(UsersTableSeeder::class);
<<<<<<< HEAD
         $this->call(BlmJobsOffersSeeder::class);
=======
         $this->call(JobsOffersSeeder::class);
>>>>>>> daf570a25b7cbd96f30598c96b5549eb522fbc5c
         $this->call(BlmNivelesAcademicosSeeder::class);
         $this->call(BlmCategoriasSeeder::class);
    }
}
