<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
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
    
    public function divisionInfo()
    {
        return $this->belongsTo(Division::class,'division_id','id');
    }
}
