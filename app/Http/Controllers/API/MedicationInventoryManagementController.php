<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\MedicationUpdateRequest;
use App\Http\Requests\NewMedicationRequest;
use App\Http\Resources\MedicationResource;
use App\Services\MedicationManagmentService;
use Illuminate\Http\Request;

class MedicationInventoryManagementController extends BaseController
{
    protected $medication;
    public function __construct(MedicationManagmentService $medication)
    {
        $this->medication = $medication;
    }

    public function index()
    {
        $response = $this->medication->getAll();
        $response['data'] = MedicationResource::collection($response['data']);
        return $this->sendResponse($response);
    }


    public function store(NewMedicationRequest $request)
    {
        $response = $this->medication->create($request->validated());
        return $this->sendResponse($response);
    }


    public function show(int $id)
    {
        $response = $this->medication->show($id);
        $response['data'] = new MedicationResource($response['data']);
        return $this->sendResponse($response);
    }


    public function update(MedicationUpdateRequest $request, int $id)
    {
        $response = $this->medication->update($id, $request->validated());
        $response['data'] = new MedicationResource($response['data']);
        return $this->sendResponse($response);
    }

    public function destroy(string $id)
    {
        $response = $this->medication->delete($id);
        return $this->sendResponse($response); 
    }
}
