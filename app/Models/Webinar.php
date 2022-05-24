<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Webinar extends Model
{
    use HasFactory;
    protected $table = "webinars";
    protected $primaryKey = "id";
    protected $fillable = ['judul', 'gambar'];
    protected $dates = ['created_at'];
    public $timestamps = false; 

} 
