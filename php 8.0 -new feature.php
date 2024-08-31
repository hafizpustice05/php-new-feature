<?php

/**
 * New Feature in PHP 8.0
 */

/**
 * Named Argument
 */

Route::get(url: "/path", action: [AuthController::class, 'index']);


/**
 * Union Types
 */

function normalDemoFunction(string|array $name): int|float {}

/**
 * Nullsafe operator
 */
$userEmail = User::first()?->email;

/**
 * Constructor Property Promotion
 *
 */
class Point
{
    public function __construct(
        public float $x = 0.0,
        public float $y = 0.0
    ) {}
}

new Point(x: 1.2, y: 3.5);

/**
 * match expression alternate of switch
 *
 */

$message = match ($statusCOde) {
    200,
    300 => null,
    400 => 'not found',
    500 => 'server error',
    default => 'Unknown status code '
};

/**
 *
 *
 */
