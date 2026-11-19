<?php

declare(strict_types=1);

class Validator
{
    private array $errors = [];

    public function validate(array $data, array $rules): bool
    {
        $this->errors = [];

        foreach ($rules as $field => $fieldRules) {
            $value = $data[$field] ?? null;

            foreach (explode('|', $fieldRules) as $rule) {
                $this->applyRule($field, $value, $rule);
            }
        }

        return empty($this->errors);
    }

    private function applyRule(string $field, mixed $value, string $rule): void
    {
        if ($rule === 'required' && ($value === null || trim((string)$value) === '')) {
            $this->errors[$field][] = "$field is required.";
        }

        if ($rule === 'email' && $value && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
            $this->errors[$field][] = "$field must be a valid email address.";
        }

        if (str_starts_with($rule, 'min:')) {
            $min = (int)substr($rule, 4);
            if ($value !== null && strlen((string)$value) < $min) {
                $this->errors[$field][] = "$field must be at least $min characters.";
            }
        }
    }

    public function errors(): array
    {
        return $this->errors;
    }
}
