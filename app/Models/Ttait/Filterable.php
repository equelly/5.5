<?php

namespace App\Models\Trait;

use App\Http\Filters\FilterInterface;
use Illuminate\Database\Eloquent\Builder;

trait Filterable
{
    //filter() в php
    //этот метод импортируется в каждую модель при необходимости
    public function scopeFilter(Builder $builder, FilterInterface $filter) 
    {
        $filter->apply($builder);

        return $builder;
    }
}