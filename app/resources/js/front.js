'use strict';

document.getElementById('send_form').addEventListener('click', send_form);

function send_form() {
    const form = document.getElementById('data_form')
    const form_data = new FormData(form);
    const url = 'app/form.php';
    const error_box = form.getElementsByClassName('error_box')[0];
    const result_box = form.getElementsByClassName('result_box')[0];
    error_box.innerHTML = '';
    error_box.classList.add('d-none');
    result_box.innerHTML = '';
    result_box.classList.add('d-none');
    fetch(url, {
        method: 'POST',
        body: form_data
    })
            .then(response => response.json())
            .then(data => {
                console.log('Ответ: ', data);
                if (
                        data.error
                        && (data.error !== '')
                        ) {
                    error_box.classList.remove('d-none');
                    error_box.innerHTML = data.error;
                } else if (
                        data.data.error
                        && (data.data.error !== '')
                        ) {
                    error_box.classList.remove('d-none');
                    error_box.innerHTML = data.data.error;
                } else {
                    result_box.classList.remove('d-none');
                    result_box.innerHTML = 'Дата: ' + data.data.send_time + '<br>Статус: ' + data.data.status;
                }
            })
            .catch((error) => {
                console.error('Ошибка: ', error);
            });
}