let showPassword = document.querySelector(".sauron-div");
let passinput = document.querySelector(".passinput");

showPassword.addEventListener("click",function(e){
    if(passinput.type === "password"){
        passinput.type = "text";
    }else{
        passinput.type = "password";
    }});
    // ----------------------------------------Авторизація

    $('.login-btn').click(function(e){

        e.preventDefault();

        $(`input`).removeClass('error_');

        let Email = $('input[name="Email"]').val(),
         passWord = $('input[name="passWord"]').val(),
         capchaMe = $('input[name="capchaMe"]').val();

         $.ajax({
            url: '../modules/Autoriz-back.php',
            type: 'POST',
            dataType: 'json',
            data:{
                Email: Email,
                passWord: passWord,
                capchaMe:capchaMe
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
//-----------------------------------------
let Avatar = false;
$('input[name="Avatar"]').change(function(e){
    Avatar=e.target.files[0];
});

// ----------------------------------------Реєстрація

$('.registr-btn').click(function(e){

    e.preventDefault();

    $(`input`).removeClass('error_');

    let name = $('input[name="name"]').val(),
    Surname = $('input[name="Surname"]').val(),
    Batko = $('input[name="Batko"]').val(),
    sex = $('select[name="sex"]').val(),
    Age = $('input[name="Age"]').val(),
    Country = $('select[name="Country"]').val(),
    Telef = $('input[name="Telef"]').val(),
    Email = $('input[name="Email"]').val(),
    passWord = $('input[name="passWord"]').val(),
    passWordDouble = $('input[name="passWordDouble"]').val();

    let formData = new FormData();
            formData.append('name', name);
            formData.append('Surname', Surname);
            formData.append('Batko', Batko);
            formData.append('sex', sex);
            formData.append('Age', Age);
            formData.append('Country', Country);
            formData.append('Telef', Telef);
            formData.append('Email', Email);
            formData.append('passWord', passWord);
            formData.append('passWordDouble', passWordDouble);
            formData.append('Avatar', Avatar);

     $.ajax({
        url: '../modules/signup.php',
        type: 'POST',
        dataType: 'json',
        processData:false,
        contentType:false,
        cache:false,
        data:formData,
        success (data){
            if(data.status){
                document.location.href = '../modules/Authorization.php';
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




// ----------------------------------------Зміна даних

$('.samena-btn').click(function(e){

    e.preventDefault();

    $(`input`).removeClass('error_');

    let name = $('input[name="name"]').val(),
    Surname = $('input[name="Surname"]').val(),
    Batko = $('input[name="Batko"]').val(),
    sex = $('select[name="sex"]').val(),
    Age = $('input[name="Age"]').val(),
    Country = $('select[name="Country"]').val(),
    Telef = $('input[name="Telef"]').val(),
    Email = $('input[name="Email"]').val(),
    passWord = $('input[name="passWord"]').val(),
    passWordDouble = $('input[name="passWordDouble"]').val();

    let formData = new FormData();
            formData.append('name', name);
            formData.append('Surname', Surname);
            formData.append('Batko', Batko);
            formData.append('sex', sex);
            formData.append('Age', Age);
            formData.append('Country', Country);
            formData.append('Telef', Telef);
            formData.append('Email', Email);
            formData.append('passWord', passWord);
            formData.append('passWordDouble', passWordDouble);
            formData.append('Avatar', Avatar);

     $.ajax({
        url: '../modules/SmenaDaniiAka-back.php',
        type: 'POST',
        dataType: 'json',
        processData:false,
        contentType:false,
        cache:false,
        data:formData,
        success (data){
            if(data.status){
                document.location.href = '../modules/logout.php';
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