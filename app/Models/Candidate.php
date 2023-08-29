<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;

    protected $table = 'candidates';

    protected $guarded = ['id'];

    protected $fillable = ['email', 'phone_number', 'full_name', 'dob', 'pob', 'gender', 'year_exp', 'last_salary'];

}
