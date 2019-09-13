$(function(){

    //$(".text-danger").on("click", function(e){
    $(document).on("click", ".text-danger", function(e){

        e.preventDefault();
        
        let id = $(this).data("id");

        $.ajax({
            url: "http://localhost/TodoApp/delete.php",
            type: "GET",
            dataType: "json",
            data: {
                id: id
            }
        }).done( (data) => {
            $("#task-" + id).fadeOut();
        }).fail( (error) => {
            console.log("error");
        });

    });

    $("#add-button").on("click", function(e){

        e.preventDefault();
        
        let text = $("#text").val();

        $.ajax({
            url: "http://localhost/TodoApp/create.php",
            type: "POST",
            dataType: "json",
            data: {
                task: text
                //id: id
            }
        }).done( (data) => {
            //$("#task-" + id).append();
            $("tbody").prepend(
                `<tr id="task-${data['id']}">` + 
                    `<td>${data['name']}</td>` + 
                    `<td>${data['due_date']}</td>` + 
                    `<td>` + 
                        `<a class="text-success" href="edit.php?id=<?php echo $task['id']; ?>">EDIT</a>` + 
                    `</td>` + 
                    `<td>` + 
                        `<a class="text-danger" data-id=${data['id']} href="delete.php?id=<?php echo $task['id']; ?>">DELETE</a>` + 
                    `</td>` + 
                `</tr>`
            );
            console.log("success");
        }).fail( (error) => {
            console.log("error");
        });

    });

});