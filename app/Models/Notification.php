<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $fillable=['notification'];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function administrator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
