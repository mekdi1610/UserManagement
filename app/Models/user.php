<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class user extends Model
{
    use SoftDeletes;

    use HasFactory;
    protected $fillable = ['name', 'email', 'phone_number'];
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function departments()
    {
        return $this->belongsToMany(department::class, 'user_departments');
    }
    public function user_departments()
    {
        return $this->hasMany(user_department::class);
    }
}
