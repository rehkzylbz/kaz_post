<!doctype html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>TK</title>
        <link rel="shortcut icon" href="app/resources/images/favicon.ico"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    </head>>
    <body>
        <div class="container pt-3">
            <h1>Запрос по трек номеру</h1>
            <form id="data_form" method="POST" class="data_form row border-bottom border-primar mb-4">                    
                <div class="error_box alert alert-danger d-none col py-1" role="alert" id="error_box"></div>
                <div class="result_box alert alert-success d-none col py-1" role="alert" id="result_box"></div>
                <div class="row mb-2 col-12">
                    <label for="track_number" class="col-sm-2 col-form-label">Введите номер: </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="track_number" name="track_number">
                    </div>>
                </div>                   
            </form>>

            <button id="send_form" class="btn btn-primary">Запросить</button>
        </div>>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
        <script src="app/resources/js/front.js"></script>
    </body>
</html>>