<!doctype html>
<html lang="en">
  <head>
    <title>Task Management</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="csrf_token" content="{{ csrf_token() }}">

    @include('includes.stylesheet')

  </head>
  <body>


    <div class="container">
        <div class="row">

                <div class="form-group col-md-5 offset-md-3">
                  <input type="text" class="form-control searchTask mt-4" name="" id="" aria-describedby="helpId" placeholder="Search your task........">
                </div>

                <div class="task-button col-md-2">
                    <button type="button" class="btn btn-primary mt-4" id="addNewTask">Add New</button>
                </div>

            </div>
            <div class="col-md-8 mt-5 offset-md-2">
                <h4>Tasks</h4>
                <ul class="list-group task-list">

                    @include('includes.task-list')

                </ul>

            </div>
        </div>
    </div>

    @include('includes.modal')

    @include('includes.script')

  </body>
</html>
