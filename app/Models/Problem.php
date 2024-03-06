<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Problem extends Model
{
    use HasFactory, SoftDeletes, Filterable;

    protected $guarded = false;
    protected $table = 'problems';

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function status() {
        return $this->belongsTo(Status::class, 'status_id', 'id');
    }
}
