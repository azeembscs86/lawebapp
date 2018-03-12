<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'product_id';
    protected $fillable   = ['category_id','brand_id','product_name','product_price'];   
    protected $product_id;
    protected $category_id;
    protected $brand_id;
    protected $product_name;
    protected $product_price;    
    protected $product_quantity;   
    protected $product_image;
    protected $created_at;
    protected $updated_at;
    public $timestamps = false; // for false updated_at and created_at
    
    
    
    //---------------one to many relationship with categories---------------------
    public function categories() {
        return $this->belongsTo('\App\Categories','category_id');        
    }
    
    //---------------one to many relationship with brand---------------------
    public function brands() {
        return $this->belongsTo('\App\Brands','brand_id');        
    }
}
