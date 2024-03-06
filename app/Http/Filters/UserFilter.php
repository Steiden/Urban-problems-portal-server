<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class UserFilter extends AbstractFilter
{
    public const SECOND_NAME = 'second_name';
    public const FIRST_NAME = 'first_name';
    public const PATRONYMIC = 'patronymic';
    public const LOGIN = 'login';
    public const EMAIL = 'email';
    public const ROLE_ID = 'role_id';

    protected function getCallbacks(): array
    {
        return [
            self::SECOND_NAME => [$this, 'second_name'],
            self::FIRST_NAME => [$this, 'first_name'],
            self::PATRONYMIC => [$this, 'patronymic'],
            self::LOGIN => [$this, 'login'],
            self::EMAIL => [$this, 'email'],
            self::ROLE_ID => [$this, 'role_id'],
        ];
    }

    public function second_name(Builder $builder, $value) {
        $builder->where('second_name', 'like', "%$value%");
    }

    public function first_name(Builder $builder, $value) {
        $builder->where('first_name', 'like', "%$value%");
    }

    public function patronymic(Builder $builder, $value) {
        $builder->where('patronymic', 'like', "%$value%");
    }

    public function login(Builder $builder, $value) {
        $builder->where('login', $value);
    }

    public function email(Builder $builder, $value) {
        $builder->where('email', $value);
    }

    public function role_id(Builder $builder, $value) {
        $builder->where('role_id', $value);
    }
}