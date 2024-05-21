
@foreach ($tasks as $task)


<li class="list-group-item d-flex justify-content-between align-items-center" data-id="{{ $task->id }}">
    <p>

        <span class="badge badge-secondary badge-pill" style="background: {{ $task->priority?->color }}">{{ $task->priority?->name }}</span>

        {{ $task->name }}

    </p>

    <button type="button" class="btn btn-danger btn-delete-task" data-id="{{ $task->id }}"> Delete </button>
</li>

@endforeach
