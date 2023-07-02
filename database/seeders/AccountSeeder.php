<?php

namespace Database\Seeders;

use App\Models\Account;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $accounts = [
            "username" => [
                'raden',
                'uneff2023',
            ],
            "password" => [
                'raden',
                'uneff2023'
            ],
            "desc" => [
                'admin pertama web dev',
                'admin kedua operator atau ketua panitia',
            ]
        ];

        for ($i = 0; $i < count($accounts['username']); $i++ )
        {
            Account::create
            ([
                'username' => $accounts['username'][$i],
                'password' => Hash::make($accounts['password'][$i]),
                'desc' => $accounts['desc'][$i],
                'recorded_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
