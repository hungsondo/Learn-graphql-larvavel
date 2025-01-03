<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\DataAwareRule;
use Illuminate\Contracts\Validation\Rule;

class QuestTitleRule implements DataAwareRule, Rule
{
    protected $data;

    /**
     * Create a new rule instance.
     *
     * @param  int  $reward
     * @return void
     */
    public function __construct()
    {
    }

    public function setData($data)
    {
        $this->data = $data;
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
        $reward = data_get($this->data, "reward", 0);
        if ($reward >= 1) {
            return $value && strlen($value) >= 5;
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
        return 'The title must be at least 5 characters when the reward is greater than 1.';
    }
}
