<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Comment extends Model
{
    //
    
    public function post(){
        /*   App\Post Model  */
          return $this->belongsTo(Post::class);
  
      }
    public function user(){
        /*   App\Post Model  */
          return $this->belongsTo(User::class);
  
      }
}
