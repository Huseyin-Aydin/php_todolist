<?php
class todolist{
  var $json_target,$datas;
 function __construct($road="./json_data.json"){
 if(!file_exists($road)){$a=fopen($road,"w");fwrite($a,json_encode(Array()));fclose($a);}
    $this->json_target=$road;}
 function get_json(){
   $this->datas=json_decode(file_get_contents($this->json_target));}
 function insert_data($posted){
   $this->datas[]=Array("status"=>$posted["status"],"id"=>$posted["id"],"content"=>$posted["content"]);
   $a=fopen($this->json_target,"w");fwrite($a,json_encode($this->datas));fclose($a);}
 function update_data($posted){
   $q=Array();
   $f=0;for($i=0;$i<count($this->datas);$i++){
 if($posted['id']==$this->datas[$i]->id)
   $q[$f++]=Array("id"=>$this->datas[$i]->id,"content"=>$this->datas[$i]->content,"status"=>$posted["status"]);
 else
   $q[$f++]=Array("id"=>$this->datas[$i]->id,"content"=>$this->datas[$i]->content,"status"=>$this->datas[$i]->status);}
   $a=fopen($this->json_target,"w");fwrite($a,json_encode($q));fclose($a);}
 function delete_data($posted){
   $q=Array();
   $f=0;for($i=0;$i<count($this->datas);$i++){
 if((string) $this->datas[$i]->id!=(string) $posted['id'])
   $q[$f++]=Array("id"=>$this->datas[$i]->id,"content"=>$this->datas[$i]->content,"status"=>$this->datas[$i]->status);
 }
   $a=fopen($this->json_target,"w");fwrite($a,json_encode($q));fclose($a);}}?>
