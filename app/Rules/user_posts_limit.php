<?php

namespace App\Rules;

use App\Post;
use Illuminate\Contracts\Validation\Rule;

class user_posts_limit implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //

    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
//        dd($value);
        $posts_count = Post::where($attribute, $value)->count();
//        dd($posts);
        if($posts_count >=3)
        {
            return false;
        }
        else{return true;}
//        return true;

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'you can create only 3  posts';
    }
}
