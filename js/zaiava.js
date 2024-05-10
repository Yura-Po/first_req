// Отримуємо елементи DOM для селектів
const selectExpert = document.getElementById('mySelect');
const selectOrenda = document.querySelector('.orenda-type');

// Отримуємо елемент DOM для відображення та зчитування значення ціни
const priceInput = document.querySelector('input.read');

// Зчитуємо початкове значення ціни з інпуту з класом "read"
let initialSum = parseInt(priceInput.value);
let sum = initialSum;

// Функція для оновлення суми залежно від обраних опцій
function updateSum() {
    sum = initialSum; // Встановлюємо суму на початкове значення

    // Перевіряємо обрану опцію у селекті "orenda-type"
    const selectedOrenda = parseInt(selectOrenda.value);
    if (selectedOrenda === 2) {
        sum += 10000; // Додаємо 500, якщо обрано опцію "Так"
    }

    // Перевіряємо обраний option у селекті
    const selectedExpert = parseInt(selectExpert.value);
    if (selectedExpert >= 2 && selectedExpert <= 4) {
        sum += 15000; // Додаємо 15000, якщо обрано option 2, 3 або 4
    }

    // Виводимо суму в інпут з класом "read"
    priceInput.value = sum;
    console.log('Поточна сума:', sum);
}

// Обробники подій для селектів
selectExpert.addEventListener('change', updateSum);
selectOrenda.addEventListener('change', updateSum);


//-------------------------------------Zaiava

$('.button_form').click(function(e){

    e.preventDefault();

    $(`input`).removeClass('error_');

    let dateTur = $('input[name="dateTur"]').val(),
    orenda = $('select[name="orenda"]').val(),
    expert = $('select[name="expert"]').val(),
    tsena = $('input[name="tsena"]').val(),
    id_tur=$('input[name="id_tur"]').val();

     $.ajax({
        url: '../modules/Zaiava-bek.php',
        type: 'POST',
        dataType: 'json',
        data:{
            dateTur: dateTur,
            orenda:orenda,
            expert:expert,
            tsena:tsena,
            id_tur:id_tur
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