<?php

namespace App\Validators;

class CreatePhonebookValidator extends Validator
{

    /**
     * Function Validate create account deposit
     *
     * @param array $data
     *
     * @return bool
     */
    public function createPhonebook(array $data)
    {
        $rules = [
            'phone' => 'required|min:11|max:11',
            'name' => 'required',
            'last_name' => 'string',
            'email' => 'email'
        ];

        return $this->validate($data, $rules);
    }
}
