<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    use HasFactory;
    protected $table = 'consultations';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'index_id','item_name', 'description', 'material', 'quantity', 'user_id', 'offers_id', 'start_date', 'end_date', 'consultation_status'
    ];
}
