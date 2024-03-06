<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class ProblemFilter extends AbstractFilter
{
    public const TITLE = 'title';
    public const DESCRIPTION = 'description';
    public const USER_ID = 'user_id';
    public const STATUS_ID = 'status_id';

    protected function getCallbacks(): array
    {
        return [
            self::TITLE => [$this, 'title'],
            self::DESCRIPTION => [$this, 'description'],
            self::USER_ID => [$this, 'user_id'],
            self::STATUS_ID => [$this, 'status_id'],
        ];
    }

    public function title(Builder $builder, $value) {
        $builder->where('title', 'like', "%$value%");
    }

    public function description(Builder $builder, $value) {
        $builder->where('description', 'like', "%$value%");
    }

    public function user_id(Builder $builder, $value) {
        $builder->where('user_id', $value);
    }

    public function status_id(Builder $builder, $value) {
        $builder->where('status_id', $value);
    }
}