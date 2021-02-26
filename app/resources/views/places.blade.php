<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}<</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <style>
     .modal-body{transition: all 0.5s;}
    .places-list .card.not_available{background}
    .places-list .card{pointer-events: none;  transition: all 0.32s;}
    .places-list .btn-select{pointer-events: auto;}
    .places-list .card:hover{pointer-events: none;box-shadow:0px 0px 10px 1px rgba(7,39,59,0.22);
-webkit-box-shadow:0px 0px 10px 1px rgba(7,39,59,0.22);
-moz-box-shadow:0px 0px 10px 1px rgba(7,39,59,0.22);}
places-block{position: relative;}
.selected{box-shadow:0px 0px 10px 1px rgba(7,39,59,0.22);
-webkit-box-shadow:0px 0px 10px 1px rgba(7,39,59,0.22);
-moz-box-shadow:0px 0px 10px 1px rgba(7,39,59,0.22);color: #0f5132;background-color: #d1e7dd;border-color: #badbcc;}
.block-reserve{position:fixed;height: 100px;width:200px;bottom: 0; right:20px;box-shadow:0px 0px 10px 1px rgba(7,39,59,0.22);
-webkit-box-shadow:0px 0px 10px 1px rgba(7,39,59,0.22);
-moz-box-shadow:0px 0px 10px 1px rgba(7,39,59,0.22);}
    </style>
</head>
<body>
  <div class="places-block">
<div class="container">
<div class="alert alert-secondary pt-3 pl-3 pb-4 mt-3">
<h3 class="display-3">{{ $title }}</h3>
</div>
<div class="places-list">
<div class="row text-center pr-2 pl-2">
@foreach ($places->response as $place)
@if ($place->is_available == true)
<div class="card m-1" style="width: 16%;">
<div class="card-body">
    <h5 class="card-title">Место # {{ $place->id }}</h5>
    <p class="card-text"><small>Для бронирования нажмите на кнопку</small></p>
    <button data-id="{{ $place->id }}" class="btn btn-info btn-select">Выбрать</button>
  </div>
</div>
    @endif
    @if ($place->is_available == false)
<div class="card alert-danger m-1" style="width: 16%;">
<div class="card-body">
    <h5 class="card-title">Место # {{ $place->id }}</h5>
    <p class="card-text">Забронировано</p>
  </div>
</div>
    @endif
  
@endforeach
</div>

</div>
<div class="block-reserve p-4 text-center">
<button class="btn btn-primary" id="btnReserve">Забронировать</button>
</div>
</div>
</div>
<div class="modal" tabindex="-1" id="modalReserve">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Подтвердите бронь</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="mb-3">Ваше имя</label>
    <input type="text" class="form-control" id="clientName" aria-describedby="emailHelp">

  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
        <button type="button" class="btn btn-primary" id="sendReserve" data-eventid="{{ $eventId }}">Забронировать</button>
      </div>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
let places = []
let myModal = new bootstrap.Modal(document.getElementById('modalReserve'), {
  keyboard: false
})
let modalBody =document.querySelector('.modal-body')

$('.btn-select').on('click', function(){
  $(this).parent().parent().addClass('selected')
  let placeId = $(this).data('id')

  places.push(placeId);
  console.log(places)
});
$('#btnReserve').on('click', function(){
myModal.toggle()
});

$('#sendReserve').on('click', function(){
  let eventId = $(this).data('eventid')
  let inputName = $('#clientName').val()
  let inputPlaces = JSON.stringify(places)
  console.log(inputPlaces, inputName, eventId)
  $.ajax({
type: "POST",
url: "/reserve",
  data: {'eventId': eventId, 'name': inputName, 'places': inputPlaces},
  success: function(answer) {
console.log(answer)
       if(answer.response == true){
         let result = JSON.stringify(answer.result)
        modalBody.innerHTML = "Места забронированы: "+"<div class='alert-info'>"+result+"</div>"
        $('.modal-title').text('Бронь подтверждена')
        $('#sendReserve').toggle()
       }
       else{console.log("Error");}
   }
  });

  return false;
     //end callback
  });

</script>
</body>
</html>