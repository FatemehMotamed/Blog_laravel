<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $guarded = ['updated_at', 'created_at'];

    public function article (){
        return $this->belongsTo(Article::class);
    }
}
