<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Offer;

class OfferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Services
        $Offers = [
            [
                'name' => 'Designing',
                'description' => 'Some quick example text to build on the card
                 title and make up the bulk of the cards content',
                'images' => 'images/cards/designing.png',
                'type' => 'services'

            ],
            [
                'name' => 'Prototyping',
                'description' => 'Some quick example text to build on the card
                 title and make up the bulk of the cards content',
                'images' => 'images/cards/prototyping.png',
                'type' => 'services'
            ],
            [
                'name' => 'Consultancy',
                'description' => 'Some quick example text to build on the card
                 title and make up the bulk of the cards content',
                'images' => 'images/cards/consultancy.png',
                'type' => 'services'
            ],
            [
                'name' => 'Modelling',
                'description' => 'Some quick example text to build on the card title and make up the bulk of the cards content',
                'images' => 'images/cards/modelling.png',
                'type' => 'services'
            ],
            //Training
            [
                'name' => '3D Design and Modelling',
                'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit.
             Id tenetur ut ad nostrum officia maxime sed rem libero ex cupiditate.',
                'images' => 'images/cards/3ddesign.png',
                'type' => 'training'
            ],

            [
                'name' => 'Arduino, Raspberry Pi, & Altera FPGA',
                'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit.
             Id tenetur ut ad nostrum officia maxime sed rem libero ex cupiditate.',
                'images' => 'images/cards/arduino.png',
                'type' => 'training'
            ],

            [
                'name' => 'Electronics and Instrumentation Control',
                'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit.
             Id tenetur ut ad nostrum officia maxime sed rem libero ex cupiditate.',
                'images' => 'images/cards/instrument.png',
                'type' => 'training'
            ],
        ];

        foreach ($Offers as $data) {
            Offer::create($data);
        }
    }
}
//php artisan db:seed --class=OfferSeeder
