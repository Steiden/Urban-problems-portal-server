<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory, Filterable;

    protected $guarded = false;
    protected $table = 'statuses';

    public function problems() {
        return $this->hasMany(Problem::class, 'status_id', 'id');
    }
}
