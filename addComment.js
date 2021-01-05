var data;
$('#addComments').on('submit',function(e){
    e.preventDefault();
    var id=$('#book').val();
    data=$(this).serializeArray();
    data.push({name:'book',value:id});
    sendData();
});
function sendData(){
    console.log(data);
    $.ajax({
        url:'http://localhost:8080/library/addComments.php',
        data:data,
        type:'POST',
        success:function(response){
            $('#results').html(response);
            $('#addComments')[0].reset();
            setTimeout(()=>{
           location.reload();
            },2000);
        },
        error:function(){
            $('#results').html('<div class="alert alert-danger">erreur réssayer plutard</div>');
        }
    })
}
