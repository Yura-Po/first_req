let Small = false;
$('input[name="Small"]').change(function(e){
    Small=e.target.files[0];
});

let Big = false;
$('input[name="Big"]').change(function(e){
    Big=e.target.files[0];
});
// ----------------------------------------Реєстрація

$('.button-NewTur').click(function(e){

    e.preventDefault();

    $(`input`).removeClass('error_');

    let Name_Contr = $('input[name="Name_Contr"]').val(),
    NewTurSmall = $('input[name="NewTurSmall"]').val(),
    NewTurBig = $('input[name="NewTurBig"]').val(),
    Tsena = $('input[name="Tsena"]').val();

    let formData = new FormData();
            formData.append('Name_Contr', Name_Contr);
            formData.append('NewTurSmall', NewTurSmall);
            formData.append('NewTurBig', NewTurBig);
            formData.append('Tsena', Tsena);
            formData.append('Small', Small);
            formData.append('Big', Big);
            

     $.ajax({
        url: '../modules/NewTur-back.php',
        type: 'POST',
        dataType: 'json',
        processData:false,
        contentType:false,
        cache:false,
        data:formData,
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