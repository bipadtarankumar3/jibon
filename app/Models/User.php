<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
// use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    // use SoftDeletes;
    protected $guarded = [];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];

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
    ];

    public function documents()
    {
        return $this->hasMany(Documents::class, 'item_id');
    }

    public function addressDetails()
    {
        return $this->hasOne(BrrowersAddress::class, 'user_id');
    }
    public function address()
    {
        return $this->hasOne(BrrowersAddress::class, 'user_id');
    }

    public function loanDetails()
    {
        return $this->hasMany(BrrowersLoanDetails::class, 'user_id');
    }
}
