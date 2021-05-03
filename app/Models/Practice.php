<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Practice extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function fields_of_practices()
    {
        return $this->belongsToMany(FieldsOfPractice::class, 'practices__fields_of_practices');
    }

    public function employees()
    {
        return $this->HasMany(Employee::class);
    }
}
