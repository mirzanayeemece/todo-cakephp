<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
<style>
	#frm-add-student label.error{
		color: red;
	}
</style>

<?php
if(!empty($title)){
	$this->assign("title", $title);
}
?>

<div class="panel panel-primary">
	<div class="panel-heading">
		Add Student
		<a href="<?= $this->Url->build('/student', ['fullBase' => true]) ?>" class="btn btn-success pull-right" style="margin-top: -7px;">Student List</a>
	</div>
	<div class="panel-body">
		<?=
			$this->Form->create($student, [
				"class" => "form-horizontal",
				"id" => "frm-add-student",
				"type" => "file"
			]);
		?>		
	      <div class="form-group">
		    <label class="control-label col-sm-2">Name:</label>
		    <div class="col-sm-10">
		      <input type="text" required class="form-control" id="name" name="name" placeholder="Enter Name">
		    </div>
		  </div>
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="email">Email:</label>
		    <div class="col-sm-10">
		      <input type="email" required class="form-control" name="email" id="email" placeholder="Enter email">
		    </div>
		  </div>
		  <div class="form-group">
		    <label class="control-label col-sm-2">Phone no:</label>
		    <div class="col-sm-10">
		      <input type="text" required class="form-control" id="phone_no" name="phone_no" placeholder="Enter Phone no">
		    </div>
		  </div>
		  <div class="form-group">
		    <label class="control-label col-sm-2">Gender:</label>
		    <div class="col-sm-10">
		      <select name="gender" required class="form-control">
		      	<option value="male">Male</option>
		      	<option value="female">Female</option>
		      	<option value="others">Others</option>
		      </select>
		    </div>
		  </div>
		  <div class="form-group">
		    <label class="control-label col-sm-2">Profile Image:</label>
		    <div class="col-sm-10">
		      <input type="file" required class="form-control" id="profile_image" name="profile_image">
		    </div>
		  </div>
		  <div class="form-group">
		    <div class="col-sm-offset-2 col-sm-10">
		      <button type="submit" class="btn btn-default">Submit</button>
		    </div>
		  </div>
		<?= $this->Form->end(); ?>
	</div>
</div>

<?php
	$this->Html->scriptStart(["block" => true]);
		echo '$("#frm-add-student").validate()';
	$this->Html->scriptEnd();
?>