<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{
    use HasFactory;
    public function district() {
        return $this->hasOne(District::class, 'id', 'district_id');
    }
    public function thana() {
        return $this->hasOne(Upazila::class, 'id', 'thana_id');
    }
}
