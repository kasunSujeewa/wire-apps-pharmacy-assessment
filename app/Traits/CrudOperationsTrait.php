<?php

namespace App\Traits;

use App\Constants\HttpResponse;
use Illuminate\Support\Facades\Gate;

trait CrudOperationsTrait
{
    public function create($data): array
    {
        if(Gate::allows('isOwner')){
            $response =  $this->getModel()->create($data);
            $sucesss['data'] = $response;
            $sucesss['message'] = HttpResponse::DATA_CREATED_MESSAGE;
            $sucesss['status_code'] = HttpResponse::CREATED_CODE;
    
            return $sucesss;
        }
        else{
            $error['error'] = true;
            $error['data'] = [];
            $error['message'] = HttpResponse::ACCESS_DENIED_MESSAGE;
            $error['status_code'] = HttpResponse::ACCESS_DENIED_CODE;
            return $error;
        }
    }

    public function show($id)
    {
        $response =  $this->getModel()->findOrFail($id);
        $sucesss['data'] = $response;
        $sucesss['message'] = HttpResponse::DATA_RECEIVED_MESSAGE;

        return $sucesss;
    }

    public function getAll()
    {
        $response = $this->getModel()->orderBy('created_at', 'desc')->get();
        $sucesss['data'] = $response;
        $sucesss['message'] = HttpResponse::DATA_RECEIVED_MESSAGE;

        return $sucesss;
    }

    public function update($id, $data)
    {
        $model = $this->getModel()->findOrFail($id);
        $model->update($data);
        $sucesss['data'] = $model;
        $sucesss['message'] = HttpResponse::DATA_RECEIVED_MESSAGE;

        return $sucesss;
    }

    public function delete($id)
    {
        if(!Gate::allows('isCashier')){
        $model = $this->getModel()->findOrFail($id);
        $model->delete();
        $sucesss['data'] = [];
        $sucesss['message'] = HttpResponse::DATA_REMOVED_MESSAGE;
        $sucesss['status_code'] = HttpResponse::NO_CONTENT_CODE;

        return $sucesss;
        }
        else{
            $error['error'] = true;
            $error['data'] = [];
            $error['message'] = HttpResponse::ACCESS_DENIED_MESSAGE;
            $error['status_code'] = HttpResponse::ACCESS_DENIED_CODE;
            return $error;
        }
    }

    public function permanentlyDelete($id)
    {
        if(Gate::allows('isOwner')){
        $model = $this->getModel()->withTrashed()->findOrFail($id);
        $model->forcedelete();
        $sucesss['data'] = [];
        $sucesss['message'] = HttpResponse::DATA_REMOVED_MESSAGE;
        $sucesss['status_code'] = HttpResponse::NO_CONTENT_CODE;

        return $sucesss;
        }
        else{
            $error['error'] = true;
            $error['data'] = [];
            $error['message'] = HttpResponse::ACCESS_DENIED_MESSAGE;
            $error['status_code'] = HttpResponse::ACCESS_DENIED_CODE;
            return $error;
        }
        
    }

    abstract protected function getModel();
}
