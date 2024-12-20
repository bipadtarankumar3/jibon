<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BrrowersLoanDetails extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function market()
    {
        return $this->belongsTo(Market::class, 'market_id');
    }
    public function doucuments()
    {
        return $this->hasMany(Documents::class, 'item_id','user_id');
    }
    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'trans_loan_id','id');
    }

    public function emi()
    {
        return $this->hasMany(Emi::class, 'loan_id','id');
    }
    public function address()
    {
        return $this->hasOne(BrrowersAddress::class, 'user_id','user_id');
    }

    public function loan_type()
    {
        return $this->belongsTo(LoanType::class, 'loan_type_id');
    }
}
