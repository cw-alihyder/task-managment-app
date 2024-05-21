$('#addNewTask').click(function (e) {
    e.preventDefault();

    $('#taskModal').modal('show')

});


$('#taskForm').submit(function (e) {
    e.preventDefault();

    let formData = new FormData($(this)[0])

    $.ajax({
        type: "POST",
        url: "/tasks",
        data: formData,
        dataType: "json",
        processData: false,
        contentType: false,
        success: function (response) {

            showSuccess(response.message, true)

        },
        error: function (errors) {

            var errorsList = '<ul>'
            $.each(errors.responseJSON.errors, function (indexInArray, valueOfElement) {
                errorsList += '<li>'+valueOfElement[0]+'</li>'
            });
            errorsList +='</ul>'

            $('#formErrors').html(errorsList);
            $('#formErrors').show();

        }
    });

});



function showSuccess(text = 'data created successfully!', reload = true)
{

    Swal.fire({
        title: "Good job!",
        text: text,
        icon: "success"
      }).then(result => {

        if(reload) window.location.reload()

        });
}



$( ".task-list" ).sortable({

    update: function (event) {
        sortTask()
    }

});

function bulkStatusUpdate(data)
{
    $.ajax({
        type: "POST",
        url: "/sort_tasks",
        data: {...data, '_token': $('meta[name=csrf_token]').attr('content')},
        dataType: "json",
        success: function (response) {
            fetchTasks()
        }
    });
}

function sortTask()
{
    let sortedTasks = [];

    sortedTasks = $('.task-list').find('li').map((indexInArray, valueOfElement) => {

            if(indexInArray <= 0) return { id: valueOfElement.getAttribute('data-id'),task_priority_id: 1 }

            if(indexInArray > 0 && indexInArray <= 1) return { id: valueOfElement.getAttribute('data-id'),task_priority_id: 2 }

            if(indexInArray > 1) return { id: valueOfElement.getAttribute('data-id'),task_priority_id: 3 }


    })


    bulkStatusUpdate( [ ...sortedTasks ] )
}


$(document).on('click', '.btn-delete-task', function (e) {
    e.preventDefault();

    let id = $(this).data('id')

    $.ajax({
        type: "DELETE",
        url: "/tasks/"+id,
        data: { '_token': $('meta[name=csrf_token]').attr('content') },
        dataType: "json",
        success: function (response) {
            window.location.reload()
        }
    });

});


$('.searchTask').keyup(function (e) {
    e.preventDefault();

    let searchValue = e.target.value

    // if(searchValue.length < 3) return;

    fetchTasks(searchValue)


});


async function fetchTasks( searchValue = '' )
{

    await $.ajax({
        type: "GET",
        url: "/tasks",
        data: { searchValue: searchValue },
        dataType: "json",
        success: function (response) {

            $('.task-list').html(response.html)
        }
    });
}
