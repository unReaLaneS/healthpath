<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Tags\HasTags;

class FieldsOfPractice extends Model
{
    use HasFactory;
    use HasTags;

    protected $guarded = [];

    public function practices()
    {
        return $this->belongsToMany(Practice::class, 'practices__fields_of_practices', 'fields_of_practice_id');
    }
}
