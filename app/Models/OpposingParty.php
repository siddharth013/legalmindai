<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OpposingParty extends Model
{
    protected $fillable = ['case_id', 'name', 'address', 'phone', 'email'];

    public function case()
    {
        return $this->belongsTo(CaseModel::class, 'case_id');
    }
}
