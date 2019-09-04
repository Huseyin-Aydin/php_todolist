var ms=500;
function insert_data(processid,data){
$.post("./data.php",{process:"insert",status:"uncomplete",id:processid,content:data},function(dt){});}
function update_data(processid,procstat){
$.post("./data.php",{process:"update",id:processid,status:procstat},function(dt){});}
function delete_data(processid){
$.post("./data.php",{process:"delete",id:processid},function(dt){});}
$("#text-area").on("keyup",function(e){
if(e.keyCode == 13 && $("#text-area").val() != "")
{var processid=new Date().getTime();
insert_data(processid,$("#text-area").val());
document.getElementsByClassName("uncomplete")[0].innerHTML+='<div style="display:none;" data="'+$("#text-area").val()+'" class="mission" id="'+processid+'"><span>'+$("#text-area").val()+'</span><i class="fa fa-trash" onclick="delete_dt(this)"></i><i class="fa fa-check" onclick="update_dt(this)"></i></div>';
$("#text-area").val("");
$("#"+processid).show(window.ms);
}});
function delete_dt(x){
delete_data(x.parentElement.getAttribute("id"));
$(x.parentElement).hide(window.ms,function(){x.parentElement.remove();});}
function update_dt(x,y="complete"){
update_data(x.parentElement.getAttribute("id"),y);
if(y=="complete")
$(".complete").append('<div style="display:none;" data="'+x.parentElement.getAttribute("data")+'" class="mission" id="'+x.parentElement.getAttribute("id")+'"><span>'+x.parentElement.getAttribute("data")+'</span><i class="fa fa-trash" onclick="delete_dt(this)"></i><i class="fa fa-times" onclick="update_dt(this,\'uncomplete\')"></i></div>');
else
$(".uncomplete").append('<div style="display:none;" data="'+x.parentElement.getAttribute("data")+'" class="mission" id="'+x.parentElement.getAttribute("id")+'"><span>'+x.parentElement.getAttribute("data")+'</span><i class="fa fa-trash" onclick="delete_dt(this)"></i><i class="fa fa-check" onclick="update_dt(this)"></i></div>');
$(x.parentElement).hide(window.ms,function(){x.parentElement.remove();
$("#"+x.parentElement.getAttribute("id")).show(window.ms);
});}
