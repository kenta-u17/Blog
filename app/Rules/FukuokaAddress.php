<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\ImplicitRule;

class FukuokaAddress implements ImplicitRule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($pref)
    {
        $this->pref = $pref;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if ($this->pref === '福岡県' && blank($value)){
            return false;
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
        return '福岡県の場合は住所を入力して下さい';
    }
}
