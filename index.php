<?php $datas=json_decode(file_get_contents("./json_data.json"));
$uncomplete=Array();$complete=Array();
for($i=0;$i<count($datas);$i++){
if($datas[$i]->status=="uncomplete") $uncomplete[]=$datas[$i];
if($datas[$i]->status=="complete") $complete[]=$datas[$i];}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
<meta charset="utf-8">
<title>Todolist App v1.0</title>
<link rel="stylesheet" href="./assets/style.css">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body>
<div class="container">
<input type="text" id="text-area" placeholder="Insert Mission">
<div class="uncomplete">
<h3>Not Completed</h3>
<?php foreach($uncomplete as $x){echo '<div data="'.$x->content.'" class="mission" id="'.$x->id.'"><span>'.$x->content.'</span><i class="fa fa-trash" onclick="delete_dt(this)"></i><i class="fa fa-check" onclick="update_dt(this)"></i></div>'."\n";}?>
</div>
<div class="complete">
<h3>Completed</h3>
<?php foreach($complete as $x){echo '<div data="'.$x->content.'" class="mission" id="'.$x->id.'"><span>'.$x->content.'</span><i class="fa fa-trash" onclick="delete_dt(this)"></i><i class="fa fa-times" onclick="update_dt(this,\'uncomplete\')"></i></div>'."\n";}?>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script src="./assets/custom.js"></script>
</body>
</html>