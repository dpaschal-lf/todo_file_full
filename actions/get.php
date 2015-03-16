<?php
    $todo_json = file_get_contents('../data/todo.json');
    $output=[];
    if(strlen($todo_json)>0)
    {
        
        $todo_records = json_decode($todo_json,true);
        $html='<div class="row row-header">
            <div class="col-md-4">Title</div>
            <div class="col-md-4">Date</div>
            <div class="col-md-4">Details</div>
        </div>';
        
        foreach($todo_records as $key=>$this_record)
        {
            
            $record = 
                "<div class='row todo-record' data-id='$key'>
                    <div class='col-md-4 todo-title'>$this_record[title]</div>
                    <div class='col-md-4 todo-date'>".date('Y-m-d H:i:s',$this_record['date'])."</div>
                    <div class='col-md-4 todo-details'>".nl2br($this_record['details'])."</div>
                </div>\n";
            $html.=$record;
                
                
        }
        
        $output=['success'=>true, 'html'=>$html];
    }
    else
    {
        $output=['success'=>false, 'message'=>'No todo records!'];
    }
    echo json_encode($output);
?>