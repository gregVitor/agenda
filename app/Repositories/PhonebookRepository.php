<?php

namespace App\Repositories;

use App\Models\Phonebook;

class PhonebookRepository
{
    private $phonebook;

    public function __construct(
        Phonebook $phonebook
    ) {
        $this->phonebook = $phonebook;
    }

    public function create(
        array $phonebook
    ) {
        return $this->phonebook->create($phonebook);
    }
}
