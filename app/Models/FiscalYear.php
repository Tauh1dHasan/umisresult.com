<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FiscalYear extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function createdBy()
    {
        return $this->belongsTo(User::class,'created_by','id');
    }
    
    public function updatedBy()
    {
        return $this->belongsTo(User::class,'updated_by','id');
    }

    public function trainingInfo()
    {
        return $this->hasMany(Training::class,'fiscal_year_id','id');
    }

    public function demonstrationInfo()
    {
        return $this->hasMany(Demostration::class,'fiscal_year_id','id');
    }

    public function horticultureProductIn()
    {
        return $this->hasMany(Order::class,'fiscal_year_id','id');
    }
}
