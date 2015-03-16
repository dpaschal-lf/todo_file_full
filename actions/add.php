<?php
require_once('../includes/functions.php');
print_r($_POST);
$error=[];
$output=[];
if(isset($_POST))
{
    if($_POST['title']=='')
    {
        $error['title']='Title must be set';
    }
    if($_POST['date']=='')
    {
        $error['date']='Date must be set';
    }
    else{
        $utime = strtotime($_POST['date']);
        if($utime===false){
            $error['date']='Invalid date/time';
        }
        else if($utime<time())
        {
            $error['date']='Task must be set in the future';
        }
    }
    if($_POST['details']=='')
    {
            $error['details']='Details must be set';
    }
    if(count($error)==0){
        $todo_object =[
            'title'=>$_POST['title'],
            'date'=>$utime,
            'details'=>$_POST['details']
        ];
        $list_json = file_get_contents('../data/todo.json');
        if(strlen($list_json)<1){
            $list_object = [];
        }
        else{
           $list_object = json_decode($list_json,true);
        }
        $name = $utime.'-'.generateRandomString();
        $list_object[$name]=$todo_object;
        $list_json = json_encode($list_object);
        $result = file_put_contents(
            '../data/todo.json',
            $list_json
            );
        if($result>0)
        {
            $output['success']=true;
            $output['message']='Data saved';
        }
    }
    else
    {
        $output['success']=false;
        $output['message']='Data save failed';
        $output['error_log']=$error;
    }
}
else
{
    $output['success']=false;
    $output['message']='No data available';
}
echo json_encode($output);
?>