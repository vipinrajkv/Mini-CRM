<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'contact_name',
        'contact_email',
        'contact_phone_number',
        'client_name',
        'client_address',
        'client_post',
        'client_city',
        'gst_no',
    ];
}
