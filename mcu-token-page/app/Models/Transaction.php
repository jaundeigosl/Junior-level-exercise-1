<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'purpouse',
        'amount_transfered',
        'amount_recieved',

    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
