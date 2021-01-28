<?php

use Illuminate\Database\Seeder;
use App\Vaccino;

class VaccinosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
        public function run()
    {
        $vaccini = [
            'cimurro',
            'adenovirus canino',
            'leishmaniosi',
            'herpesvirus canino',
            'rabbia',
        ];
        //creiamo le colonne necessarie per la tabella vaccinos
        foreach ($vaccini as $vaccino) {
            $newVaccino = new Vaccino();  //abbiamo creato un istanza al modello 
            $newVaccino->name = $vaccino; // alla nuova istanza che ha un oggetto di nome name associo i seeders
            $newVaccino->save(); //Salvataggio

        };

    }
}
