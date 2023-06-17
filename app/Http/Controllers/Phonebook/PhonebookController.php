<?php

namespace App\Http\Controllers\Phonebook;

use App\Http\Controllers\Controller;
use App\Services\Phonebook\PhonebookService;
use App\Validators\CreatePhonebookValidator;
use Illuminate\Http\Request;

class PhonebookController extends Controller
{   
    private $createPhonebookValidator;
    private $phonebookService;


    public function __construct(
        CreatePhonebookValidator  $createPhonebookValidator,
        PhonebookService $phonebookService
    ) {
        $this->createPhonebookValidator  = $createPhonebookValidator;
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
}
