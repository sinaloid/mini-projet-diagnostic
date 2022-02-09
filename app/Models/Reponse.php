<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Diagnostic;
class Reponse extends Model
{
    use HasFactory;
    public function diagnostic()
    {
        return $this->belongsTo(Diagnostic::class);
    }
}
