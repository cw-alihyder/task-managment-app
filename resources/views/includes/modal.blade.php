    <!-- Modal -->
    <div class="modal fade" id="taskModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
        aria-hidden="true">
        <div class="modal-dialog" role="document">

            <form action="" id="taskForm">

                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Task Form</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        @csrf

                        <div class="alert alert-danger" id="formErrors" role="alert">
                        </div>

                        <div class="form-group">
                            <label for="name" class="form-label required">Name </label>
                            <input type="text" class="form-control" name="name" id="name" aria-describedby="helpId"
                                placeholder="">
                        </div>

                        <div class="form-group">
                            <label for="">Select Priority</label>
                            <select class="form-control" name="task_priority_id">
                                @foreach($task_priorities as $task_priority)
                                    <option value="{{ $task_priority->id }}">{{ $task_priority->name }}</option>
                                @endforeach
                            </select>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>

            </form>

        </div>
    </div>
