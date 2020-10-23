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
          <form action="{{route('addpreklamyayinla')}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }} 
              <div class="form-group">
                <label for="exampleFormControlFile1">Fotograf Ekle</label>
                  <input type="file" class="form-control-file" name="reklamy_image">    
                  
                  <div class="form-group">
                    <label for="exampleFormControlSelect1">Reklam Alanı</label>
                    <select style="color:black;"  name="reklamy_alan" class="form-control form-control-lg">
                      <option>Reklam Alanı</option>
                      <option>Banner</option>
                      <option>Sag</option>
                      <option>Sol</option>
                      <option>İlan Detay</option>
                    </select>
                    </div>

                   <div style="margin-top:20px;" class="row">
                    <div class="col-sm-2">
                      <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="reklamy_durum" value="1">
                      <label class="form-check-label" for="inlineRadio1">Aktif</label>
                    </div>
                    </div>

                    <div class="col-sm-2">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="reklamy_durum" value="0">
                        <label class="form-check-label" for="inlineRadio2">Pasif</label>
                      </div>
                      </div>
                  
                      </div>
                    </div>   
                      <div class="modal-footer">         
                        <button type="button" class="btn btn-danger" data-dismiss="modal">İptal</button>                       
                          <button type="submit" class="btn btn-success">Reklam Ekle</button>                     
                      </div>  
                    
                    </form>       
                  </div>
            </div>
        </div>
    </div>

    

<div style="margin-top:15px; margin-left:10px;" class="container-fluid">
  <div class="row content">
	<div class="col-sm-3 sidenav text-center">
      <h4 style="color:#FE980F; font-size:24px;">AKREP APOLETİLER </h4>
	 <img src="{{('../admin/image/2.jpg')}}" class="w3-circle" style="width:60%; height:180px;"><br><br>
      <ul class="nav nav-pills nav-stacked">
          <li style="margin-top:16px; background-color:#607d8bb5; color:white;"><a href="/dashboard">ANASAYFA</a></li><br>      		
          <li style="margin-top:16px; background-color:#607d8bb5; color:white;"><a href="/reklam-yayinla">Yayindaki Reklam </a></li><br> 
          <li style="margin-top:16px; background-color:#607d8bb5; color:white;"><a href="/admin-logout">ÇIKIŞ</a></li> 
          
      </ul>
    </div>
	
    <div class="col-sm-9">
	
		<div style="margin-top:16px; background-color:#607d8bb5; color:white; text-align:center;" class="well well-sm">Tüm kayıtlar</div>   
		<div class="table-responsive">		  
		<table class="table table-hover">
			<thead>
          <a href="#myModal" class="btn btn-success" data-toggle="modal">Reklam Yayınla</a>            
          <a href="/reklam-yayinla-aktif" style="margin-left:20px;" class="btn btn-info">Aktif Reklam </a>
          <a href="/reklam-yayinla-pasif" style="color: #fff;background-color: #6c757d; border-color: #6c757d; margin-left:20px;" class="btn btn-secondary">Pasif Reklam </a>
          <tr>
          <th scope="col">Reklam Resim</th>     		 				  
          <th scope="col">Tarih</th>  
          <th scope="col">Reklam Alan</th>			
          <th scope="col">Reklam Durum</th>			
          <th scope="col">İşlemler</th>	
			  </tr>
			</thead>
                
      <tbody>
          @foreach ($all_reklam as $r) 
              <tr class="odd gradeX">
                
                <td>
                    @if($r->reklamy_image != null)
                    <img src="{{\Illuminate\Support\Facades\Storage::url($r->reklamy_image)}}" style="height: 80px" width="160px;"> </td>
                
                    @else                                       
                    <img src="{{'../images/home/resimyok.png'}}" style="height: 80px" width="160px;"> </td>
                
                     @endif
                  
                   <td> {{Carbon::parse($r->created_at)->diffForHumans()}}  </td>
                   <td> {{$r->reklamy_alan}} </td>
                <td class="center">
                    @if($r->reklamy_durum==1)
                    <button class="btn btn-success btn-sm"> Aktif</button> 
                    @else                                       
                    <button class="btn btn-dark btn-sm"> Pasif</button>
                     @endif
                </td> 
                <html>

                <script type="text/javascript">               
                  function ShowConfirm() {
                        var x = confirm("Emin misin silmek için bundan sonrası çıkılmaz yol olabilir ?");                          
                        if (x) {
          
                        }                   
                        return x;
                    };
                </script>

                <td class="center">  
                <a href="/edit-reklamyayinla/{{$r->reklamy_id}}" class="btn btn-info"> Güncelle </a>                                                                                                     
                <a href="/delete-reklamyayinla/{{$r->reklamy_id}}" class="btn btn-danger"  onclick="return ShowConfirm();"> Delete </a>                                            
                </td>   
              </tr> 
          @endforeach
      </tbody>
       
    </table>
    
		<div class="text-center"> {{ $all_reklam->links() }} </div>
		</div>
    </div>

    

  </div>
</div>

  <script src="{{asset('js/jquery.js')}}"></script>
  <script src="{{asset('js/bootstrap.min.js')}}"></script>
  
</body>
</html>
