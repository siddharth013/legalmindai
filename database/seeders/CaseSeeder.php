<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CaseModel;
use App\Models\NextAction;
use App\Models\OpposingParty;

class CaseSeeder extends Seeder
{
    public function run()
    {
        \Log::info('Seeder started');

        $case = CaseModel::create([
            'case_title' => 'Test Case Title',
            'case_number' => 'TC001',
            'client_name' => 'Test Client',
            'client_phone' => '9999999999',
            'client_email' => 'client@test.com',
            'case_category' => 'Consumer Rights',
            'case_description' => 'This is a test case description.',
            'date_filed' => now()->toDateString(),
            'priority' => 'Medium',
            'status' => 'Open',
            'police_station_name' => 'Test Police Station',
            'police_incharge_name' => 'Officer Test',
            'police_incharge_phone' => '8888888888',
            'police_incharge_email' => 'officer@test.com',
            'notes' => 'These are test notes.',
        ]);

        NextAction::create([
            'case_id' => $case->id,
            'action_date' => now()->addDays(7)->toDateString(),
        ]);

        OpposingParty::create([
            'case_id' => $case->id,
            'name' => 'Test Opposing Party',
            'address' => '123 Test St',
            'phone' => '7777777777',
            'email' => 'opposing@test.com',
        ]);

        \Log::info('Case created with id: ' . $case->id);
        \Log::info('Seeder finished');
    }
}
