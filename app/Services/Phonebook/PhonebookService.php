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

    public function find(int $userId, $phonebookId){
        $phonebook = $this->phonebookRepository->findById($userId, $phonebookId);

        if($phonebook == null){
            abort(404, "Contato não encontrato");
        }

        return $phonebook;
    }

    public function update(int $userId, $phonebookId, $request){
        $phonebook = $this->phonebookRepository->findById($userId, $phonebookId);

        if(isset($request->name) && $request->name != ''){
            $phonebook->name = $request->name;
        }

        if(isset($request->last_name)){
            $phonebook->last_name = $request->last_name;
        }

        if(isset($request->phone) && $request->phone != ''){
            $phonebook->phone = $request->phone;
        }

        if(isset($request->email)){
            $phonebook->email = $request->email;
        }

        $phonebook->save();

        return $phonebook;
    }

    private function formatPhoneNumber($phoneNumber): string
    {
        return '(' . substr($phoneNumber, 0, 2) . ') ' . substr($phoneNumber, 2, 5) . '-' . substr($phoneNumber, 7);
    }
}
