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
        <li style="margin-top:16px; background-color:#607d8bb5; color:white;"><a href="/reklam-yayinla">Yayindaki Reklam </a></li><br>  
        <li style="margin-top:16px; background-color:#607d8bb5; color:white;"><a href="/admin-logout">ÇIKIŞ</a></li> 
    </ul>
    </div>
	
    <div class="col-sm-9">
            <div id="content">  
                    <div class="inner" style="min-height: 700px;">
                        <div class="row">
                            <div class="col-lg-12 text-center">
                                <h1> Reklam Yayınla Update </h1>
                            </div>
                        </div>
                        <hr />
                        <!--BLOCK SECTION -->
                        <div class="row">
                            <div class="col-lg-12">    	                              
                                    <form action="/update-reklamyayinla/{{$reklam_edit->reklamy_id}}" method="POST" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        {{ method_field('PUT') }}
                                      <input type="hidden" name="reklamy_id" value="{{$reklam_edit->reklamy_id}}">
                                      
                                   
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <label>Product İmage</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="reklamy_image" value="{{$reklam_edit->reklamy_image}}">
                                            </div>                        
                                        </div>
                                    </div>
            
                                    <div class="form-group">
                                      <label for="exampleFormControlSelect1">Reklam Alanı</label>
                                      <select style="color:black;"  name="reklamy_alan"  value="{{$reklam_edit->reklamy_alan}}" class="form-control form-control-lg">
                                        <option>Reklam Alanı</option>
                                        <option>Banner</option>
                                        <option>Sag</option>
                                        <option>Sol</option>
                                        <option>İlan Detay</option>
                                      </select>
                                      </div>

                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="reklamy_durum" value="1">
                                            <label class="form-check-label" for="inlineRadio1">Aktif</label>
                                          </div>
                                    </div>
                      
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="reklamy_durum" value="0">
                                            <label class="form-check-label" for="inlineRadio2">Pasif</label>
                                        </div>
                                    </div>

                                <button class="btn text-muted text-center btn-success" type="submit">Update</button>
                                </form>
                                </div>     				
                            </div>
                        </div>
                          <!--END BLOCK SECTION -->      
                    </div>
	
    </div>

  </div>
</div>

  <script src="{{asset('js/jquery.js')}}"></script>
  
</body>
</html>
