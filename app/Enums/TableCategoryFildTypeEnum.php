<?php

namespace App\Enums;

enum TableCategoryFildTypeEnum: string
{
    case RENT = "rent";
    case Sale = "sale";

    public function toPersian(): string
    {
        return match ($this){
            self::RENT=>"اجاره",
            self::Sale => "رهن",
            default=>"aaa",
        };
    }
}
