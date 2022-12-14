<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    use HasFactory;

    protected $fillable = ['content', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->hasMany(like::class)
            ->where(function ($query) {
                if (auth()->check()) {
                    $query->where('user_id', auth()->user()->id);
                }
            });
    }

    public function contador()
   {
        $total = like::distinct('tweet_id')->count();
        // return $total;
   }
}
