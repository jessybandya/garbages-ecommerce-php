<!DOCTYPE html>
<html>
<head>
  <title>Bootstrap card</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
<div class="row">
  <div class="col-sm-6">
      <p>Image at the top</p>
  <div class="card text-center" style="width:400px">
    <img class="card-img-top m-auto" src="../Bootstrap cards/person.png" alt="Card image" style="width:150px;height:150px;">
    <div class="card-body">
      <h4 class="card-title">Martin</h4>
      <p class="card-text">Martin is an architect and engineer</p>
      <a href="#" class="btn btn-primary">See Profile</a>
    </div>
  </div>
  </div>
  <div class="col-sm-6">
    <p>Image at the bottom</p>
  <div class="card text-center" style="width:400px">
    <div class="card-body">
      <h4 class="card-title">John</h4>
      <p class="card-text">John is an architect and engineer</p>
      <a href="#" class="btn btn-primary">See Profile</a>
    </div>
    <img class="card-img-bottom m-auto" src="../Bootstrap cards/person1.png" alt="Card image" style="width:150px;height:150px;">
  </div>
  </div>
</div>
</div>
</body>
</html>