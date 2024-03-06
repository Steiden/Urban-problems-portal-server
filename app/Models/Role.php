<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory, Filterable;

    protected $table = 'roles';
    protected $fillable = ['name'];

    public function users() {
        return $this->hasMany(User::class, 'role_id', 'id');
    }
}
