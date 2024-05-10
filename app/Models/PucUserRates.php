<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PucUserRates extends Model
{
    use HasFactory;

    protected $table = 'puc_user_rates';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function pucType()
    {
    	return $this->belongsTo(PucTypes::class, 'puc_type_id');
    }
}
