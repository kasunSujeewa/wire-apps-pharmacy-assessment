<?php

namespace App\Traits;

use App\Constants\HttpResponse;

trait CrudOperationsTrait
{
    public function create($data): array
    {
        $response =  $this->getModel()->create($data);
        $sucesss['data'] = $response;
        $sucesss['message'] = HttpResponse::DATA_CREATED_MESSAGE;
        $sucesss['status_code'] = HttpResponse::CREATED_CODE;

        return $sucesss;
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
        $model = $this->getModel()->findOrFail($id);
        $model->delete();
        $sucesss['data'] = [];
        $sucesss['message'] = HttpResponse::DATA_REMOVED_MESSAGE;

        return $sucesss;
    }

    abstract protected function getModel();
}
