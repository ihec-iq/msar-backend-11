<?php

namespace App\Enum;

enum EnumTypeChoseShareDocument: int
{
    case None = 0;
    case ToSection = 1;
    case ToAllEmployees = 2;
    case ToCustom = 3;
    case ToEmployee = 4;
}
