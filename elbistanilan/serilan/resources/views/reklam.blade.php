<h2 class="reklam">Reklam Alanı</h2>
				<?php 
				$all=DB::table('tbl_reklamyayinla')									
				->orderBy('created_at', 'desc')      
				->limit(2)
        		->get();
				foreach ($all as $c) {?>
				<div class="col-sm-12">
					
					@if($c->reklamy_alan == 'Sag')											
					<div class="shipping text-center"><!--shipping-->
						<img src="{{\Illuminate\Support\Facades\Storage::url($c->reklamy_image)}}" style="height: 200px; width: 100%; margin-bottom: 20px;" alt="" />
					</div><!--/shipping-->	

					@endif
						
					</div>
					
					<?php } ?>  
					<div class="col-sm-12">
					<img src="{{'../images/home/reklam.jpg'}}"  style="height: 200px; width: 100%; margin-bottom: 20px;" />	
					</div>
					
					