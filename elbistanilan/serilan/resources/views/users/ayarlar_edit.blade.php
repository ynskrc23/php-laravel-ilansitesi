<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta content='IE=edge' http-equiv='X-UA-Compatible'/>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1' name='viewport'/>
    <title>Elbistan | Seri | İlan | Reklam</title>
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='{{asset('users/css/SidebarNav.min.css')}}' media='all' rel='stylesheet' type='text/css'/>
  </head>
  <body>
    <aside class="sidebar-left">
      <nav class="navbar navbar-inverse">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".collapse" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
           
          </div>
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="sidebar-menu">

              <li style="margin-top:20px; color:#fafafa;" class="header"> {{Session::get('users_ad')}}</li>
              
            <li>
                <a href="/"> <i class="fa fa-dashboard"></i> <span>Anasayfa</span> </a>
            </li>

            <li>
                <a href="/sayfa"> <i class="fa fa-table"></i>  <span>İlan Sayfam</span> </a>
            </li>

            <li>
              <a href="https://mail.google.com/mail/u/0/?ogbl#inbox" target="_blank"> <i class="fa fa-envelope"></i> <span>Teknik Destek</span></a>
            </li>

            <li style="margin-top:-20px;"> 
                    <?php  $users_id=Session::get('users_id'); echo $users_id;?>
                    <?php 
                      $users = DB::table('tbl_users')    
                      ->where('users_id',$users_id)                              
                      ->get();                                    
                        foreach ($users as $all) {?>	
                        <a href="/edit-ayar/{{$all->users_id}}"> <i class="fa fa-cog"></i> <span>Ayarlar</span></a>         
                    <?php } ?>                 
            </li>


            <li>
                <a href="/logout"><i class="fa fa-power-off"></i> <span>Çıkış Yap</span> </a>
            </li>
  
            </ul>
          </div>
          <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
      </nav>
    </aside>
    
    <div class='content container-fluid' style="background-color:#fafafa;">
      <h2 style="text-align:center; color:orange;" >Kullanıcı Bilgilerim</h2>
      <div style="margin:30px auto;"></div>
      <div class="col-md-1"></div>
      <div class="col-md-9">  
      <form action="/update-ayar/{{$users_edit->users_id}}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PUT') }}

                <div class="form-row">

                    <div class="form-group col-md-12">
                        <label for="inputAddress">Kullanıcı Adı</label>
                       <input type="text" class="form-control" name="users_ad"  value="{{$users_edit->users_ad}}">
                    </div>
                   

                    <div class="form-group col-md-12">
                        <label for="inputEmail4">Email</label>
                        <input type="email" class="form-control" name="users_email" value="{{$users_edit->users_email}}">
                    </div>

                    <div class="form-group col-md-12">
                        <label for="inputPassword4">Password</label>
                        <input type="text" class="form-control"name="users_password" value="{{$users_edit->users_password}}">
                    </div>
        
                    <div class="form-group col-md-12">
                        <button type="submit" class="btn btn-primary pull-right">Düzenle</button>
                    </div>
                
                  </div>
                </form>
              </div> 
              <div class="col-md-2"></div>
        </div>
     

    </div>
    <script src="http://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
  </body>
</html>
