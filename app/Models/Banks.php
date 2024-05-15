<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banks extends Model
{
    protected $table = 'banks';
    protected $fillable= [
        'bank_type','bank_name','holder_name','account_number','ifsc_code','enable'
    ];
    use HasFactory;
}
