<div id="container-fluid">
	<div class="row ">

		<div class="col-sm-offset-4">
			<form method="post" id="upload_form" action="verifyupload/uploadImage" enctype="multipart/form-data">
				<div class="row">
					<h3>Upload Your Image</h3>

					<label class="btn btn-deafult btn-file"></label><input type="file" name="userfile" id="userfile"/>
					<div class="row">
						<div id="upload_error"></div>
					</div>
					<br>
					<button class="btn btn-success" type="submit" name="submit" value="upload">Upload</button>
					<div class="btn btn-info" id="skip_upload">Skip</div>
				</div>
			</form>
		</div>
	</div>
</div>