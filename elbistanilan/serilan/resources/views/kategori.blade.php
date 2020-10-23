
<h2>Kategori</h2>
<div class="panel-group category-products" id="accordian"><!--category-productsr-->
    
    <div class="panel panel-default">
           
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordian" href="#emlak">
                    <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                    Emlak
                </a>
            </h4>
        </div>
        <div id="emlak" class="panel-collapse collapse">
            <div class="panel-body">                 
                <ul>
                    
                    <li><?php 
                        $all_ilan = DB::table('tbl_kategori')    
                        ->where('kat_ad', 'Arsa')                        
                        ->distinct()             
                        ->get(['kat_ad']);                            
                        foreach ($all_ilan as $all) {?>	
                        <a href="/arsa">{{$all->kat_ad}} </a>
                        <?php } ?>  
                    </li>	
                    
                    <li><?php 
                        $all_ilan = DB::table('tbl_kategori')    
                        ->where('kat_ad', 'Daire')                         
                        ->distinct()             
                        ->get(['kat_ad']);                            
                        foreach ($all_ilan as $all) {?>	
                        <a href="/daire">{{$all->kat_ad}} </a>
                        <?php } ?>  
                    </li>		

                    <li><?php 
                        $all_ilan = DB::table('tbl_kategori')    
                        ->where('kat_ad', 'İş Yeri')                       
                        ->distinct()             
                        ->get(['kat_ad']);                            
                        foreach ($all_ilan as $all) {?>	
                        <a href="/isyeri">{{$all->kat_ad}} </a>
                        <?php } ?>  
                    </li>		
                   
                 </ul>    
            </div>
        </div>
       
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordian" href="#otomobil">
                    <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                    Otomobil
                </a>
            </h4>
        </div>
        <div id="otomobil" class="panel-collapse collapse">
            <div class="panel-body">
                <ul>                	
                    <li>
                        <?php 
                        $all_ilan = DB::table('tbl_kategori')    
                        ->where('kat_ad', 'Kiralık')                      
                        ->distinct()             
                        ->get(['kat_ad']);    
                        foreach ($all_ilan as $all) {?>  
                        <a href="/kiralik">{{$all->kat_ad}} </a>
                        <?php } ?>    
                    </li>			           												
                            
                    <li>
                        <?php 
                        $all_ilan = DB::table('tbl_kategori')    
                        ->where('kat_ad', 'Sıfır')                         
                        ->distinct()             
                        ->get(['kat_ad']);    
                        foreach ($all_ilan as $all) {?>  
                        <a href="/sifir">{{$all->kat_ad}} </a>
                        <?php } ?>    
                        </li>	

                        <li>
                            <?php 
                            $all_ilan = DB::table('tbl_kategori')    
                            ->where('kat_ad', '2 El')                             
                            ->distinct()             
                            ->get(['kat_ad']);    
                            foreach ($all_ilan as $all) {?>  
                            <a href="/ikinciel">{{$all->kat_ad}} </a>
                            <?php } ?>    
                        </li>		
                </ul>
            </div>
        </div>
    </div>

    
    <div class="panel panel-default">            
            <div class="panel-heading">    
                    <?php 
                    $all_ilan = DB::table('tbl_kategori')              
                    ->where('kat_ad','İş ilanları')                                      
                    ->distinct()             
                    ->get(['kat_ad']);                                            
                    foreach ($all_ilan as $all) {?>	    
                <h4 class="panel-title"><a href="/is-ilanlari">{{$all->kat_ad}} </a></h4>				       
                <?php } ?>    
            </div>         
    </div>

       
    <div class="panel panel-default">
              
            <div class="panel-heading">    
                    <?php 
                    $all_ilan = DB::table('tbl_kategori')              
                    ->where('kat_ad','İkinci El Ürünler')               
                    ->distinct()             
                    ->get(['kat_ad']);                                            
                    foreach ($all_ilan as $all) {?>	    
                <h4 class="panel-title"><a href="/ikinciel-urunler">{{$all->kat_ad}} </a></h4>				       
                <?php } ?>    
            </div>
              
    </div>

    <div class="panel panel-default">          
            <div class="panel-heading">    
                    <?php 
                    $all_ilan = DB::table('tbl_kategori')              
                    ->where('kat_ad','Canlı Hayvan')               
                    ->distinct()             
                    ->get(['kat_ad']);                                            
                    foreach ($all_ilan as $all) {?>	    
                <h4 class="panel-title"><a href="/canli-hayvan">{{$all->kat_ad}} </a></h4>				       
                <?php } ?>    
            </div>            
    </div>
    
    <div class="panel panel-default">          
            <div class="panel-heading">    
                    <?php 
                    $all_ilan = DB::table('tbl_kategori')              
                    ->where('kat_ad','Yedek Parça')               
                    ->distinct()             
                    ->get(['kat_ad']);                                            
                    foreach ($all_ilan as $all) {?>	    
                <h4 class="panel-title"><a href="/yedek-parça">{{$all->kat_ad}} </a></h4>				       
                <?php } ?>    
            </div>            
    </div>

    <div class="panel panel-default">          
            <div class="panel-heading">    
                    <?php 
                    $all_ilan = DB::table('tbl_kategori')              
                    ->where('kat_ad','Özel Ders Verenler')               
                    ->distinct()             
                    ->get(['kat_ad']);                                            
                    foreach ($all_ilan as $all) {?>	    
                <h4 class="panel-title"><a href="/ozel-ders">{{$all->kat_ad}} </a></h4>				       
                <?php } ?>    
            </div>            
    </div>
    <?php 

    $all=DB::table('tbl_reklamyayinla')									
    ->orderBy('created_at', 'desc')      
    ->limit(2)
    ->get();
    foreach ($all as $c) {?>
    <div class="col-sm-12">
        
        @if($c->reklamy_alan == 'Sol')											
        <div class="shipping text-center"><!--shipping-->
            <img src="{{\Illuminate\Support\Facades\Storage::url($c->reklamy_image)}}" style="height: 200px; width: 100%; margin-bottom: 20px;" alt="" />
        </div><!--/shipping-->	

        @endif
            
        </div>
        
        <?php } ?>  
       
</div><!--/category-products-->	
<div  class="col-sm-12">
    <img src="{{'../images/home/reklam.jpg'}}"  style="height: 200px; width: 100%; margin-bottom: 20px; " />	
    </div>