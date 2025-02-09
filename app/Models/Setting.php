<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'site_name', 
        'logo', 
        'phone', 
        'address', 
        'footer_info', 
        'ads', 
        'modal_active', 
        'modal_content', 
        'ad_image_1', 
        'ad_image_2'
    ];
}
