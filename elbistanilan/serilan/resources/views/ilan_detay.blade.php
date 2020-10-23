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
	<link href="{{asset('css/lightbox.css')}}" rel="stylesheet" />

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
		
											<li><a href="/ilan-ekle"> Ücretsiz İlan Verin</a></li>
											
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
		<!--ilan detay alanı-->	
		<div class="col-sm-10 padding-right">
			<div class="product-details"><!--product-details-->
				<div class="col-sm-5">
						
					<div class="view-product">

							@if($ilan_details->ilan_image != null)											
								
								<img src="{{\Illuminate\Support\Facades\Storage::url($ilan_details->ilan_image)}}" style="width:100%  height:180px;">
																			
							@else                                       
							
								<img src="{{'../images/home/resimyok.png'}}" >
							
							@endif
					</div><!-- view-product -->

				</div>
				
		
				<div class="col-sm-7">
						
					<div class="product-information"><!--/product-information-->
						<h2 style="text-transform: uppercase;"> {{$ilan_details->ilan_baslik}} </h2>
						<span>
							<span>{{$ilan_details->ilan_fiyat}} TL</span>
						</span>
						<p style="text-transform: capitalize;"><b>Kategori:</b>&nbsp;{{$ilan_details->kat_ad}}</p>
						<p style="text-transform: capitalize;"><b>İlan Tarihi:</b>&nbsp;{{Carbon::parse($ilan_details->created_at)->diffForHumans()}}</p>
						<p style="text-transform: capitalize;"><b>İlan Veren:</b>&nbsp;{{$ilan_details->ilan_adi}} {{$ilan_details->ilan_soyadi}}</p>
						<p style="text-transform: capitalize;"><b>Telefon:</b>&nbsp;{{$ilan_details->ilan_telefon}}</p>
						<p style="text-transform: capitalize;"><b>Adres:</b>&nbsp;{{$ilan_details->ilan_adresi}}</p>
						<p style="text-transform: capitalize;"><b>Görüntüleme:</b>&nbsp;{{ Counter::showAndCount('forum', $ilan_details->ilan_id) }}</p>

						<a href="http://www.facebook.com/share.php?u=http://www.elbistanilan.com/page.php'" target="_blank"> 
							<div class="col-sm-4" style="background-color:#3a5b94;" id="sosyal">
								<p><i class="fa fa-facebook fa-2x"></i> Paylaş</p>
							</div>
						</a>
						 
						<a href="https://twitter.com/share?url=https://elbistanilan.com&amp;text=elbistanilan&amp;hashtags=elbistanilan" 
						target="_blank">
							<div class="col-sm-4" style="background-color:#67bef6;" id="sosyal">
								<p><i class="fa fa-twitter fa-2x"></i> Tweetle</p>
							</div>
						</a>
						
						<a href="https://www.instagram.com/elbistanilan82/" target="blank">
							<div class="col-sm-4" style="background-color: #e95950;" id="sosyal">
								<p><i class="fa fa-instagram fa-2x"></i> Takip Et</p>
							</div>
						</a>
						
						
					</div><!--/product-information-->
					
				</div>
				
				<input type="hidden"  value="<?php echo $ilan_id=$ilan_details->ilan_id;?>">
				<?php $foto = DB::table('tbl_picture')      					 
				->join('tbl_ilan','tbl_picture.picture_ilan_id','=','tbl_ilan.ilan_id') 
				->select('tbl_picture.*','tbl_ilan.*')
				->where('tbl_picture.picture_ilan_id',$ilan_id) 
				->get();   
				
				foreach ($foto as $all) {?>	
				<div class="col-sm-2 col-md-2 col-lg-2">
				  <a href="{{url('/public/storage/upload/ilan/'.$all->picture_name)}}" data-lightbox="roadtrip"><img class="example-image" src="{{url('/public/storage/upload/ilan/'.$all->picture_name)}}" style="margin:20px auto;" height="120px;" width="100%"  alt=""/></a>
				</div>
					<?php } ?> 
				
			</div><!--/product-details-->
			
			<div class="category-tab shop-details-tab"><!--category-tab-->
				<div class="col-sm-12">
					<ul class="nav nav-tabs">
						<li class="active">
							<a href="#details" data-toggle="tab">İlan Detayı</a>
						</li>

						<input type="hidden"  value="<?php echo $ilan_id=$ilan_details->ilan_id;?>">
						<?php $say = DB::table('tbl_yorumlar')      					 
						->join('tbl_ilan','tbl_yorumlar.yorumlar_ilan_id','=','tbl_ilan.ilan_id') 
						->select('tbl_ilan.*','tbl_yorumlar.*')
						->where('tbl_ilan.ilan_id',$ilan_id) 
						->count('yorumlar_ilan_id');   
						?>
						
						<li><a href="#reviews" data-toggle="tab">Yorumlar({{$say}})</a></li>
					</ul>
				</div>
				<div class="tab-content">
					<div class="tab-pane fade active in" id="details" >							
						<div class="col-sm-12">
							<p>
								{{$ilan_details->ilan_detay}}
							</p>
						</div>
					</div>

					
					
				<div class="tab-pane fade" id="reviews" >
					<div class="col-sm-12">
					<div class="comment-area">	
							
					<input type="hidden"  value="<?php echo $ilan_id=$ilan_details->ilan_id;?>">

					<?php	
					$all_ilan = DB::table('tbl_yorumlar')  					 
					->join('tbl_ilan','tbl_yorumlar.yorumlar_ilan_id','=','tbl_ilan.ilan_id') 
					->select('tbl_ilan.*','tbl_yorumlar.*')
					->where('tbl_ilan.ilan_id',$ilan_id)         
					->get();                            
					foreach ($all_ilan as $all) {?>	


							<div class="media">
								
								<div class="media-body">
									<div class="media-content">
																					
										<h6> {{$all->yorumlar_ekleyen}} &nbsp; <span>{{Carbon::parse($all->created_at)->diffForHumans()}} </span></h6>
										<p>
											{{$all->yorumlar_mesaj}}
										</p>

									</div>
								</div>
							</div>

						<?php }?>
					</div>

		
			<div class="marginbot30"></div>
	
				<p><b>Yorumun Yapınız</b></p>
				<form class="inline-form" action="{{route('addyorum')}}" method="POST" enctype="multipart/form-data">
					{{ csrf_field() }} 
					<span>
					
					<input type="hidden" name="yorumlar_ilan_id"  value="{{$ilan_details->ilan_id}}" />
					<input type="text" style="margin-left:0px;" name="yorumlar_ekleyen" placeholder="İsim"/>		
															
					</span>
					<textarea name="yorumlar_mesaj" placeholder="mesaj" ></textarea>
					<button type="submit" class="btn btn-default pull-right">
						Gönder
					</button>
				</form>
			</div>
		</div>
					
				</div>
			</div><!--/category-tab-->
		
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