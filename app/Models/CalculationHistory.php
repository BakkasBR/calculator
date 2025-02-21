<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CalculationHistory extends Model
{
    protected $fillable = [
        'left_operand',
        'right_operand',
        'operation',
        'result',
    ];
}
