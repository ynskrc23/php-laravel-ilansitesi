<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Elbistan | Seri | İlan | Reklam</title>
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/admin.css')}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">        
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  
</head>
<body>
    <?php
    $messege=Session::get('messege');
      if($messege){
        echo $messege;
        Session::put('messege',null);
      }
    ?>
    <div id="login_table">
        <form  class="form-signin" action="{{url('/admin-dashboard')}}" method="post" >
            {{ csrf_field() }}
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="fas fa-user"></i></span>
          </div>
          <input  type="text" class="form-control" name="admin_name" placeholder="Kullanıcı Adı" aria-label="Username" aria-describedby="basic-addon1">
        </div>
		
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="fas fa-lock-open"></i></span>
          </div>
          <input type="password" class="form-control" name="admin_password"  placeholder="Şifre" aria-label="Username" aria-describedby="basic-addon1">
        </div>
		
      <button class="btn btn-dark btn-lg btn-block">GİRİŞ</button>
        </form>
    </div>


</body>
</html>
