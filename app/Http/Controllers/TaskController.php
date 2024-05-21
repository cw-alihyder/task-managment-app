<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\TaskPriority;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Services\TaskPriorityService;
use App\Services\TaskService;

class TaskController extends Controller
{
    protected $taskService;

    protected $taskPriorityService;

    public function __construct(TaskService $taskService, TaskPriorityService $taskPriorityService)
    {
        $this->taskService = $taskService;

        $this->taskPriorityService = $taskPriorityService;
    }

    public function __invoke()
    {
        $tasks = $this->taskService->get( ['task_priority_id', 'ASC'] );

        $taskPriorities = $this->taskPriorityService->all();

        return view('tasks.index', [ 'tasks' => $tasks, 'task_priorities' => $taskPriorities ]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $tasks = $request->searchValue ? $this->taskService->get( where: [ [ 'name', 'like', '%'.$request->searchValue.'%' ] ] ):$this->taskService->get(orderBy: [ 'task_priority_id', 'ASC']);

        return response()->json(['status_code' => 200, 'message' => 'data fetched successfully', 'html' => view('includes.task-list', [ 'tasks' => $tasks ])->render() ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {
        $task = Task::create($request->except(['_token']));

        //endpoint sample for api response
        return response()->json(['status_code' => 200, 'message' => 'task created successfully', 'data' => $task], 200);
    }

    public function sortTasks(Request $request)
    {
        foreach ($request->except([ '_token' ]) as $key => $record) {

            $task = Task::whereId($record['id'])->update( [ 'task_priority_id' => $record['task_priority_id'] ] );

        }

        $tasks = Task::all();

        return response()->json(['status_code' => 200, 'message' => 'data has been updated', ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($task)
    {
        $task = $this->taskService->delete($task);

        return response()->json(['status_code' => 200, 'message' => 'data deleted successfully!'], 200);
    }
}
