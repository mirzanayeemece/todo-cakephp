<?php
if(!empty($title)){
	$this->assign("title", $title);
}
?>

<div class="panel panel-primary">
	<div class="panel-heading">
		Student List
		<a href="<?= $this->Url->build('/add-student', ['fullBase' => true]) ?>" class="btn btn-success pull-right" style="margin-top: -7px;">Add Student</a>
	</div>
	<div class="panel-body">
		<table class="table table-bordered">
		    <thead>
		      <tr>
		        <th>Name</th>
		        <th>Email</th>
		        <th>PhoneNo</th>
		        <th>Gender</th>
		        <th>ProfileImage</th>
		        <th>Action</th>
		      </tr>
		    </thead>
		    <tbody>
		    	<?php
		    	if(count($students) > 0) {
		    		foreach($students as $index => $student){
		    	?>
		    	<tr>
			        <td><?= $student->name ?></td>
			        <td><?= $student->email ?></td>
			        <td><?= $student->phone_no ?></td>
			        <td><?= $student->gender ?></td>
			        <td><?= !empty($student->profile_image) ? $this->Html->image($student->profile_image, [
			        	"style" => "width:70px; height:70px;
			        	"]) : "N/A" ?></td>
			        <td>
			        	<form method="post" id="frm-delete-student-<?= $student->id ?>" action="<?= $this->Url->build('/delete-student/'.$student->id, ['fullBase' => true]) ?>">
			        		<input type="hidden" name="id" value="<?= $student->id ?>">
			        	</form>
			        	<a href="<?= $this->Url->build('/edit-student/'.$student->id, ['fullBase' => true]) ?>" class="btn btn-warning">Edit</a>
			        	<a href="javascript:void(0)" onclick="if(confirm('sure?')){ $('#frm-delete-student-<?= $student->id ?>').submit() }" class="btn btn-danger">Delete</a>
			        </td>
			     </tr>
		    	<?php
		    		}
		    	}
		    	?>		      
		    </tbody>
		</table>
    </div>
</div>