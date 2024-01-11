<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="row">
    <div class="col-md-9 mx-auto">
    	<h1 class="text-center">Incomplete Profile</h1>
      <div class="card card-body shadow mt-5">

      		<p class="lead text-center">You would not be able to create a post unless you complete this step</p>

			<form action="<?php echo URLROOT; ?>/profiles/complete/<?php echo $data['user']->id;?>" method="post"> 
			    <div class="form-group mb-2">
			        <label class="text-muted fs-6">Phone</label>
			        <input type="number" name="phone" class="form-control form-control-lg <?php echo (!empty($data['phone_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['user']->phone; ?>">
			        <span class="invalid-feedback"><?php echo $data['phone_err']; ?></span>
			    </div>
			       
			    <div class="form-group mb-4">
			        <label class="text-muted fs-6">Region</label>
			        <select name="region" class="form-select">
			            <option value=" <?php echo $data['user']->region;?>"> <?php echo $data['user']->region;?></option>
			            <?php foreach ($data['states'] as $states):?>
			            	<option value="<?php echo $states->state;?>"><?php echo $states->state;?></option>
			            <?php endforeach;?>
			        </select>
			    </div> 
			    <div class="form-group mb-4">
			        <label class="text-muted fs-6">Address</label>
			        <input type="text" name="address" class="form-control form-control-lg" value="<?php echo $data['user']->address; ?>">
			    </div>    

			    <div class="row mt-2">
			      <div class="col-12 mb-2">
			        <input type="submit" class="btn btn-primary btn-block" value="Update">
			      </div>
			      
			      <div class="col-lg-6">
			        <a href="<?php echo URLROOT; ?>/posts" class="btn"><i class="fa fa-backward"></i> Skip</a>
			      </div>
			    </div>
			</form>
		</div>
	</div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>