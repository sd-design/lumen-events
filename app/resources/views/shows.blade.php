<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Список мероприятий</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<body>
<div class="container">
<div class="alert alert-warning pt-3 pl-3 pb-4 mt-3">
<h3 class="display-3">{{ $title }}</h3>
</div>
<div class="events-list">
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ID мероприятия</th>
      <th scope="col">Название мероприятия</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($shows->response as $show)
    <tr>
      <th scope="row">{{ $show->id }}</th>
      <td><a href="events/{{ $show->id }}">{{ $show->name }}</a></td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
</div>
    
</body>
</html>