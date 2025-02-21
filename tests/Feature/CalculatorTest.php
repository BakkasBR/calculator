<?php

use App\Enums\Operation;
use App\Http\Controllers\CalculatorController;
use Illuminate\Support\Facades\Route;

beforeEach(function () {
    Route::post('/process', [CalculatorController::class, 'process'])->name('calculator.process');
    Route::get('/calculator', [CalculatorController::class, 'index'])->name('calculator.index');
});

it('can add two numbers via the controller', function () {
    $response = $this->post('/process', [
        'leftOperand' => 2,
        'rightOperand' => 3,
        'operation' => Operation::ADDITION->value,
    ]);

    $response->assertStatus(302)
        ->assertRedirect(route('calculator.index'))
        ->assertSessionHas('result', 5);
});

it('can subtract two numbers via the controller', function () {
    $response = $this->post('/process', [
        'leftOperand' => 5,
        'rightOperand' => 3,
        'operation' => Operation::SUBTRACTION->value,
    ]);

    $response->assertStatus(302)
        ->assertRedirect(route('calculator.index'))
        ->assertSessionHas('result', 2);
});

it('can multiply two numbers via the controller', function () {
    $response = $this->post('/process', [
        'leftOperand' => 2,
        'rightOperand' => 3,
        'operation' => Operation::MULTIPLICATION->value,
    ]);

    $response->assertStatus(302)
        ->assertRedirect(route('calculator.index'))
        ->assertSessionHas('result', 6);
});

it('can divide two numbers via the controller', function () {
    $response = $this->post('/process', [
        'leftOperand' => 6,
        'rightOperand' => 3,
        'operation' => Operation::DIVISION->value,
    ]);

    $response->assertStatus(302)
        ->assertRedirect(route('calculator.index'))
        ->assertSessionHas('result', 2);
});

it('throws an exception when dividing by zero via the controller', function () {
    $response = $this->post('/process', [
        'leftOperand' => 6,
        'rightOperand' => 0,
        'operation' => Operation::DIVISION->value,
    ]);

    $response->assertStatus(302)
        ->assertRedirect(route('calculator.index'))
        ->assertSessionHasErrors();
});
