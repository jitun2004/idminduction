<?php
error_reporting(0);

$faq_title = $_POST['faq_title'];

$con = mysql_connect("localhost","root","");
$db= mysql_select_db("microfocus", $con);

$sql="select * from faq_details where faq_title='".$faq_title."'";
$query=mysql_query($sql);
$result=mysql_fetch_array($query);

echo '<div class="row">
	<div class="col-sm-2"></div>
		<div class="col-sm-8" style="padding: 30px; position: absolute;color:white">
			<div class="form-group">
				<label for="usr">Update Title:</label>
				<input type="text" class="form-control" id="title" value="'.$result["faq_title"].'">
			</div>
			<div class="form-group">
				<label for="comment">Update Description:</label>
				<textarea class="form-control" rows="10" id="description" >'.$result['faq_description'].'</textarea>
				 <input type="hidden" id="faq_id" value="'.$result['faq_id'].'"> 
			</div>
			
			<!-- Trigger the modal with a button -->
			<button type="button" class="btn btn-info" data-toggle="modal" onclick="showval();" data-target="#myModal">Preview</button>

			<!-- Modal -->
			<div id="myModal" class="modal fade" role="dialog" style="color:black">
			  <div class="modal-dialog">

				<!-- Modal content-->
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title" id="ptitle"></h4>
				  </div>
				  <div class="modal-body">
					<p id="pdesc"></p>
				  </div>
					<script type="text/javascript">
						  function showval()
						  {

							 var title = document.getElementById("title").value;
							 var description = document.getElementById("description").value;
							 
							 document.getElementById("ptitle").innerHTML = title;
							 document.getElementById("pdesc").innerHTML = description;
						  }
					</script>
				  <div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				  </div>
				</div>

			  </div>
			</div>
			
			<button type="button" onclick="updateFunc();" class="btn btn-primary pull-right">Update</button>
			<p id="message1"></p>
		</div>
	<div class="col-sm-2"></div>
</div>';
mysqli_close($con);
?>