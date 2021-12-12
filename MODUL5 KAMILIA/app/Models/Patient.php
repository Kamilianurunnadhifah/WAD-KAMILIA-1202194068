<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $table="patients";
    protected $fillable = [
        'name', 'nik', 'alamat','no_hp','vaccine_id','image_ktp'
    ];
}
