<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['first_name', 'last_name', 'school_id', 'date_of_birth', 'hometown'];

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function getDateOfBirthAttribute($value)
    {
        return Carbon::parse($value);
    }
}
