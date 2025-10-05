<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NextAction extends Model
{
    protected $fillable = ['case_id', 'action_date'];

    public function case()
    {
        return $this->belongsTo(CaseModel::class, 'case_id');
    }
}
