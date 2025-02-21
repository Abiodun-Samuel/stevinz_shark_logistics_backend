<?php

namespace Database\Seeders\Api;

use App\Models\Api\Location;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $stores = [
            [
                'city' => 'BENIN',
                'address' => 'NO 78 COMPLEX USELU LAGOS ROAD BEFORE CROSSING TRAFFIC LIGHT OPPOSITE EKEPEX FILLING STATION BESIDE USELU TOWN HALL BENIN',
                'store_keeper' => 'Faithful',
                'phone' => '07080968319'
            ],
            [
                'city' => 'AUCHI',
                'address' => 'White Junction Close To Eco Bank Igbe Road, Auchi Edo State',
                'store_keeper' => 'GIFT',
                'phone' => '07031260541'
            ],
            [
                'city' => 'EKPOMA',
                'address' => 'Poultry Road, Ujemen Opposite Bb Hair Salon Ekpoma',
                'store_keeper' => 'COSMOS',
                'phone' => '09048330337'
            ],
            [
                'city' => 'ABRAKA',
                'address' => 'After New Iyke Shopping Mall Along Police Station Road',
                'store_keeper' => 'ONOME',
                'phone' => '09032535503'
            ],
            [
                'city' => 'WARRI',
                'address' => 'Pti Road Before Masurge Junction After Classical School Above Mk Boutique Warri',
                'store_keeper' => 'ELLA/GIFT',
                'phone' => '09036208560'
            ],
            [
                'city' => 'OZORO',
                'address' => 'No 6 Ughelli Road Ogbonge Park Opposite White House',
                'store_keeper' => 'RITA',
                'phone' => '09060997313'
            ],
            [
                'city' => 'UGHELLI',
                'address' => 'No 285 Ughelli Patani Road At Agbarah Junction',
                'store_keeper' => 'PRECIOUS',
                'phone' => '08029585423'
            ],
            [
                'city' => 'AGBOR',
                'address' => 'Total Energy Filling Station Uromi Junction, Agbor',
                'store_keeper' => 'MAMA OBINNA',
                'phone' => '07065559886'
            ],
            [
                'city' => 'ASABA',
                'address' => 'Plaza Before Winners Chapel Ibuza Road If Coming From Koka. But If Coming From Ibuza Junction After Chapel',
                'store_keeper' => 'AMARACHI',
                'phone' => '07017905640'
            ],
            [
                'city' => 'SAPELE',
                'address' => 'Okirigwer Garage By The Warri Park',
                'store_keeper' => 'BLESSING',
                'phone' => '08164773616'
            ],
            [
                'city' => 'OGHARA',
                'address' => 'Oghara Central Motor Pack',
                'store_keeper' => 'ELVIS',
                'phone' => '09133949729'
            ],
            [
                'city' => 'AWKA',
                'address' => 'On The First Floor Inside Samko Park Unizik Junction Awka',
                'store_keeper' => 'ELVIS',
                'phone' => '09135817003'
            ],
            [
                'city' => 'ENUGU',
                'address' => 'Aka God Logistics Inside Enugu North Mass Transit Opposite Enugu North Local Government Beside Zenith Bank By Holy Ghost Round About',
                'store_keeper' => 'AKA',
                'phone' => '09162510210'
            ],
            [
                'city' => 'OWERRI',
                'address' => 'No 10 Arizona Street Opposite Nnpc Mega Filling Station Off Owerri-Onitsha Road',
                'store_keeper' => 'AKA',
                'phone' => '09131644264'
            ],
            [
                'city' => 'PORTHARCOURT',
                'address' => 'No 1 Evo Road Gra Pepperoni Fast Food Water Line Road',
                'store_keeper' => 'KELLY',
                'phone' => '08073318769'
            ],
            [
                'city' => 'BAYELSA',
                'address' => 'On The First Floor, The Building Behind Saptex Junction Inside Town Mbiama Yenagoa Road',
                'store_keeper' => 'JOY',
                'phone' => '07031801635'
            ],
            [
                'city' => 'ONITSHA',
                'address' => 'Old Chisco Park Upper Iweka Near Relief Market',
                'store_keeper' => 'NONSO',
                'phone' => '08030751190'
            ],
            [
                'city' => 'ABUJA',
                'address' => 'At Shop No 90 Block B First Floor, Jabi Garage Plaza Abuja',
                'store_keeper' => 'SIMBIAT',
                'phone' => '09042339290/ 08163005430'
            ],
            [
                'city' => 'Uromi',
                'address' => null,
                'store_keeper' => null,
                'phone' => null
            ],
            ['city' => 'Ihiala', 'address' => null, 'store_keeper' => null, 'phone' => null],
            ['city' => 'Nnsuka', 'address' => null, 'store_keeper' => null, 'phone' => null],
            ['city' => 'Abakaliki', 'address' => null, 'store_keeper' => null, 'phone' => null],
            ['city' => 'Nnewi', 'address' => null, 'store_keeper' => null, 'phone' => null],
            ['city' => 'Ekwulobia', 'address' => null, 'store_keeper' => null, 'phone' => null],
            ['city' => 'Lokoja', 'address' => null, 'store_keeper' => null, 'phone' => null],
            ['city' => 'Sokoto', 'address' => null, 'store_keeper' => null, 'phone' => null],
            ['city' => 'ABA', 'address' => null, 'store_keeper' => null, 'phone' => null],
            ['city' => 'Umuahia', 'address' => null, 'store_keeper' => null, 'phone' => null],
            ['city' => 'Uyo', 'address' => null, 'store_keeper' => null, 'phone' => null],
            ['city' => 'Calabar', 'address' => null, 'store_keeper' => null, 'phone' => null],
            ['city' => 'Ibadan', 'address' => null, 'store_keeper' => null, 'phone' => null],
            ['city' => 'Iwo road', 'address' => null, 'store_keeper' => null, 'phone' => null],
            ['city' => 'Challenge', 'address' => null, 'store_keeper' => null, 'phone' => null],
            ['city' => 'Osogbo', 'address' => null, 'store_keeper' => null, 'phone' => null],
            ['city' => 'Abeokuta', 'address' => null, 'store_keeper' => null, 'phone' => null],
            ['city' => 'Ekiti', 'address' => null, 'store_keeper' => null, 'phone' => null],
            ['city' => 'Ado-Ekiti', 'address' => null, 'store_keeper' => null, 'phone' => null],
            ['city' => 'Ilorin', 'address' => null, 'store_keeper' => null, 'phone' => null],
            ['city' => 'Kwara', 'address' => null, 'store_keeper' => null, 'phone' => null]
        ];
        foreach ($stores as $key => $value) {
            Location::create([
                'city' => $value['city'],
                'city_code' => strtoupper(substr($value['city'], 0, 3)),
                'address' => $value['address'],
                'store_keeper' => $value['store_keeper'],
                'phone' => $value['phone'],
            ]);
        }
    }
}
