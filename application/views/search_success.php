<?php
echo "<h2> Search Results(".$count.")<br><br> </h2>";
foreach ($resp as $res) {
	 $tag_id = $res['id'];
            $link = site_url('tag/get/'.$tag_id);
            echo $res['id']."<br>";
            echo "<a href='$link'>"."<strong>".$res['name']."</strong><br><br></a>";
          
	# code...
}
//print_r($resp);
?>