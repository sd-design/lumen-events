<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <style>
    .event-link:hover{cursor: pointer;opacity: 0.5;font-weight: bold;}
    </style>
</head>
<body>
<div class="container">
<div class="alert alert-info pt-3 pl-3 pb-4 mt-3">
<h3 class="display-3">{{ $title }}</strong></h3>
</div>
<div class="events-list">
<?php var_dump($response);?>
</table>
</div>
</div>
    
</body>
</html>