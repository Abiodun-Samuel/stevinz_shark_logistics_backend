<?php

namespace App\Enums\Api;

enum PaymentMode: String
{
    case CASH = 'cash';
    case TRANSFER = 'transfer';
    case DEBIT = 'debit';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
