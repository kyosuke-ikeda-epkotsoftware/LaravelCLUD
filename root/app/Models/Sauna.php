<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sauna extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = ['name','bath','sauna','outdoor','evaluation','comment','img_path'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }
}
