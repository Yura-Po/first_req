$('.btn-koment').click(function(e){

    e.preventDefault();

    $(`input`).removeClass('error_');

    let id_User = $('input[name="id_User"]').val(),
    id_Diving = $('input[name="id_Diving"]').val(),
    date = $('input[name="date"]').val(),
    text_K = $('textarea[name="text_K"]').val();

     $.ajax({
        url: '../modules/Koment-beck.php',
        type: 'POST',
        dataType: 'json',
        data:{
            id_User: id_User,
            id_Diving: id_Diving,
            date: date,
            text_K: text_K
        },
        success (data){
            if(data.status){
                document.location.href = '../index.php';
            }else{
                if(data.type === 1){
                    data.fields.forEach(function(field) {
                        $(`input[name="${field}"]`).addClass('error_');
                    });
                }
                $('.msg').removeClass('none').text(data.message);
            }
            
        }
     });

});
