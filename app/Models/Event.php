<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Event extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'events';

    protected $fillable = [
        'title',
        'description',
        'date',
        'location_name',
        'lat',
        'lng',
        'influencer_name',
        'contact_email',
        'contact_phone',
        'reservation_url',
        'tags',
    ];

    protected $casts = [
        'date' => 'datetime',
        'lat' => 'float',
        'lng' => 'float',
        'tags' => 'array',
    ];
}