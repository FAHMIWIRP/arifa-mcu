<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable = ['name', 'sip', 'sk_kemenaker'];

    public function mcuSessions()
    {
        return $this->hasMany(McuSession::class);
    }
}