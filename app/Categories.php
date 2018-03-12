<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'category_id';
    protected $fillable   = ['category_id','cat_name'];   
    protected $category_id;
    protected $cat_name;    
    protected $created_at;
    protected $updated_at;
    public $timestamps = false; // for false updated_at and created_at
    
    
    //---------------one to many relationship with products---------------------
    public function products() {
        return $this->hasMany('\App\Products','category_id');        
    }
}
