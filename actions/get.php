<?php
    $todo_json = file_get_contents('../data/todo.json');
    $output=[];
    if(strlen($todo_json)>0)
    {
        $todo_records = json_decode($todo_json,true);
        
        $html='';
        foreach($todo_records as $key=>$this_record)
        {
            $record = 
                "<div class='todo-record' data-id='$key'>
                    <span class='todo-title'>$this_record[title]</span>
                    <span class='todo-date'>".date('Y-m-d H:i:s',$this_record['date'])."</span>
                    <span class='todo-details'>".nl2br($this_record['details'])."</span>
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