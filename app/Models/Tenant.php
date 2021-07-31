<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    protected $fillable = [
        'cnpj', 'name', 'url', 'email', 'logo', 'active', 'plan_id',
        'subscription', 'expires_at', 'subscription_id', 'subscription_active', 'subscription_suspended'
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function plan()
    {
        return $this->belongsTo(Tenant::class);
    }
}
