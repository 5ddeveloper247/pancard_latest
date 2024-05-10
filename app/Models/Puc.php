<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Puc extends Model
{
    use HasFactory;

    protected $table = 'puc';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    public function pucType()
    {
    	return $this->belongsTo(PucTypes::class, 'puc_type_id');
    }
}
