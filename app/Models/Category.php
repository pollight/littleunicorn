<?php

namespace App\Models;

use Encore\Admin\Traits\AdminBuilder;
use Encore\Admin\Traits\ModelTree;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Category extends Model
{
    use Sluggable;

    protected $fillable = ['name','category_id','slug'];

    public $timestamps = false;

    public function getImageAttribute()
    {
        return '../storage/'.$this->img;
    }
    public function scopeCategoryFilter($query)
    {
        return $query->where('category_id', 0);
    }
    public function categories()
    {
        return $this->hasMany('App\Models\Category', 'category_id', 'id');
    }
    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id', 'id');
    }

    public function childrenCategories()
    {
        return $this->hasMany(Category::class)->with('categories');
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function products() {
        return $this->hasMany(Product::class);
    }

    public function getCount()
    {
        $count = 0;
        if($this->childrenCategories->count() > 0 ) {
            foreach ($this->childrenCategories as $category){
                $count += $category->products->count();
            }
        }else{
            $count = $this->products->count();
        }

        return $count;
    }

    public static function getCategory($category){
        return self::where('slug',$category)->first();
    }

    public function getActionCategory($childrenCategory = null){
        if($childrenCategory){
            return url('/').'/category/'.$this->slug.'/'.$childrenCategory->slug;
        }else{
            return url('/').'/category/'.$this->slug;
        }
    }
    public static function getGroup(){
      $group = self::where('name','Группы')->first();
     return self::where('category_id',$group->id)->get();
    }
}
