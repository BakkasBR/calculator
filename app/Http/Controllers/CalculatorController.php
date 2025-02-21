<?php

namespace App\Http\Controllers;

use App\Enums\Operation;
use App\Models\CalculationHistory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Inertia\Inertia;
use Inertia\Response;

class CalculatorController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Calculator', [
            'operations' => Operation::toArray(),
            'history' => CalculationHistory::latest()->take(10)->get(),
        ]);
    }

    public function process(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'leftOperand' => ['required', 'numeric'],
            'rightOperand' => ['required', 'numeric'],
            'operation' => ['required', Rule::enum(Operation::class)],
        ]);

        $operation = Operation::from($validated['operation']);
        $result = $operation->calculate($validated['leftOperand'], $validated['rightOperand']);

        if (is_float($result)) {
            CalculationHistory::create([
                'left_operand' => $validated['leftOperand'],
                'right_operand' => $validated['rightOperand'],
                'operation' => $validated['operation'],
                'result' => $result,
            ]);
        }

        return to_route('calculator.index')->with('result', $result);
    }
}
