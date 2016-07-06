<div class="container">
	
<?php
echo "<h2> Search Results For tags(".$count.")<br><br> </h2>";
foreach ($resp as $res) {
	$tag_id = $res['id'];
    $link = site_url('tag/get/'.$tag_id);
    // echo $res['id']."<br>";
    ?>
    <a href="<?php echo $link; ?>">
    <div class="list-group-item"><span class="glyphicon glyphicon-link"></span>
    <?php echo "<a href='$link'>"."<strong>".$res['name']."</strong><br><br></a>";
    echo "</div><br>";
}
?>
</div>