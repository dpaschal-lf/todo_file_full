<?php
require_once('../includes/functions.php');
$error=array();
$output=array();

if(isset($_POST))
{
    if(empty($_POST['title']))
    {
        $error['title']='Title must be set';
    }
    if(empty($_POST['date']))
    {
        $error['date']='Date must be set';
    }
    else
    {
        $timestamp = strtotime($_POST['date']);
        if(!$timestamp){
            $error['date']='Invalid date/time';
        }
        else if($timestamp<time())
        {
            $error['date']='Task must be set in the future';
        }
    }
    if(empty($_POST['details']))
    {
        $error['details']='Details must be set';
    }
    
    $con = mysqli_connect("localhost", "root", "root", "todo");
        
    $title = $_POST['title'];
    $details = $_POST['details'];

    $sql_str = 'INSERT INTO todo_items (`title`, `timestamp`, `details`) VALUES ("%s", %d, "%s")';
    
    $sql = sprintf($sql_str, $title, $timestamp, $details);
    $result = mysqli_query($con, $sql);
    
    if(!$result){
        $error['mysql_error'] = mysqli_error($result);
    }
    if(count($error)==0){
        $output['success']=true;
        $output['message']='Data saved';
    }else{
        $output['success']=false;
        $output['message']='Data save failed';
        $output['error_log'] = $error;
    }
    
    mysqli_close($con);
}else{
    $output['success']=false;
    $output['message']='No POST data sent';
}
echo json_encode($output);
?>