<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CaseModel extends Model
{
    protected $table = 'cases';

    protected $fillable = [
        'case_title', 'case_number', 'client_name', 'client_phone', 'client_email',
        'case_category', 'case_description', 'date_filed', 'priority', 'status',
        'police_station_name', 'police_incharge_name', 'police_incharge_phone',
        'police_incharge_email', 'notes'
    ];

    public function nextActions()
    {
        return $this->hasMany(NextAction::class, 'case_id');
    }

    public function opposingParties()
    {
        return $this->hasMany(OpposingParty::class, 'case_id');
    }
}
