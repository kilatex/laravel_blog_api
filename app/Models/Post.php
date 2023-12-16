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
        'user_id',
        'category_id',
        'title',
        'content',
        'img',
    ];

    public function user(){
        return $this->belongsTo('App\Models\User','user_id');
    }
    public function category(){
        return $this->belongsTo('App\Models\Category','category_id');
    }
  
}
