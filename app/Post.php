<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Comment;
class Post extends Model
{
    //
    protected $fillable = [ 
        'title', 'body', 'user_id','excerpt','is_published' , 'created_at' ,'update_at'        // لاستنثناء حقول علشان نعمل update 
    ];
    public function comments(){
        /*   App\Post Model  */
          return $this->hasMany(Comment::class);
  
      }

    public function user(){
        /*   App\Post Model  */
          return $this->belongsTo(User::class);
  
      }
}
