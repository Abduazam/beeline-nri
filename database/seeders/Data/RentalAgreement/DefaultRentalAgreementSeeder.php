<?php

namespace Database\Seeders\Data\RentalAgreement;

use App\Models\Data\RentalAgreement\RentalAgreement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DefaultRentalAgreementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rental_agreements = [
            'Да',
            'Нет',
        ];

        foreach ($rental_agreements as $rental_agreement) {
            RentalAgreement::create([
                'title' => $rental_agreement
            ]);
        }
    }
}
