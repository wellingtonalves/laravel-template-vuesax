<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class RequiredWithPost implements Rule
{
    /**
     * Create a new rule instance.
     * @param $method
     * @return void
     */
    public function __construct($method)
    {
        $this->method = $method;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string $attribute
     * @param  mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if ($this->method == 'POST') {
            $validator = Validator::make(
                [$attribute => $value],
                [$attribute => 'required']
            );

            return $validator->passes();
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute field is required.';
    }
}
