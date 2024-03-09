<?php

namespace App\Services;

use App\Constants\Constants;
use App\Constants\HttpResponse;
use App\Models\Medication;
use App\Traits\CrudOperationsTrait;

class MedicationManagmentService
{
    use CrudOperationsTrait;

    protected function getModel()
    {
        return new Medication();
    }

}