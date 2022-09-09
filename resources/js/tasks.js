$(function() {

    loadTasks();
    
    

    $("#create-task").submit(function(event) {

        event.preventDefault();

        let $form = $( this ),
        name = $form.find( "input[name='name']" ).val(),
        categories = [];

        $("input:checkbox[name='categories']:checked").each(function() {
            categories.push(parseInt($(this).val()));
        });

        if(categories.length === 0){
            alert('Por favor selecciona al menos una categoría.');
            return;
        }

        const categoriesJson = JSON.stringify(categories);

        let creating = $.post( '/api/task', { name: name, categories: categoriesJson } );

        creating.done(result => {
            if(result.code === 201){
                alert('Tarea creada');
                clearForm();
                loadTasks();
            }
        });

        creating.fail(error => {
            if(undefined !== error.responseJSON){
                let errorMessages = [];
                jQuery.each(error.responseJSON.errors, function(index, message) {
                    errorMessages.push(message);
                });
                
                alert(errorMessages.join(' '));
            }
        });
    });

    $(document).on('click', '.btn-delete-task', function(){
        deleteTask(this.dataset.id);
    });

});

const clearForm = () => {
    $("input[name='name']").val('');
    $("input:checkbox[name='categories']:checked").each(function() {
        $(this).prop('checked', false);
    });
};

const loadTasks = () => {
    let loading = $.get('/api/tasks');

    loading.done(data => {
        if(data.code === 200){
            $("table tbody").html('');

            let append = '',
            appendCategories = '';

            (data.data).forEach(element => {
                appendCategories = (element.categories).map(el => `<span class="badge rounded-pill text-bg-secondary">${el.name}</span>`);

                append =`<tr>
                    <td>${element.name}</td>
                    <td>${appendCategories.join(' ')}</td>
                    <td><button class="btn btn-sm btn-danger btn-delete-task" data-id="${element.id}">Eliminar</button></td>
                </tr>`;

                $("table tbody").append(append);
            });
        }
    });
};

const deleteTask = (id) => {

    let deleting = $.ajax({
        url: `/api/task/${id}`,
        type: 'DELETE',
        data: {_token:'{{ csrf_token() }}'},
    });

    deleting.done(result => {
        if(result.code === 200 && result.status){
            alert('Tarea eliminada');
            loadTasks();
        }
    });
}