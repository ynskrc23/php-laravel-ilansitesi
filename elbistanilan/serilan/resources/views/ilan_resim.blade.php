<!DOCTYPE html>
<html lang="tr">
  <head>
    <meta charset="UTF-8">
    <meta content='IE=edge' http-equiv='X-UA-Compatible'/>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1' name='viewport'/>
    <title>Elbistan | Seri | İlan | Reklam</title>
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{asset('users/css/SidebarNav.min.css')}}" media='all' rel='stylesheet' type='text/css'/>
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
            <li style="margin-top:20px; color:#fafafa;" class="header">
            <p style="text-transform: capitalize;"> {{Session::get('users_ad')}} </p></li>
            
            <li>
                <a href="/"> <i class="fa fa-dashboard"></i> <span>Anasayfa</span> </a>
            </li>

            <li>
                <a href="/sayfa"> <i class="fa fa-table"></i>  <span>İlan Sayfam</span> </a>
            </li>

            <li>
                <a href="#"> <i class="fa fa-envelope"></i> <span>Teknik Destek</span></a>
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
    <h2 style="text-align:center;" >YAYINDAKİ İLANLARIM</h2>
     <a href="#myModal" class="btn btn-success" data-toggle="modal">Resim Ekle</a>
    <div style="margin:20px auto;"></div>

   
    
    <div class="bs-example">
        <!-- Button HTML (to Trigger Modal) -->
        <!-- Modal HTML -->
    <div id="myModal" class="modal fade" tabindex="-1">
      <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 style="text-align:center;" class="modal-title">İlan Resim Alanı</h5>    
            </div>

            <div class="modal-body">
            <form class="inline-form" action="{{route('updatefoto')}}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }} 
                  <div class="row">
                    <div style="margin-top:10px;"  class="col-sm-12">              
                      <div class="input-group control-group increment" >
                        <label for="exampleFormControlFile1">Fotograf Ekle</label>
                        <input type="hidden" value="<?php echo $ilan_id=$ilan_resim_details->ilan_id;?>" name="image_id">
                        <input type="file" name="filename[]" multiple>
                      </div>             
                    </div>
                  </div> 

                  <div class="modal-footer">         
                    <button type="button" class="btn btn-danger" data-dismiss="modal">İptal</button>  
                    <button type="submit" class="btn btn-success">Ekle</button>
                  </div>                      
              </form>       
              </div>

          </div>
       </div>
    </div>

    <div class="panel panel-default">
    <div class="panel-heading"> </div>
    <div  class="panel-body">
    <input type="hidden" value="<?php echo $ilan_id=$ilan_resim_details->ilan_id;?>">
    <?php 
      $ilan_resim_details=DB::table('tbl_ilan')         
      ->join('tbl_picture','tbl_ilan.ilan_id','=','tbl_picture.picture_ilan_id')  
      ->select('tbl_ilan.*','tbl_picture.*')
      ->where('tbl_ilan.ilan_id',$ilan_id)      
      ->get(); 
      
    foreach ($ilan_resim_details as $all) { 
    if (count($ilan_resim_details)>0) { ?>
        <div class="col-sm-3" style="margin-bottom: 20px;">      
        <div class="product-image-wrapper">
            <div class="single-products">
                <div class="productinfo text-center">
                  <form action="/delete-resim/{{$all->picture_id }}" method="post">
                  {{ csrf_field() }}
                  <img src="{{url('/storage/upload/ilan/'.$all->picture_name)}}"
                  height="125px" width="80%" alt="" />
                   <button type="submit" class="btn btn-danger pull-right" style="margin: 10px;"
                    onclick="return confirm('Silmek istediğinizden emin misiniz?');">Kaldır</button>
                  </form>
                </div>                  
            </div>              
        </div>       
        </div>
    <?php }
    else echo "resim yok"; }?>
    </div>
    </div>
   
    
    
    <script src="http://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src='{{asset('users/js/SidebarNav.min.js')}}' type='text/javascript'></script>
    <script>
      $('.sidebar-menu').SidebarNav()
    </script>
    
  </body>
</html>
