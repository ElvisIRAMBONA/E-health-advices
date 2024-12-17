<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Assuming your categories table has 'id' and 'name' fields
    protected $fillable = ['name'];

    // Define the relationship with Product
    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }
}