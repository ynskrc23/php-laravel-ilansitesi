@extends('layout')
@section('content')
<h2 class="title text-center">Seri İlanlar</h2>

<?php 
$all_ilan = DB::table('tbl_ilan')    
       ->orderBy('created_at', 'desc')    
       ->distinct()
       ->limit(20)
       ->get();
   foreach ($all_ilan as $all) {?>	
    <div class="col-sm-3">			
            <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                        @if($all->ilan_image != null)        
                            <a href="{{URL::to('/ilan_detay/'.$all->ilan_id)}}">
                            <img src="{{url('/storage/upload/ilan/'.$all->ilan_image)}}" alt="" />
                            <h4 style="color:#ff9800b8;"> {{$all->ilan_baslik}}</h4>
                            </a>	

                        @else                                       
                            <a href="{{URL::to('/ilan_detay/'.$all->ilan_id)}}">
                            <img src="{{'../images/home/resimyok.png'}}" > 
                            <h4 style="color:#ff9800b8;"> {{$all->ilan_baslik}}</h4>
                            </a>		
                        @endif
                                  	                                 							
                    </div>          									
                </div>							
            </div>        
    </div>
    <?php } ?>  
   
@endsection


					