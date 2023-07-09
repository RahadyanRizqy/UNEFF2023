<?php

namespace Database\Seeders;

use App\Models\JsonData;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JsonDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jsons = 
        [
            `{
                "Profile" : {
                    "Title" : "Profileezzz",
                    "Banner" : "/image/profile.png",
                    "Detail" : "Unej Film Festival merupakan program yang digagas oleh HIMAFISI Universitas Jember. Program festival HIMAFISI pertama kali diselenggarakan pada tahun 2016 dengan nama '/Hi-FEST'/ Program ini akan berlangsung setiap tahun dibawah program kerja divisi Media Kreatif HIMAFISI."
                }
            }`, 
            
            `{
                "Rules": {
                    "ExternalFormLink": "https:\/\/docs.google.com\/forms\/d\/e\/1FAIpQLSe2TIOZyk421APzVp-RQfda1ZxuxpNL6lZAP84Zu1-dT0FV6Q\/viewform?usp=sf_link",
                    "Title": "Penerimaan Karya Unej Film Festival 2023",
                    "Section": [
                        {
                            "Title": "Peraturan",
                            "List": [
                                "Ada peraturan yang harus dipatuhi",
                                "Ada persyaratan yang harus disesuaikan",
                                "Ada beberapa tambahan yang harus dilihat",
                                "Peraturan dapat berubah"
                            ]
                        },
                        {
                            "Title": "Persyaratan",
                            "List": [
                                "Persyaratan pertama",
                                "Persyaratan kedua",
                                "Persyaratan ketiga",
                                "Persyaratan keempat"
                            ]
                        },
                        {
                            "Title": "Tambahan",
                            "List": [
                                "Tambahan pertama",
                                "Tambahan kedua",
                                "Tambahan ketiga",
                                "Tambahan keempat"
                            ]
                        }
                    ]
                }
            }`
        ];

        // foreach ($jsons as $json) {
        //     JsonData::create([
        //         'data' => $json
        //     ]);
        // }
        JsonData::create([
            'data' => '{"Profile":{"Title":"Profileezzz","Banner":"/image/profile.png","Detail":"Unej Film Festival merupakan program yang digagas oleh HIMAFISI Universitas Jember. Program festival HIMAFISI pertama kali diselenggarakan pada tahun 2016 dengan nama \'Hi-FEST\' Program ini akan berlangsung setiap tahun dibawah program kerja divisi Media Kreatif HIMAFISI."}}'
        ]);

        JsonData::create([
            'data' => '{"Rules":{"ExternalFormLink":"https:\/\/docs.google.com\/forms\/d\/e\/1FAIpQLSe2TIOZyk421APzVp-RQfda1ZxuxpNL6lZAP84Zu1-dT0FV6Q\/viewform?usp=sf_link","Title":"Penerimaan Karya Unej Film Festival 2023","Section":[{"Title":"Peraturan","List":["Ada peraturan yang harus dipatuhi","Ada persyaratan yang harus disesuaikan","Ada beberapa tambahan yang harus dilihat","Peraturan dapat berubah"]},{"Title":"Persyaratan","List":["Persyaratan pertama","Persyaratan kedua","Persyaratan ketiga","Persyaratan keempat"]},{"Title":"Tambahan","List":["Tambahan pertama","Tambahan kedua","Tambahan ketiga","Tambahan keempat"]}]}}'
        ]);
    }
}
