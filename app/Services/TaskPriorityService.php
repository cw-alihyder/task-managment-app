<?php


namespace App\Services;

use App\BaseRepository;
use App\Models\TaskPriority;

class TaskPriorityService {

    protected $taskPriorityRepository;

    public function __construct()
    {
        $this->taskPriorityRepository = new BaseRepository(new TaskPriority());
    }

    public function all()
    {
        return $this->taskPriorityRepository->all();
    }

}


?>
