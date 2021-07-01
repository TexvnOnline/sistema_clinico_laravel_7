<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecipeDetail extends Model
{
    protected $fillable = [
        'medicine','instruction', 'recipe_id',
    ];
    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }
}
