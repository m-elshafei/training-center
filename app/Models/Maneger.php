<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maneger extends Model
{
    use HasFactory;
    protected $table = 'manegers';

    protected $fillable = ['name', 'company_id'];
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
