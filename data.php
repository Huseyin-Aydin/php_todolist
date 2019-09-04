<?php include './dist/core.php';
$todolist=new todolist();
if(isset($_POST["process"])){$todolist->get_json();
if($_POST['process']=='insert'){$todolist->insert_data($_POST);}
elseif($_POST['process']=='update'){$todolist->update_data($_POST);}
elseif($_POST['process']=='delete'){$todolist->delete_data($_POST);}}?>