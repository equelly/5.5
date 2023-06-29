<?php

namespace App\Http\Filters;

use App\Http\Filters\AbstractFilter;
use Illuminate\Database\Eloquent\Builder;

class PostFilter extends AbstractFilter
{
    //константам присваиваем ключи из массива request
    public const TITLE = 'title';
    public const CONTENT = 'content';
    public const IMAGE = 'image';

    protected function getCallbacks(): array
    {
        return [
            self::TITLE => [$this, 'title'],
            self::CONTENT => [$this, 'content'],
            self::IMAGE => [$this, 'image'],
        ];
    }
    public function title(Builder $builder, $value)
    {
        $builder->where('title', 'like', "%{$value}%");
    }
    public function content(Builder $builder, $value)
    {
        $builder->where('content', 'like', "%{$value}%");
    }
    public function image(Builder $builder, $value)
    {
        $builder->where('image', 'like', $value);
    }

}