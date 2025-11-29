<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\HomeBudget;

class Category extends Model
{
    public $timestamps = false;

    protected $fillable = ['name'];

    public function homeBudgets() {
        return $this->hasMany(HomeBudget::class);
    }
}
