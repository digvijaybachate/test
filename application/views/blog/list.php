<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Striped Rows</h2>
             
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Sr.No</th>
        <th>Title</th>
        <th>Slug</th>
        <th>Content</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
		if(isset($ArrBlogs) && !empty($ArrBlogs)){
			$count = 1;
			foreach($ArrBlogs as $row){
				?>
				<tr>
					<td><?php echo $count;?></td>
					<td><?php echo $row['blog_title'];?></td>
					<td><?php echo $row['blog_slug'];?></td>
					<td><?php echo $row['blog_content'];?></td>
					<td>
						<a href="<?php echo site_url('blog/edit/'.$row['blog_id']);?>">Edit</a>
						<a href="<?php echo site_url('blog/destroy/'.$row['blog_id']);?>">Delete</a>
					</td>
				</tr>
			<?php
			}
		}
	  ?>	  
    </tbody>
  </table>
</div>

</body>
</html>
