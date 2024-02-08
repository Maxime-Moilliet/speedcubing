<?php

declare(strict_types=1);

namespace App\Http\Requests\Time;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class TimeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'time' => [
                'decimal:0,2',
                'required',
            ],
            'scramble' => [
                'string',
                'required',
            ],
            'is_incomplete' => [
                'boolean',
                'required',
            ],
            'is_dnf' => [
                'boolean',
                'required',
            ],
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'is_incomplete' => $this->boolean('is_incomplete'),
            'is_dnf' => $this->boolean('is_dnf'),
        ]);
    }
}
