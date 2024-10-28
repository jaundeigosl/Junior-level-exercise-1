<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Recharge extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'total_price',
        'total_tokens',
        'session_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
