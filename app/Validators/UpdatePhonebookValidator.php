<?php

namespace App\Validators;

class UpdatePhonebookValidator extends Validator
{
    public function updatePhonebook(array $data)
    {
        $rules = [
            'phone' => 'min:11|max:11',
            'name' => 'string',
            'last_name' => 'string',
            'email' => 'email'
        ];

        return $this->validate($data, $rules);
    }
}
