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

    public function getByUserId(
        int $userId
    ) {
        return $this->phonebook->where('user_id', $userId)->get();
    }

    public function findById(
        int $userId,
        int $phonebookId
    ) {
        return $this->phonebook
            ->where('user_id', $userId)
            ->where('id', $phonebookId)
            ->first();
    }
}
