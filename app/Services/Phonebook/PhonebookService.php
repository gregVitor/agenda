<?php

namespace App\Services\Phonebook;

use App\Repositories\PhonebookRepository;

class PhonebookService
{
    private $phonebookRepository;

    public function __construct(
        PhonebookRepository $phonebookRepository
    ) {
        $this->phonebookRepository = $phonebookRepository;
    }

    public function create(
        object $user,
        $request
    ) {
        $formatedPhoneNumber = $this->formatPhoneNumber($request->phone);

        $phonebookData = [
            'user_id' => $user->id,
            'name' => $request->name,
            'last_name' => $request->last_name,
            'phone' => $formatedPhoneNumber,
            'email' => $request->email
        ];

        $phonebook = $this->phonebookRepository->create($phonebookData);
        
        return ($phonebook);
    }

    public function list(int $userId){
        return $this->phonebookRepository->getByUserId($userId);
    }

    private function formatPhoneNumber($phoneNumber): string
    {
        return '(' . substr($phoneNumber, 0, 2) . ') ' . substr($phoneNumber, 2, 5) . '-' . substr($phoneNumber, 7);
    }
}
