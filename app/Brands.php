<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brands extends Model
{
    protected $table = 'brands';
    protected $primaryKey = 'brand_id';
    protected $fillable   = ['brand_id','brand_name'];   
    protected $brand_id;
    protected $brand_name;    
    protected $brand_image;   
    protected $created_at;
    protected $updated_at;
    public $timestamps = false; // for false updated_at and created_at
    
    
    
    //---------------one to many relationship with products---------------------
    public function products() {
        return $this->hasMany('\App\Products','category_id');        
    }
}
