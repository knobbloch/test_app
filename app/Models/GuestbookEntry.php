<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuestbookEntry extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_name',
        'email',
        'text',
        'ip_address',
        'user_agent',
    ];
}
