<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FieldType extends Model
{
    use HasFactory;

    public function Field()
    {
        return $this->hasMany(Field::class, 'field_type_id', 'id');
    }
}
