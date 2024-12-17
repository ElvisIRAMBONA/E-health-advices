<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
 use HasFactory;
protected $fillable = ['namep', 'description', 'price', 'category_id', 'stock','image_url', 'dateofcreation', 'datemodif'];

// Define the relationship with the Category model
public function category()
{
return $this->belongsTo(Category::class);
}
}
?>