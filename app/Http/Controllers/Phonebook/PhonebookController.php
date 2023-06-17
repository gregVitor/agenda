<?php

namespace App\Http\Controllers\Phonebook;

use App\Http\Controllers\Controller;
use App\Services\Phonebook\PhonebookService;
use App\Validators\CreatePhonebookValidator;
use App\Validators\UpdatePhonebookValidator;
use Illuminate\Http\Request;

class PhonebookController extends Controller
{   
    private $createPhonebookValidator;
    private $udpatePhonebookValidator;
    private $phonebookService;


    public function __construct(
        CreatePhonebookValidator  $createPhonebookValidator,
        UpdatePhonebookValidator $udpatePhonebookValidator,
        PhonebookService $phonebookService,
    ) {
        $this->createPhonebookValidator  = $createPhonebookValidator;
        $this->udpatePhonebookValidator = $udpatePhonebookValidator;
        $this->phonebookService = $phonebookService;
    }

    /**
     * Function create deposit
     *
     * @param Request $request
     *
     * @return void
     */
    public function create(Request $request)
    {
        try {
            $this->createPhonebookValidator->createPhonebook($request->all());

            $phonebook = $this->phonebookService->create($request->user, $request);

            return apiResponse("Ok.", 200, $phonebook);
        } catch (\Exception $e) {
            throw ($e);
        }
    }

    public function list(Request $request)
    {
        try {
            $phonebook = $this->phonebookService->list($request->user->id);

            return apiResponse("Ok.", 200, $phonebook);
        } catch (\Exception $e) {
            throw ($e);
        }
    }

    public function find(Request $request, int $phonebookId)
    {
        try {
            $phonebook = $this->phonebookService->find($request->user->id, $phonebookId);

            return apiResponse("Ok.", 200, $phonebook);
        } catch (\Exception $e) {
            throw ($e);
        }
    }

    public function update(Request $request, int $phonebookId)
    {
        try {
            $this->udpatePhonebookValidator->UpdatePhonebook($request->all());

            $phonebook = $this->phonebookService->update($request->user->id, $phonebookId, $request);

            return apiResponse("Ok.", 200, $phonebook);
        } catch (\Exception $e) {
            throw ($e);
        }
    }

    public function delete(Request $request, int $phonebookId)
    {
        try {
            $phonebook = $this->phonebookService->delete($request->user->id, $phonebookId, $request);

            return apiResponse("Ok.", 200, $phonebook);
        } catch (\Exception $e) {
            throw ($e);
        }
    }
}
