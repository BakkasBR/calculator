<?php

use App\Enums\Operation;
use App\Http\Controllers\CalculatorController;
use Illuminate\Support\Facades\Route;

beforeEach(function () {
    Route::post('/calculate', [CalculatorController::class, 'calculate']);
});

it('can add two numbers via the controller', function () {
    $response = $this->postJson('/calculate', [
        'a' => 2,
        'b' => 3,
        'operation' => Operation::ADDITION,
    ]);

    $response->assertStatus(200)
        ->assertJson(['result' => 5]);
});

it('can subtract two numbers via the controller', function () {
    $response = $this->postJson('/calculate', [
        'a' => 5,
        'b' => 3,
        'operation' => Operation::SUBTRACTION,
    ]);

    $response->assertStatus(200)
        ->assertJson(['result' => 2]);
});

it('can multiply two numbers via the controller', function () {
    $response = $this->postJson('/calculate', [
        'a' => 2,
        'b' => 3,
        'operation' => Operation::MULTIPLICATION,
    ]);

    $response->assertStatus(200)
        ->assertJson(['result' => 6]);
});

it('can divide two numbers via the controller', function () {
    $response = $this->postJson('/calculate', [
        'a' => 6,
        'b' => 3,
        'operation' => Operation::DIVISION,
    ]);

    $response->assertStatus(200)
        ->assertJson(['result' => 2]);
});

it('throws an exception when dividing by zero via the controller', function () {
    $response = $this->postJson('/calculate', [
        'a' => 6,
        'b' => 0,
        'operation' => Operation::DIVISION,
    ]);

    $response->assertStatus(422);
});
