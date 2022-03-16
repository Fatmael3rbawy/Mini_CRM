<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'first_name',
        'last_name',
        'email',
        'phone',
        'linkedIn_url'
    ];
    
    public function company()
    {
        return $this->belongsTo(company::class);
    }
}
