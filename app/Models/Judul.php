<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Judul extends Model
{
    use HasFactory; 
    protected $table = "juduls";
    protected $primaryKey = "id";
    protected $fillable = ['judul'];

    public function quiz(){
        return $this->hasMany(Quiz::class);
    }
}
