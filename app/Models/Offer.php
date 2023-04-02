<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Offer extends Model
{
    protected $fillable = [
        'name',
        'description',
        'images',
        'type'
    ];
    // protected function type(): Attribute
    // {
    //     return new Attribute(
    //         get: fn ($value) =>  [ "services","training"][$value],
    //     );
    // }
}
