<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BecomeAnIntroducerForm extends Model
{
    protected $fillable = [
        'business_name',
        'trading_name',
        'role',
        'range',
        'contact_name',
        'contact_email',
        'contact_phone',
        'contact_method',
        'created_at',
        'updated_at'
    ];
}
