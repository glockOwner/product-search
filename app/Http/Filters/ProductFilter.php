<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class ProductFilter extends AbstractFilter
{
    public const Q = 'q';
    public const PRICE_FROM = 'price_from';
    public const PRICE_TO = 'price_to';
    public const CATEGORY_ID = 'category_id';
    public const IN_STOCK = 'in_stock';
    public const RATING_FROM = 'rating_from';
    public const SORT = 'sort';


    protected function getCallbacks(): array
    {
        return [
            self::Q => [$this, 'q'],
            self::PRICE_FROM => [$this, 'price_from'],
            self::PRICE_TO => [$this, 'price_to'],
            self::CATEGORY_ID => [$this, 'category_id'],
            self::IN_STOCK => [$this, 'in_stock'],
            self::RATING_FROM => [$this, 'rating_from'],
            self::SORT => [$this, 'sort'],
        ];
    }

    public function q(Builder $builder, $value)
    {
        $builder->where('name', 'like', "{$value}%");
    }

    public function price_from(Builder $builder, $value)
    {
        $builder->where('price', '>=', $value);
    }

    public function price_to(Builder $builder, $value)
    {
        $builder->where('price', '<=', $value);
    }

    public function category_id(Builder $builder, $value)
    {
        $builder->where('category_id', $value);
    }

    public function in_stock(Builder $builder, $value)
    {
        $builder->where('in_stock', $value);
    }

    public function rating_from(Builder $builder, $value)
    {
        $builder->where('rating', '>=', $value);
    }

    public function sort(Builder $builder, $value)
    {
        $explodedString = explode('_', $value);
        count($explodedString) > 1 ? $builder->orderBy($explodedString[0], $explodedString[1]) : $builder->orderBy('created_at', 'desc');
    }
}
