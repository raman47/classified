<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostAd extends Model
{
    use HasFactory;
    protected $fillable = ['country_id', '	state_id', 'city_id', 'company_name', 'contact_name', 'phone', 'fax', 'website', 'meta_desc', 'meta_keywords', 'email', 'postal_code', 'address', 'description', 'price', 'youtube', 'tags', 'ad_position', 'price_plan', 'audio', 'photos', 'user_id'];
}
