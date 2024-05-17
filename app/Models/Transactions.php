<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    use HasFactory;
    protected $table = 'transactions';
    protected $fillable = [
        'transaction_type','user_id','bank_id','amount','transaction_number','status','transaction_status','date'
    ];

    public function createdByUser()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function bankName()
    {
        return $this->belongsTo(Banks::class, 'bank_id', 'id');
    }
    public function userPuc()
    {
        return $this->belongsTo(Puc::class, 'puc_id', 'id');
    }
}
