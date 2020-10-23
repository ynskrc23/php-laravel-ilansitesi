<!DOCTYPE html>
<html lang="tr">
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
             
            <ul class="sidebar-menu" >

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
        <?php	
       
        $all_ilan=DB::table('tbl_ilan')
                          ->join('tbl_kategori','tbl_ilan.kat_id','=','tbl_kategori.kat_id')  
                          ->join('tbl_users','tbl_ilan.users_id','=','tbl_users.users_id')     
                          ->select('tbl_ilan.*','tbl_kategori.kat_ad')
                          ->where('tbl_ilan.users_id',$users_id)
                          ->count('ilan_id');
                         
        ?>	
      <h2 style="text-align:center; color:#ff9800;" >YAYINDAKİ İLANLARIM ({{$all_ilan}})</h2>
      <div style="margin:30px auto;"></div>

      <div style="padding-left: 15px; padding-bottom: 10px;">
            <a href="/ilan-ekle" class="btn btn-success">İlan Ekle</a>
          </div> 
      <div class="panel panel-default">
            <div class="panel-heading">
            
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Resim</th>
                                <th>Kategori</th>
                                <th>Başlık</th>
                                <th>Fiyat</th>
                                <th>Telefon</th>
                                <th>İşlemler</th>
                            </tr>
                        </thead>
                        <?php  $users_id=Session::get('users_id'); ?>
                       <?php 
                                   
                        $ilan_details=DB::table('tbl_ilan')
                          ->join('tbl_kategori','tbl_ilan.kat_id','=','tbl_kategori.kat_id')  
                          ->join('tbl_users','tbl_ilan.users_id','=','tbl_users.users_id')     
                          ->select('tbl_ilan.*','tbl_kategori.kat_ad')
                          ->where('tbl_ilan.users_id',$users_id)
                          ->paginate(3);
                                                                                  
                        foreach ($ilan_details as $all) {?>	    

                        <tbody>
                            <tr class="gradeU">        
                                <td>
                                    @if($all->ilan_image != null)
                                    <img src="{{\Illuminate\Support\Facades\Storage::url($all->ilan_image)}}" height="120px;" width="180px;" alt="" />                  
                                    @else                                       
                                    <img src="{{'../images/home/resimyok.png'}}"height="120px" width="180px" > </td>                        
                                    @endif
                                </td>
                                <td> {{$all->kat_ad}} </td>
                                <td> {{$all->ilan_baslik}} </td>
                                <td> {{$all->ilan_fiyat}} </td>
                                <td> {{$all->ilan_telefon}} </td>
                                <td> 
                                      <a href="/edit-ilan/{{$all->ilan_id}}" class="btn btn-info"> Güncelle</a> 
                                      <a href="/delete-ilan/{{$all->ilan_id}}" class="btn btn-danger"  onclick="return ShowConfirm();"> Sil</a>
                                      <a href="/edit-resim/{{$all->ilan_id}}" class="btn btn-default"> Resim Görüntüle</a>
                                </td>

                                <script type="text/javascript">               
                                  function ShowConfirm() {
                                        var x = confirm("Silmek için emin misin  bundan sonrası çıkılmaz yol olabilir ?");                          
                                        if (x) {                         
                                        }                   
                                        return x;
                                    };
                                </script>
                            </tr>
                        </tbody>
                        <?php } ?>                         
                    </table>
                    <div class="text-center"> {{$ilan_details->links() }} </div>
                </div>    
            </div>
        </div>
      </div>

    </div>
    <script src="http://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   
 
    
  </body>
</html>
