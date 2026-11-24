# PHP Mini Validator

A lightweight, zero-dependency input validation library for PHP 8+.

## Usage

```php
require_once __DIR__ . '/src/Validator.php';

$validator = new Validator();
$isValid = $validator->validate([
    'email' => 'reader@example.com',
    'password' => 'example-password',
], [
    'email' => 'required|email',
    'password' => 'required|min:8',
]);

if (!$isValid) {
    print_r($validator->errors());
}
```

## Rules

| Rule | Behavior |
| --- | --- |
| `required` | Rejects missing or blank values. |
| `email` | Checks nonempty, truthy values using PHP's email filter. |
| `min:N` | Checks the byte length of a non-null value. |

Combine rules with `|`. Each call to `validate()` resets previous errors. `errors()` returns messages grouped by field name.

## Scope and limitations

This is a small learning-oriented library intended for scalar form values. It is not a complete validation framework: unknown rules are ignored, array inputs are not supported, and minimum length is measured in bytes rather than Unicode characters. Do not rely on it as your only security control. Validate input types and use parameterized database queries and context-appropriate output escaping.

## Feedback

Report reproducible issues through GitHub without including real passwords or personal information.
