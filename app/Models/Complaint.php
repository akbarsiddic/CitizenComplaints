<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image',
        'category_id',
        'location_id',
        'status',
        'user_id',
    ];

    use HasFactory;
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
