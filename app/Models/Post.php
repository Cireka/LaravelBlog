<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // we need this to conduct "Mass Assigment" with this code we are only allowing following titles to be Assigned
    // this is security step so user doesnot sneak in the code that allows him to upgrade his "Subscription Status" field
    //protected $fillable = ['title','excerpt','body'];

    // using following code we can assign everything except ones provided in guarded atribute
   protected $guarded = ['id'];
  //  protected $table = 'users'; if we wanted to change the table it's connected to we type this

    public function category()
        // we made function for this class to return category where this post belongs to
        // to put it simply when we use this class and use category method/function on it
        // laravel will get us back corresponding Category
        // connection is set up below
    {
        // laravel assumes the name of the table line which this lines connects us to
        // to be specific we can use second argument that belongsTo function has which is
        // name of the table line in this case category_id
        // return $this->belongsTo(Category::class, 'category_id');
        return $this->belongsTo(Category::class);
    }

    public function author(){
        return $this->belongsTo(User::class,'user_id');
    }
}
