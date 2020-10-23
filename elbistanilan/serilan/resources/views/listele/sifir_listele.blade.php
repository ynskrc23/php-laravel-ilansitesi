<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Elbistan | Seri | İlan | Reklam</title>
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet"}>
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
							<a href="/"><img src="images/home/logo2.png" alt="" /></a>
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
			<div class="col-sm-3">
				<div class="left-sidebar">
				@include('kategori')	
				</div>
			</div>
			
			<div class="col-sm-7 padding-right">
				<div class="features_items"><!--features_items-->
				  <h2 class="title text-center">Sıfır Otomobil İlanlar</h2>
			<?php 
			
            $all_ilan = DB::table('tbl_ilan')              
			->join('tbl_kategori','tbl_ilan.kat_id','=','tbl_kategori.kat_id')
			->select('tbl_ilan.*')
			->where('kat_ad','Sıfır')                
            ->paginate(12);
                       foreach ($all_ilan as $all) {?>	
                        <div class="col-sm-3">			
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
												@if($all->ilan_image != null)											
												<a href="{{URL::to('/ilan_detay/'.$all->ilan_id)}}">
													<img src="{{url('/storage/upload/ilan/'.$all->ilan_image)}}" alt="" />
												<p>{{$all->ilan_baslik}}</p></a>													
											@else                                       
												<a href="{{URL::to('/ilan_detay/'.$all->ilan_id)}}">
												<img src="{{'../images/home/resimyok.png'}}" >
												<p>{{$all->ilan_baslik}}</p></a>		
											 @endif
                                                                                  
                                        </div>									
                                    </div>							
                                </div>       
                        </div>
                        <?php } ?>  
				</div><!--features_items-->
				<div class="text-center"> {{ $all_ilan->links() }} </div>
			</div>

			<!--reklam alanı-->
	
			<div class="col-sm-2 padding-right">
				@include('reklam')
			</div>
			
			<!--/reklam alanı bitti-->
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
		<script src="{{asset('js/lightbox.js')}}"></script>
		<script src="{{asset('js/index.js')}}"></script>
		
	  </body>
	  </html>