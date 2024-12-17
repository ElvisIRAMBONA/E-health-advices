<?php
namespace App\Models;
use App\Models\User; 


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model; // Add this line
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model { 

    use HasFactory;

    protected $fillable = [
        'product_id',
        'quantity',
        'user_id', // Assuming orders table has a user_id foreign key
        'total',   // Add this if you have a total field in the orders table
        'status',  // Add this if you have a status field
    ];

    // Relationship with the Product model
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    }