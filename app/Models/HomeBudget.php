<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class HomeBudget extends Model
{
    use HasFactory;

    protected $table = 'home_budgets';

    protected $fillable = [
        'date', 'category_id', 'price'
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d',
        'updated_at' => 'datetime:Y-m-d',
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }
}
