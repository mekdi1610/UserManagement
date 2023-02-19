<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class department extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'location'];
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    public function users()
    {
        return $this->belongsToMany(user::class, 'user_departments');
    }
    public function user_department()
    {
        return $this->hasMany(user_department::class);
    }
}
