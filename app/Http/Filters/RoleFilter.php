<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class RoleFilter extends AbstractFilter
{
    public const NAME = 'name';

    protected function getCallbacks(): array
    {
        return [
            self::NAME => [$this, 'name'],
        ];
    }

    public function name(Builder $builder, $value) {
        return $builder->where('name', $value);
    }
}