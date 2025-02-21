<?php

namespace App\Enums;

enum Operation: string
{
    case ADDITION = '+';
    case SUBTRACTION = '-';
    case MULTIPLICATION = '*';
    case DIVISION = '/';

    public function calculate(float $leftOperand, float $rightOperand): float|string
    {
        return match ($this) {
            self::ADDITION => $leftOperand + $rightOperand,
            self::SUBTRACTION => $leftOperand - $rightOperand,
            self::MULTIPLICATION => $leftOperand * $rightOperand,
            self::DIVISION => ($rightOperand != 0) ? $leftOperand / $rightOperand : throw new \DivisionByZeroError('Division by zero !!!'),
        };
    }

    public static function toArray(): array
    {
        return array_column(self::cases(), 'value');
    }
}
