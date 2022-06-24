<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vidio extends Model
{ 
    use HasFactory;
    protected $table = "vidios";
    protected $primaryKey = "id";
    protected $fillable = ['gambar','title', 'video', 'proofby', 'penjelasan'];
    protected $dates = ['created_at'];
    public $timestamps = false; 
}
