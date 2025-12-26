<?php

namespace App\Services\Api;

use App\Models\Project;
use Exception;

class ProjectService
{
    public function getProject($projectId)
    {
        try {

            return Project::when($projectId !== 'all', function ($q) use ($projectId) {
                $q->where('id', $projectId);
            })->get();

        } catch (Exception $e) {
            throw $e;
        }
    }
}
