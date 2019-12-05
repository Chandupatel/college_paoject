<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="Delete<?php echo $proid;?>"  role="dialog" >
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<div> <h6>Prooduct Name</h6></div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row" >
				<div  class="col-md-3" style=" margin-left: 20px;" ><img src="image/Deletw.png" class="rounded" alt="Cinque Terre" style="width: 100px; "></div>

				<div  class="col-md-8" ><h5>Are You Shure delete Product </h5><center><br><h2><?php echo  $pro_name; ?></h2></center></div>
				</div>
				<form method="post" action="Manage/pro_delet.php?Delete=<?php echo $proid;?>" >
					<button type="submit" class="btn btn-danger"  style="margin-top: 20px; margin-left: 30%; width: 80px;">Yes</button>
				</form>
				<button type="button" class="btn btn-secondary" data-dismiss="modal" style="margin-top: 20px; margin-left: 20px; width: 80px; ">NO</button>
			<hr>		
			</div>
		</div>
	</div>
</div>