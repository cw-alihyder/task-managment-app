<?php

namespace App\Services;

use App\BaseRepository;
use App\Models\Task;

class TaskService
{

    protected $taskRepository;

    public function __construct()
    {
        $this->taskRepository = new BaseRepository(new Task());
    }

    public function get($orderBy = [], $where = [])
    {
        return $this->taskRepository->get( $orderBy ,$where);
    }

    public function delete($id)
    {
        return $this->taskRepository->delete($id);
    }

}


?>
