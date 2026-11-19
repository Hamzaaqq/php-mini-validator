# php-mini-validator

A lightweight, zero-dependency input validation library for PHP 8+.

## Usage

```php
require_once __DIR__ . '/src/Validator.php';

$validator = new Validator();$isValid = $validator->validate($_POST, [
    'email' => 'required|email',
    'password' => 'required|min:8',
]);

if (!$isValid) {
    print_r($validator->errors());
}
