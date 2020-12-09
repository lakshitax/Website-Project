$(document).ready(function (e) {
$("#uploadimage").on('submit',(function(e) {
e.preventDefault();
$("#message").empty();
$('#loading').show();
$.ajax({
url: "ajax.php",
type: "POST",
data: new FormData(this),
contentType: false,
cache: false,
processData:false,
success: function(data)
{
$('#loading').hide();
$("#message").html(data);
}
});
}));



$(document).ready(function(){

 $('#form').on('submit', function(event){
  event.preventDefault();
  $.ajax({
   url:"ajax.php",
   method:"POST",
   data:$(this).serialize(),
   dataType:"json",
   beforeSend:function(){
    $('#submit').attr('disabled', 'disabled');
   },
   success:function(data){
    $('#submit').attr('disabled', false);
    if(data.name)
    {
     var html = '<tr>';
     html += '<td>'+data.name+'</td>';
     html += '<td>'+ '<img src="upload/' + data.name +' height=50px width=50px >'+'</td></tr>';
     $('#table_data').prepend(html);
     $('#form')[0].reset();
    }
   }
  })
 });

});
