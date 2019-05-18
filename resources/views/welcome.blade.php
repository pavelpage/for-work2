<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Список файлов в корне проекта</title>

    <link rel="stylesheet" href="{{asset('css/app.css')}}"/>
    <script src="{{asset('js/app.js')}}"></script>
</head>
<body>
<div class="container">
    <div class="col-md-12">
        <h1>Список файлов в корне проекта</h1>
    </div>
    <div class="col-md-12">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Название</th>
                    <th>Размер</th>
                    <th>Тип</th>
                    <th>Дата последней модификации</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                    <tr>
                        <td>{{$item->name}}</td>
                        <td>{{$item->size}}</td>
                        <td>{{$item->type}}</td>
                        <td>{{$item->last_modified}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</body>
</html>