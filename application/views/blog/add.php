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
  <h2>Vertical (basic) form</h2>
  <form  name="add-blog-form" action="<?php echo site_url('blog/save');?>" method="post">
    <div class="form-group">
      <label for="title">Title:</label>
      <input type="text" class="form-control" id="blog_title" placeholder="Enter email" name="blog_title">
    </div>
	<div class="form-group">
      <label for="title">Slug:</label>
      <input type="text" class="form-control" id="blog_slug" placeholder="Enter Slug" name="blog_slug">
    </div>
	<div class="form-group">
      <label for="title">Content:</label>
      <input type="text" class="form-control" id="blog_content" placeholder="Enter Content" name="blog_content">
    </div>
     
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>

</body>
</html>
