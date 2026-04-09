<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\medicines; // lowercase aapke model ke liye

class MedicineSeeder extends Seeder
{
    public function run()
    {
        $medicines = [
            [
                'category_id' => 1,
                'name' => 'Paracetamol',
                'company' => 'GSK',
                'strength' => '500mg',
                'type' => 'Tablet',
                'price' => 50,
                'quantity' => 100,
                'batch_no' => 'B1234',
                'expiry_date' => '2026-12-31',
                'image' => 'paracetamol.png',
            ],
            [
                'category_id' => 1,
                'name' => 'Amoxicillin',
                'company' => 'Abbott',
                'strength' => '250mg',
                'type' => 'Capsule',
                'price' => 120,
                'quantity' => 50,
                'batch_no' => 'A9876',
                'expiry_date' => '2027-06-30',
                'image' => 'amoxicillin.png',
            ],
        ];

        foreach ($medicines as $med) {
            // medicines::create($med);
            $inserted = medicines::create($med);
            dd($inserted); // ye dekho kya create ho raha hai y
        }
    }
}
