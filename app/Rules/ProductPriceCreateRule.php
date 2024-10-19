<?php

namespace App\Rules;

use App\Models\OptionValue;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ProductPriceCreateRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
            $optionId = explode('.', $attribute)[1];
            $optionValueId = $value;

            $exists = OptionValue::query()
                ->where('option_id', $optionId)
                ->whereIn('id', $optionValueId)
                ->exists();

            if (!$exists) {
                //todo change message
                $fail('Product Not Valid');
            }
    }
}
