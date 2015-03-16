$('document').ready(function(){
    $("#save_task").click(function(){

        var todoadd = $("#todo-add");
        var form_data={
            title:todoadd.find("input[name=title]").val(),
date:todoadd.find("input[name=date]").val(),
details:todoadd.find("textarea[name=details]").val(),
        }
        $.ajax(
        {
            url: 'actions/add.php',
            data: form_data,
            dataType: 'json',
            cache: false,
            method: 'POST',
            success: function(data){
                //success is achieved!
            }
        });
            
    });
    $("#display_refresh").click(function(){

        $.ajax(
        {
            url: 'actions/get.php',
            dataType: 'json',
            cache: false,
            method: 'POST',
            success: function(data){
                if(data.success)
                {
                    $(".todo-list").html(data.html);
                }
            }
        });
            
    });
});