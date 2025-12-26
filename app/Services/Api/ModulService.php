<?php

namespace App\Services\Api;

use App\Models\Modul;
use Exception;

class ModulService
{
    public function getAllModuls($projectId)
    {
        try {
            $Moduls = Modul::when($projectId !== 'all', function ($q) use ($projectId) {
                $q->where('project_id', $projectId);
            })
            ->get();

            return $Moduls;
        } catch (Exception $e) {
            throw $e;
        }
    }
}
