<div id="container-fluid">
	<div class="row ">
		<div class="<?php if ( !isset($is_profile)) {echo "col-sm-offset-4";} ?>">
			<form method="post" id="upload_form" action="<?php echo site_url()?>/verifyupload/uploadImage" enctype="multipart/form-data">
				<div class="row">
					<h3>Upload Your Image</h3>

					<label class="btn btn-deafult btn-file"></label><input type="file" name="userfile" id="userfile"/>
					<div class="row">
						<div id="upload_error" class="col-sm-4"></div>
					</div>
					<br>
					<button class="btn btn-success" type="submit" name="submit" value="upload">Upload</button>
					<?php if ( !isset($is_profile) )
					{
					?>
					<div class="btn btn-info" id="skip_upload">Skip</div>
					<?php
					}
					?>
				</div>
			</form>
		</div>
	</div>
</div>