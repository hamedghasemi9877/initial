<?php

namespace App\Models;
use Conner\Likeable\Likeable;
use App\Models\Like;
use App\Models\User;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory,Likeable;
 
  
    protected $table ='posts';
    protected $fillable = ['title', 'body','user_id'];

    //Relation Method=>One to Many
   
  
   
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
//     public function scopeFilter(Builder $builder,Array $params)
//     {
//         if(isset($params['sortby'])&&$params['sortby']=='created_at'){
//             $builder->orderBy('created_at','desc');
//         }
       
      
    
//         return $builder;
    
// }
}