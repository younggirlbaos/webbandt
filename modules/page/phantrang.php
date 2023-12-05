	
	
	<div id="phantrang" style='clear:both'>
	<ul>
	<p>Trang:</p>
	<?php
	if($trang!=1){
		?>
	<a href='?do=<?php echo $tentrang;?>&trang=<?php echo $trang-1;?>'><li> << Lùi lại</li></a>
	<?php }?>
	<?php
	
	for($i=1;$i<=$sotrang;$i++){
		if($i==$trang){
			echo "<a href='?do={$tentrang}&trang={$i}'><li style='background:#666666;color:white'>".$i."</li></a>";
		}else
		echo "<a href='?do={$tentrang}&trang={$i}'><li>".$i."</li></a>";
	}
	if($trang!=$sotrang){
		?>
	<a href='?do=<?php echo $tentrang;?>&trang=<?php echo $trang+1;?>'><li>Tiếp Theo >></li></a>
	<?php }?>
	</ul>
	</div>