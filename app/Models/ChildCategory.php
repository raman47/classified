<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChildCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'image', 'sub_category_id'];

    public function sub_category()
    {
        return $this->belongsTo(SubCategory::class);
    }
}
