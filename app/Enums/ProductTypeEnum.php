<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;


/**
 * @method static static FOOD()
 * @method static static DRINK()
 */
final class ProductTypeEnum extends Enum
{
    const FOOD = 'food';
    const DRINK = 'drink';
}
