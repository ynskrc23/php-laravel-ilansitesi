<!DOCTYPE html>
<html lang="tr">
<head>
<title>Elbistan | Seri | İlan | Reklam</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="author" content=" ">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="{{asset('admin/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('admin/css/w3.css')}}">


</head>
<body>
   
	
<div style="margin-top:15px; margin-left:10px;" class="container-fluid">
  <div class="row content">
	<div class="col-sm-3 sidenav text-center">
      <h4 style="color:#FE980F; font-size:24px;">AKREP APOLETİLER </h4>
	 <img src="{{asset('../admin/image/2.jpg')}}" class="w3-circle" style="width:60%; height:180px;"><br><br>
      <ul class="nav nav-pills nav-stacked">
		<li style="margin-top:16px; background-color:#607d8bb5; color:white;"><a href="/dashboard">ANASAYFA</a></li><br>   
        <li style="margin-top:16px; background-color:#607d8bb5; color:white;"><a href="reklam-yayinla">Yayindaki Reklam </a></li><br>  
        <li style="margin-top:16px; background-color:#607d8bb5; color:white;"><a href="/admin-logout">ÇIKIŞ</a></li> 
    </ul>
    </div>
	
    <div class="col-sm-9">
		
			<?php	
			$all_users = DB::table('tbl_users')->count('users_id');      
			?>	

			<?php	
			$all_ilan = DB::table('tbl_ilan')->count('ilan_id');      
			?>	
			
			<?php	
			$all_reklam = DB::table('tbl_reklamyayinla')->count('reklamy_id');      
			?>
	<div class="text-center">	
		<button type="button" style="height:120px; width:190px; margin:14px; 0px; " class="btn btn-primary"> <p>Toplam Kullanıcı Sayısı<h3>{{$all_users}}</h3></p> </button>
		<button type="button" style="height:120px; width:190px; margin:14px; 0px; " class="btn btn-success"> <p>Toplam İlan Sayısı<h3>{{$all_ilan}}</h3></p> </button>
		<button type="button" style="height:120px; width:190px; margin:14px; 0px; " class="btn btn-danger">  <p>Toplam Reklam Sayısı<h3>{{$all_reklam}}</h3></p> </button>
	</div>
		<div style="margin-top:16px; background-color:#607d8bb5; color:white; text-align:center;" class="well well-sm">Reklam VerTüm Kayıtlar</div>   
		<div class="table-responsive">		  
		<table class="table table-hover">
			  <thead>
				<tr>
				  <th scope="col">Reklam Resim</th>				 
				  <th scope="col">Adı</th>
				  <th scope="col">Soyadı</th>
				  <th scope="col">Süresi</th>	
				  <th scope="col">Alan</th>		 	 
				  <th scope="col">Telefon</th>
				  <th scope="col">Tarih</th>
				  <th scope="col">İşlemler</th>										  
				</tr>
			  </thead>

			  <tbody>
				@foreach ($all_reklamver as $rv) 
					<tr class="odd gradeX">	
					  <td><img src="{{\Illuminate\Support\Facades\Storage::url($rv->reklamver_foto)}}" style="height: 80px" width="160px;"> </td>
					  <td> {{$rv->reklamver_adi}} </td>	
					  <td> {{$rv->reklamver_soyadi}} </td>	
					  <td> {{$rv->reklamver_suresi}} </td>	
					  <td> {{$rv->reklamver_alan}} </td>	
					  <td> {{$rv->reklamver_telefon}} </td>	
					  <td> {{Carbon::parse($rv->created_at)->diffForHumans()}} </td>
					  <td class="center">  					                                                                                               
							<a href="/delete-reklamver/{{$rv->reklamver_id}}" class="btn btn-danger"  onclick="return ShowConfirm();"> Delete </a>                                            
					  </td> 
					  <script type="text/javascript">               
						function ShowConfirm() {
							  var x = confirm("Emin misin silmek için bundan sonrası çıkılmaz yol olabilir ?");                          
							  if (x) {
				
							  }                   
							  return x;
						  };
					  </script>				 
					</tr> 
				@endforeach
			</tbody>
			 	  	
		</table>
		<div class="text-center"></div>
		</div>
    </div>

  </div>
</div>

<script src="{{asset('js/jquery.js')}}"></script>
  
</body>
</html>
