<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    public function getway() {
        return $this->hasOne(PaymentGetway::class,'id', 'getway_id');
    }
}
