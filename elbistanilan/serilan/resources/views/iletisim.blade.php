<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Elbistan | Seri | İlan | Reklam</title>
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('css/main.css')}}" rel="stylesheet">
    <link href="{{asset('css/responsive.css')}}" rel="stylesheet">
    
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
   
	</head><!--/head-->

<body>
  	<header id="header"><!--header-->
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="/"><img src="{{asset('images/home/logo2.png')}}" alt="" /></a>
						</div>				
					</div>					
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
                <ul class="nav navbar-nav">
                    <li><a href="/"> Anasayfa </a></li>	
    
                    <?php $users_id=Session::get('users_id'); ?>
    
                                    <?php if($users_id != NULL){?>
    
                     <?php }else{?>
    
                    <li><a href="ilan-ekle"> Ücretsiz İlan Verin</a></li>
                                        
                                    <?php } ?>
    
                    <li><a href="#myModal" data-toggle="modal">Reklam Ver</a> </li>																
                    <li><a href="/iletisim"> İletişim</a></li>
    
                    <?php $users_id=Session::get('users_id'); ?>
    
                                    <?php if($users_id != NULL){?>
    
                                        <li>
                          <?php $users_ad=Session::get('users_ad'); ?>
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown"> {{Session::get('users_ad')}} <i class="fa fa-caret-down"></i></a>
                          <div class="dropdown-menu">
                          <ul class="nav navbar-nav">
                          <li>
                             <a href="/sayfa"> <i class="fa fa-user"></i> Profil  </a> 	
                            <a href="/logout"> <i class="fa fa-power-off"></i>  Çıkış Yap</a>
                          </li>
                          </ul> 		
                          </div>
                      
                          </li>
          
                          <?php }else{?>
                                                            
                            <?php } ?>
            
                  </ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	</header><!--/header-->
	

  <div class="bs-example">
    <!-- Button HTML (to Trigger Modal) -->
    <!-- Modal HTML -->
<div id="myModal" class="modal fade" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 style="text-align:center;" class="modal-title">Reklam Verme Alanı</h5>		
			</div>
					<div class="modal-body">
						<form action="{{route('addreklamver')}}" method="POST" enctype="multipart/form-data">
							{{ csrf_field() }} 
					<div class="form-group">
					  <label for="exampleFormControlInput1">Ad</label>
					  <input class="form-control form-control-lg" type="text" name="reklamver_adi" placeholder="Ad">
					</div>
					
					<div class="form-group">
					  <label for="exampleFormControlInput1">Soyad</label>
					  <input class="form-control form-control-lg" type="text" name="reklamver_soyadi" placeholder="Soyad">
					</div>
					
					<div class="form-group">
					  <label for="exampleFormControlSelect1">Reklam Süresi</label>
					  <select style="color:black;"  name="reklamver_suresi" class="form-control form-control-lg">
						<option>Reklam Süresi</option>
						<option>&nbsp;&nbsp;-- Günlük</option>
						<option>&nbsp;&nbsp;-- Haftalık</option>
						<option>&nbsp;&nbsp;-- Aylık</option>
					  </select>
					</div>

					<div class="form-group">
						<label for="exampleFormControlSelect1">Reklam Alanı</label>
						<select style="color:black;"  name="reklamver_alan" class="form-control form-control-lg">
						  <option>Reklam Alanı</option>
						  <option>Banner</option>
						  <option>Sag</option>
						  <option>Sol</option>
						  <option>İlan Detay</option>
						</select>
					  </div>

					<div class="form-group">
					  <label for="exampleFormControlInput1">Telefon</label>
					  <input class="form-control form-control-lg"  name="reklamver_telefon" type="text" placeholder="Telefon">
					</div>


					<div class="form-group">
						<label for="exampleFormControlFile1">Fotograf Ekle</label>
						<input type="file" class="form-control-file"  name="reklamver_foto" >
					</div>

					</div>
	
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">İptal</button>
						<button type="submit" class="btn btn-success">Reklam Ver</button>
					</div>
			
					</form> 
	
			</div>
		</div>
	</div>
</div>

  <section> 
    <div class="row">     
    
    <div  class="col-sm-12 padding-right">
	                   
            <div id="contact-page" class="container">
                    <div class="bg">	    	 	
                        <div class="row">  	
                            <div class="col-sm-8">
                                <div class="contact-form">
                                    <h2 class="title text-center">Bizimle İletişime Geçiniz</h2>
                                    <div class="status alert alert-success" style="display: none"></div>
                                    <form id="main-contact-form" class="contact-form row" name="contact-form" action="{{url('iletisim/send')}}" method="post">
                                       {{ csrf_field() }} 
                                        <div class="form-group col-md-6">
                                            <input type="text" name="isim" class="form-control" required="required" placeholder="İsim">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input type="email" name="email" class="form-control" required="required" placeholder="Email">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <input type="text" name="konu" class="form-control" required="required" placeholder="Konu">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <textarea name="mesaj" id="message" required="required" class="form-control" rows="8" placeholder="Mesajınız Yazınız"></textarea>
                                        </div>                        
                                        <div class="form-group col-md-12">
                                            <input type="submit" class="btn btn-primary pull-right" value="Gönder">
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="contact-info">
                                    <h2 class="title text-center">İletişim Bilgileri</h2>
                                    <address>
                                        <p>Adres: Elbistan</p>
                                        <p>Telefon: 0507 614 2709</p>      
                                        <p>Telefon: 0506 170 3376</p>                                   
                                        <p>Email: elbistanilan82@gmail.com</p>
                                    </address>
                                    <div class="social-networks">
                                        <h2 class="title text-center">Sosyal Medya</h2>                                     
                                        <ul>
                                            <li>
                                                <a href="https://www.facebook.com/Elbistan-İlan-ve-Reklam-110058206993284/" target="_blank"><i class="fa fa-facebook"></i></a>
                                            </li>
                                            
                                            <li>
                                                <a href="https://www.instagram.com/elbistanilan82/"  target="_blank"><i class="fa fa-instagram"></i></a>
                                            </li>
                                            <li>
                                                <a href="https://mail.google.com/mail/u/0/?ogbl#inbox" target="_blank"><i class="fa fa-envelope"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>    			
                        </div>  
                    </div>	
                </div><!--/#contact-page-->



      </div>
  
    
    </div>

    </div>
  </section>
  
  <footer id="footer"><!--Footer-->
		@include('footer')	
	</footer><!--/Footer-->
  
    <script src="{{asset('js/jquery.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{asset('js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
    <script src="{{asset('js/index.js')}}"></script>
</body>
</html>
