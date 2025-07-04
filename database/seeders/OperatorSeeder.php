<?php

namespace Database\Seeders;

use App\Models\Operator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OperatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Operator::create([
            'full_name' => 'Operator 1',
            'phone_number' => '08123456789',
            'type' => 'academic',
        ]);

        Operator::create([
            'full_name' => 'Operator 2',
            'phone_number' => '08123456789',
            'type' => 'student_affair',
        ]);

        Operator::create([
            'full_name' => 'Operator 3',
            'phone_number' => '08123456789',
            'type' => 'facility',
        ]);

        Operator::create([
            'full_name' => 'Operator 4',
            'phone_number' => '08123456789',
            'type' => 'harassment',
        ]);
    }
}
