<h3>Upload Your Image</h3>
<div id="container-fluid">
	<div id="row">	
		<form method="post" id="upload_form" action="upload/uploadImage" enctype="multipart/form-data">
			<div class="row">
				<label class="btn btn-deafult btn-file"><input type="file" name="userfile" id="userfile"/></label>
				<div class="row">
					<div id="upload_error"></div>
				</div>
				<button class="btn btn-success" type="submit" name="submit">Upload</button>
				<div class="btn btn-info" id="skip_upload">Skip</div>
			</div>
		</form>
		</div>
</div>