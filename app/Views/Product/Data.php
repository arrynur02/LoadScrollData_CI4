<?php if (!empty($Products)) { ?>
<div class="row">
	<?php foreach ($Products as $rows): ?>
		<div class="col-lg-4 col-md-4 mb-3 col-sm-12 col-xs-12">
			<div class="card">
				<div class="card-header"><h4><?php echo $rows['name']; ?></h4></div>
				<div class="card-body">
					<h5>Category : <?php echo $rows['category']; ?></h5>
					<?php echo $rows['description']; ?>
				</div>
			</div>
		</div>
	<?php endforeach ?>
</div>
<?php }else{ ?>
<div class="text-center p-5"> <h4>No Records Data !!</h4></div>
<?php } ?>