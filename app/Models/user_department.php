<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_department extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'department_id'];
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    public function users()
    {
        return $this->belongsTo(users::class);
    }
    public function departments()
    {
        return $this->belongsTo(departments::class);
    }
    

}
