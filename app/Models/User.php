<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'type',
        'name',
        'username',
        'email',
        'phone_number',
        'email_verified_at',
        'password',
        'otp',
        'otp_created_at',
        'user_type',
        'company_name',
        'pin_code',
        'state_id',
        'city_id',
        'area_id',
        'landmark',
        'profile_picture',
        'aadhar',
        'upload_option',
        'balance',
        'challan_rate',
        'status',
        'remember_token',
    ];
    

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function state()
    {
    	return $this->belongsTo(States::class, 'state_id');
    }
    public function city()
    {
    	return $this->belongsTo(Cities::class, 'city_id');
    }
    public function area()
    {
    	return $this->belongsTo(Areas::class, 'area_id');
    }

    public function pucRates()
    {
        return $this->hasMany(PucUserRates::class, 'user_id');
    }
}
