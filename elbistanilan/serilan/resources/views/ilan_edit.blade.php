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
            <a class="navbar-brand">{{Session::get('users_ad')}}</a>
          </div>
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="sidebar-menu">
            <li class="header">  </li>
            
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
        <h2 style="text-align:center;" >YAYINDAKİ İLANLARIM</h2>
        <div style="margin:30px auto;"></div>
  
    <div class="panel panel-default">
    <div class="panel-heading"> </div>
    <div  class="panel-body">
    <!--Form-->
                       
<form action="/update-ilan/{{$ilan_edit->ilan_id}}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
    <input type="hidden" name="ilan_id" value="{{$ilan_edit->ilan_id}}">
        <div class="row">
            <input type="hidden" name="users_id" 
            value=" <?php  $users_id=Session::get('users_id'); echo $users_id;?>">
            <div class="col-sm-6">              
                <div class="form-group">
                    <label class="control-label">Kategori</label>
                    <select class="form-control" val-type="select" name="kat_id" value="{{$ilan_edit->kat_id}}">
					<option disabled>Emlak</option >									
                      <?php 
                      $all=DB::table('tbl_kategori')                
                          ->where('kat_ad', 'Arsa') 
                          ->orWhere('kat_ad', '=', 'Daire')
                          ->orWhere('kat_ad', '=', 'İş Yeri')                           
                          ->get();                         
                      foreach ($all as $c) {?>
                          <option value="{{$c->kat_id}}">{{$c->kat_ad}}</option>
                      <?php } ?>
                      
                      <option disabled>Otomobil</option>
                      <?php 
                      $all=DB::table('tbl_kategori')                               
                          ->where('kat_ad', 'Kiralık') 
                          ->orWhere('kat_ad', '=', '2 El')
                          ->orWhere('kat_ad', '=', 'Sıfır')                                  
                          ->get();                         
                      foreach ($all as $c) {?>
                           <option value="{{$c->kat_id}}">{{$c->kat_ad}}</option>
                      <?php } ?>
                    
                      <?php 
                      $all=DB::table('tbl_kategori')      
                          ->where('kat_ad', 'Canlı Hayvan')                       
                          ->orWhere('kat_ad', '=', 'İş ilanları')
                          ->orWhere('kat_ad', '=', 'İkinci El Ürünler')                      
                          ->orWhere('kat_ad', '=', 'Yedek Parça')
                          ->orWhere('kat_ad', '=', 'Özel Ders Verenler')
                          ->get();                         
                      foreach ($all as $c) {?>
                         <option value="{{$c->kat_id}}">{{$c->kat_ad}}</option>
                      <?php } ?>
										
                    </select>
                    <span class="help-block"></span>
                </div>
            </div>
                
						<div class="col-sm-6">
                  <div class="form-group">
                        <label class="control-label">İlan Baslıgı</label>
                        <input type="text" name="ilan_baslik" value="{{$ilan_edit->ilan_baslik}}" class="form-control" placeholder="İlan Baslığı">
                        <span class="help-block"></span>
                    </div>
                </div>
            </div>

                <div class="row">                              		
								<div class="col-sm-6">
                    <div class="form-group">
                        <label class="control-label">Adı</label>
                        <input type="text" class="form-control" name="ilan_adi" value="{{$ilan_edit->ilan_adi}}" placeholder="Adı">
                        <span class="help-block"></span>
                    </div>
                </div>
								
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="control-label">Soyadı</label>
                        <input type="text" name="ilan_soyadi" value="{{$ilan_edit->ilan_soyadi}}" class="form-control" placeholder="Soyadı">
                        <span class="help-block"></span>
                    </div>
                </div>
            </div>
							
							<div class="row">
              	<div class="col-sm-6">
                    <div class="form-group">
                        <label class="control-label">Email Address</label>
                        <input type="email" class="form-control" value="{{$ilan_edit->ilan_email}}" name="ilan_email" placeholder="@">
                        <div class="suggestion-box">
                            <span class="suggestion"></span>
                            <span class="suggested-action"></span>
                        </div>
                        <span class="help-block"></span>
                    </div>
                </div>
								
								 <div class="col-sm-6">
                    <div class="form-group">
                           <label class="control-label">Adres </label>
                            <input type="text" class="form-control"value="{{$ilan_edit->ilan_adresi}}" name="ilan_adresi" placeholder="Adres">
                            <span class="help-block"></span>
                        </div>
                    </div>
                </div>

							
                <div class="row">                        
								  <div class="col-sm-6">
                    <div class="form-group">
                        <label class="control-label">Fiyat </label>
                        <input type="text" class="form-control" value="{{$ilan_edit->ilan_fiyat}}" name="ilan_fiyat" placeholder="TL">
                        <span class="help-block"></span>
                    </div>
                 </div>
								
				<div class="col-sm-6">
                    <div class="form-group">
                        <label class="control-label">Telefon </label>
                        <input type="text" class="form-control" value="{{$ilan_edit->ilan_telefon}}" name="ilan_telefon" placeholder="Telefon">
                        <span class="help-block"></span>
                    </div>
                </div>

                <div class="row">	
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="control-label">İlan Detay</label>
                            <textarea class="form-control col-sm-8" rows="6" name="ilan_detay">{{$ilan_edit->ilan_detay}}</textarea>
                        </div>
                    </div>
                </div>
  
                <div class="form-group">
                    <div class="input-group mb-3">
                        <label>İlan İmage</label>
                        <div class="custom-file">          
                        <input type="file"  value="{{$ilan_edit->ilan_image}}"  name="ilan_image">    
                                        
                        </div>                        
                    </div>
                </div>
                              
              <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <button type="submit" class="btn btn-info btn-default pull-right">Güncelle</button>
                    </div>
                </div>
              </div>
                              
            </form>
            </div>
  </div>
  </div>
     
    
    <script src="http://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  
  </body>
</html>
