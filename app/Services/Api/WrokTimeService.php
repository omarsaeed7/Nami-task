<?php

namespace App\Services\Api;

use App\Models\Employee;
use Exception;

class EmployeeService
{
    public function getAllEmployees()
    {
        try {
            $employees = Employee::all();

            return $employees;
        } catch (Exception $e) {
            throw $e;
        }
    }
}
