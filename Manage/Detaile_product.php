<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="Detailes<?php echo  $proid;?>"  role="dialog" >
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<?php
					include 'database/db.php';
				?>
				<div style="margin-left:20px;"><h2><?php echo  $pro_name; ?></h2></div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<img src="image/lavav1.jpg" class="img-thumbnail" alt="Cinque Terre" style="width:150px; height: 200px;margin-left:150px;">
				<div class="container" style="">
				<div class="row" style="margin-top: 20px;">
					<div class="col-md-6" style=" text-align: center;">
						Product Name : <br>Product Brand : <br>Product Catagory : <br>Add Date : <br> Price : <br> Totel Product <hr> Total price <hr>
					</div>
					<div class="col-md-6" style="text-align: right;"><?php echo  $pro_name; ?> <br><?php echo $bra_name; ?> <br> <?php echo $prd_cat; ?> <br> <?php echo $prd_adddate; ?> <br> <?php echo $prd_price ; ?> <br> <?php echo $unit;?> <hr><?php echo $prd_t_price; ?> <hr></div>
				</div></div>
				<button type="button" class="btn btn-success" data-dismiss="modal" style="margin-top: 20px; margin-left: 90%;">OK</button>
			</div>
		</div>
	</div>
</div>
</div>