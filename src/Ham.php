<?php

require_once __DIR__ . '/src/Validator.php';

$validator = new Validator();

$input = [
    'email' => 'not-an-email',
    'password' => '123',
];

$rules = [
    'email' => 'required|email',
    'password' => 'required|min:8',
];

if ($validator->validate($input, $rules)) {
    echo "Valid input!\n";
} else {
    print_r($validator->errors());
}
