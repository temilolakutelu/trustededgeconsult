<?php
include 'XownCMS/conn.php';

if (isset($_POST) & !empty($_POST)) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $comment = mysqli_real_escape_string($conn, $_POST['comment']);
    $filename = mysqli_real_escape_string($conn, $_POST['file']);
//$tmp_name = isset(isset($_FILES["file"]["tmp_name"]);


    // $filename = isset($_FILES['file']['name']);
    $target_dir = "blog/images/comment/";
    $target_file = $target_dir . basename($filename);

    // Select file type
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Valid file extensions
    $extensions_arr = array("jpg", "jpeg", "png", "gif");


    if (in_array($imageFileType, $extensions_arr)) {
        move_uploaded_file(isset($_FILES['file']['tmp_name']), $target_dir . $name);

        $isql = "INSERT INTO tb_blog_comment (name, email, comment,avatar) VALUES ('$name', '$email', '$comment', '$filename')";
        $ires = mysqli_query($conn, $isql) or die(mysqli_error($conn));
        if ($ires) {
            $smsg = "Your Comment Submitted Successfully";
        } else {
            $fmsg = "Failed to Submit Your Comment";
        }

    }


}
$sql = "SELECT * FROM tb_blog_comment";
$res = mysqli_query($conn, $sql);


?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >



<div class="panel panel-default">
	<div class="panel-heading">Comments</div>
	<table class="table table-striped"> 
		<thead> 
			<tr> 
				<th>#</th> 
				<th>Name</th> 
				<th>Comment</th> 
                <th>Image</th>
				<th>Time</th> 
				<th>Operations</th> 
			</tr> 
		</thead> 
		<tbody> 
			<tr> 
            <?php
            while ($r = mysqli_fetch_assoc($res)) {
                ?>
	<tr> 
		<th scope="row"><?php echo $r['commentID']; ?></th> 
		<td><?php echo $r['name'] ?></td> 
		<td><?php echo $r['comment']; ?></td> 
        <td><?php echo $r['avatar']; ?></td> 
		<td><?php echo $r['date']; ?></td> 
		
		<td><a href="editcomment.php?id=<?php echo $r['id']; ?>">Edit</a> <a href="commentstatus.php?id=<?php echo $r['id']; ?>&status=publish">App</a> <a href="commentstatus.php?id=<?php echo $r['id']; ?>&status=draft">Dis</a> <a href="delcomment.php?id=<?php echo $r['id']; ?>">Del</a></td> 
	</tr> 
<?php 
} ?>
			</tr> 
		</tbody> 
	</table>
</div>

<div class="panel panel-default">
<div class="panel-heading">Submit Your Comments</div>
  <div class="panel-body">
  <?php if (isset($smsg)) { ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php 
                                                                                                    } ?>
<?php if (isset($fmsg)) { ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php 
                                                                                                } ?>
  	<form method="post">
  	  <div class="form-group">
	    <label for="exampleInputEmail1">Name</label>
	    <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Name">
	  </div>
	  <div class="form-group">
	    <label for="exampleInputEmail1">Email address</label>
	    <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
	  </div>
      <div class="form-group">
	    <label for="avatar">avatar</label>
	    <input type="file" name="file" class="form-control" id="file" placeholder="file">
	  </div>
	  <div class="form-group">
	    <label for="exampleInputPassword1">Comment</label>
	    <textarea name="comment" class="form-control" rows="3"></textarea>
	  </div>
	  <button type="submit" class="btn btn-primary">Submit</button>
	</form>
  </div>
</div>