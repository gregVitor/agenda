<?php

namespace App\Validators;

class CreatePhonebookValidator extends Validator
{
    public function createPhonebook(array $data)
    {
        $rules = [
            'phone' => 'required|min:11|max:11',
            'name' => 'required|string',
            'last_name' => 'string',
            'email' => 'email'
        ];

        return $this->validate($data, $rules);
    }
}
