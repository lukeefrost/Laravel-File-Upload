<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = [
      'title',
      'overview'
    ];

    public function user()
    {
      return $this->belongsTo(User::class);
    }
}
