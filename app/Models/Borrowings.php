<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrowings extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function students()
    {
        return $this->belongsTo(students::class);
    }

    public function books()
    {
        return $this->belongsTo(Books::class);
    }

    public function admins()
    {
        return $this->belongsTo(Admins::class);
    }
}
