      <div class="left1">
            <div class="biaot">Product Center</div>
            <div style="border:1px solid #dddddd; border-top:none; padding:10px 0 0 0">
                <div class="n_sanr">
					<?php 
					$dosql->Execute("SELECT * FROM `#@__infoclass` WHERE parentid=5");
					$num_c =1;
					while($row = $dosql->GetArray()){
						$xx[$num_c-1] = $row;
						$num_c ++;
					}
					foreach($xx as $vo){
						$url = 'products1.php?cid='.$vo['id'];
						echo '<h2><a href="';  echo $url;  echo '">';
						echo $vo['classname'];
						echo '</a></h2>';
							
						$where_xx = "parentid=" .$vo['id'];
						$dosql->Execute("SELECT * FROM `#@__infoclass` WHERE ($where_xx)");
						$num_cc =1;
						$xx2 = '';
						while($row2 = $dosql->GetArray()){
							$xx2[$num_cc-1] = $row2;
							$num_cc ++;
						}
						foreach($xx2 as $vo2){
							$go= 'products2.php?cid='.$vo2['parentid'].'&id='.$vo2['id'];
							echo '<ul class="libi"><li><span><a href="'; echo $go; echo '">';
							echo $vo2['classname'];echo '</a></span>';
								
							$where_xxx = "parentid=" .$vo2['id'];
							$dosql->Execute("SELECT * FROM `#@__infoclass` WHERE ($where_xxx)");
							$num_ccc =1;
							$xx3 = '';
							while($row3 = $dosql->GetArray()){
								$xx3[$num_ccc-1] = $row3;
								$num_ccc ++;
							}
							foreach($xx3 as $vo3){
								$url2 = 'products3.php?cid='.$vo['id'].'&amp;id='.$vo3['id'];
								echo '<p>';
								echo '<a href="'; echo $url2; echo '">'; echo $vo3['classname'];echo '</a><br/>';
								echo '</p>';
							}
							echo '</li></ul>';
						}
					}
					?>
                </div>	
            </div>
   		</div>