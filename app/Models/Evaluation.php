<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    use HasFactory;

    protected $fillable = ['titre', 'type', 'date'];

    public function notes() {
        return $this->hasMany(Note::class);
    }
}

