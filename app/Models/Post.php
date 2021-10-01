<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Post
 * @package App\Models
 */
class Post extends Model
{
    const CATEGORIES = [
      'Algorithms' => 1,
      'Patterns' => 2,
      'Articles' => 3,
    ];

    use HasFactory;

}
