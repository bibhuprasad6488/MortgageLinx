<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactForm extends Model
{
    protected $fillable = [
        'full_name',
        'email_address',
        'phone_number',
        'enquiry_type',
        'your_subject',
        'your_messsage',
        'terms_conditions',
        'created_at',
        'updated_at',
    ];
}
