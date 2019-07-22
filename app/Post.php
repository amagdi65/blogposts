<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use SoftDeletes;

    
    protected $fillable=[
        'title','body','content','image','category_id','user_id'
    ];

    /**
     * Delete post image from storage
     * 
     * @return void
     */

    public function deleteImage()
    {
        Storage::delete(str_replace('storage/','',$this->image));
    }

    //relationship function

    public function category()
    {
        return $this->belongsTo(Category::class);
        //or ('App\Category')
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
    /**
     * check if post has tag
     * 
     * @return boot
     */
    
    public function hasTag($tagId)
    {
        return in_array($tagId, $this->tags->pluck('id')->toArray());
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeSearched($query)
    {
        $search= request()->query('search');

        if(!$search)
        {
            return $query;
        }

        return $query->where('title','LIKE', "%{$search}%");
    }

}
