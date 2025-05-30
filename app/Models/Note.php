<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // <-- ligne à ajouter
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $fillable = ['etudiant_id', 'evaluation_id', 'note'];

    public function etudiant() {
        return $this->belongsTo(Etudiant::class);
    }

    public function evaluation() {
        return $this->belongsTo(Evaluation::class);
    }
}
