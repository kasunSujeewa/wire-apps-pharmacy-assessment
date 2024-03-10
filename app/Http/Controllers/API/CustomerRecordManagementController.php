<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerUpdateRequest;
use App\Http\Requests\NewCustomerRequest;
use App\Http\Resources\CustomerResource;
use App\Services\CustomerManagementService;
use Illuminate\Http\Request;

class CustomerRecordManagementController extends BaseController
{
    protected $customer;
    public function __construct(CustomerManagementService $customer)
    {
        $this->customer = $customer;
    }

    public function index()
    {
        $response = $this->customer->getAll();
        $response['data'] = CustomerResource::collection($response['data']);
        return $this->sendResponse($response);
    }


    public function store(NewCustomerRequest $request)
    {
        $response = $this->customer->create($request->validated());
        return $this->sendResponse($response);
    }


    public function show(int $id)
    {
        $response = $this->customer->show($id);
        $response['data'] = new CustomerResource($response['data']);
        return $this->sendResponse($response);
    }


    public function update(CustomerUpdateRequest $request, int $id)
    {
        $response = $this->customer->update($id, $request->validated());
        $response['data'] = new CustomerResource($response['data']);
        return $this->sendResponse($response);
    }

    public function destroy(string $id)
    {
        $response = $this->customer->delete($id);
        return $this->sendResponse($response); 
    }

    public function permanentlyDelete(string $id)
    {
        $response = $this->customer->permanentlyDelete($id);
        return $this->sendResponse($response); 
    }
}
