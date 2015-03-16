<?php
    $todo_json = file_get_contents('../data/todo.json');
    $output=[];
    if(strlen($todo_json)>0)
    {
        
        $todo_records = json_decode($todo_json,true);
        
        $con = new mysqli("localhost", "root", "root", "todo");
        
        $con->query('TRUNCATE todo_items');
        
        $errors = [];
        
        foreach($todo_records as $key=>$this_record)
        {
            
            $sql = ' INSERT INTO todo_items (`title`, `timestamp`, `details`) VALUES (';
            $sql .= '"'.$this_record['title'].'",';
            $sql .= $this_record['date'].',';
            $sql .= '"'.$this_record['details'].'");';                
            
            $result = $con->query($sql);
            
            if(!$result){
                $errors[] = $con->error;
            }
        }
           
        if(count($errors) == 0){
            $output=['success'=>true, 'message'=>'Inserted content successfully'];
        }else{
            $output=['success'=>false, 'message'=>$errors];
        }
        
        $con->close();
    }
    else
    {
        $output=['success'=>false, 'message'=>'No todo records!'];
    }
    echo json_encode($output);
?>