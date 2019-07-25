      <div class="left1">
            <div class="biaot">Product Center</div>
            <div style="border:1px solid #dddddd; border-top:none; padding:10px 0 0 0">
                <div class="n_sanr">
                    <h2><a href="/products.php">Product</a></h2>
                    <ul class="libi">
                    		<?php 
							$dosql->Execute("SELECT * FROM `#@__infoclass` WHERE parentid=5");				//找到父级分类表
							$num_c =1;																		//			
							 while($row = $dosql->GetArray()){												//
							 	if($num_c == 1 ){
							 		$xx[0] = $row;
							 	}else{
									array_push($xx,$row);
								}
								$num_c ++;
							 }
							 foreach($xx as $vo){
									$url = 'products.php?cid='.$vo['id'];
								 echo '<li><span><a href="';  echo $url;  echo '">';
								 echo $vo['classname'];
								 echo '</a></span> ';
								 $where_xx = "classid=" .$vo['id'];
								 $dosql->Execute("SELECT * FROM `#@__infoimg` WHERE ($where_xx)");
								 while($row = $dosql->GetArray()){
									$go= 'products_detail.php?cid='.$row['classid'].'&id='.$row['id'];
                        		 echo '<p><a href="'; echo $go; echo '">';
								 	echo $row['title'];
                        			echo '</a><br/>
                            		</p> </li>';
								 }
							 }
							?>
                    </ul>
                </div>
            </div>
   		</div>