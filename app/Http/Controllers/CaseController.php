<?php

namespace App\Http\Controllers;

use App\Models\CaseModel;
use App\Models\NextAction;
use App\Models\OpposingParty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CaseController extends Controller
{
    public function create()
    {
        return view('cases.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'case_title' => 'required|string|max:255',
            'case_number' => 'nullable|string|max:100|unique:cases,case_number',
            'client_name' => 'required|string|max:255',
            'client_phone' => 'required|string|max:50',
            'client_email' => 'nullable|email|max:255',
            'case_category' => 'required|string',
            'case_description' => 'required|string',
            'date_filed' => 'required|date',
            'priority' => 'required|string',
            'status' => 'required|string',
            'police_station_name' => 'required|string|max:255',
            'police_incharge_name' => 'required|string|max:255',
            'police_incharge_phone' => 'required|string|max:50',
            'police_incharge_email' => 'nullable|email|max:255',
            'notes' => 'nullable|string',
            'next_actions' => 'array',
            'next_actions.*' => 'nullable|date',
            'opposing_parties' => 'array',
            'opposing_parties.*.name' => 'nullable|string|max:255',
            'opposing_parties.*.address' => 'nullable|string',
            'opposing_parties.*.phone' => 'nullable|string|max:50',
            'opposing_parties.*.email' => 'nullable|email|max:255',
        ]);

        DB::transaction(function () use ($validated) {
            $case = CaseModel::create($validated);

            if (!empty($validated['next_actions'])) {
                foreach ($validated['next_actions'] as $date) {
                    if ($date) {
                        NextAction::create([
                            'case_id' => $case->id,
                            'action_date' => $date,
                        ]);
                    }
                }
            }

            if (!empty($validated['opposing_parties'])) {
                foreach ($validated['opposing_parties'] as $party) {
                    if (!empty(array_filter($party))) {
                        OpposingParty::create(array_merge(['case_id' => $case->id], $party));
                    }
                }
            }
        });

        Log::info('Submitted case form data:', $request->all());

        return redirect()->route('cases.create')->with('success', 'Case added successfully!');
    }

    public function index()
    {
        $cases = CaseModel::all();
        return view('cases.index', compact('cases'));
    }

    public function show($id)
    {
        $case = CaseModel::findOrFail($id);
        return view('cases.show', compact('case'));
    }
}
