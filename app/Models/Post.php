<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'content',
        'img',
    ];

    public function category(){
        return $this->hasOne(Category::class);
    }
    public function user(){
        return $this->hasOne(User::class);
    }
}
