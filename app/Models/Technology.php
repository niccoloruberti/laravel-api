<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project;

class Technology extends Model
{
    use HasFactory;

    public static function generateSlug($name) {
        
        return Str::slug($name, '-');
    }

    protected $fillable = ['name', 'slug'];

    public function projects() {
        return $this->belongsToMany(Project::class);
    }
}
