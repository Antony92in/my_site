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

    public $timestamps = false;

    use HasFactory;

    /**
     * @param $value
     */
    public function setContentAttribute($value)
    {
        $this->attributes['content'] = $this->convertTags($value);
    }

    /**
     * @param string $text
     * @return string|null
     */
    private function convertTags(string $text):? string
    {
        return str_replace("<?php", "&lt?php", $text);
    }

}
