<?php
include("connection.php");

$sql = "SELECT * FROM posts WHERE posts.Id = {$_GET["Id"]}";
$statment = $connection->prepare($sql);
$statment->execute();
$statment->setFetchMode(PDO::FETCH_ASSOC);
$singlePost = $statment->fetch();

?>
<!DOCTYPE html>
<html lang="en"> 
<head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    
     <link href="styles/blog.css" rel="stylesheet">
     <link href="styles/styles.css" rel="stylesheet">

     <title>Document</title>

</head> 
<body>
<div class="blog-post"> 
     <h2 class="blog-post-title"><a href="single-post.php?post_id=<?php echo($singlePost['Id'])?>" > <?php echo ($singlePost['Title'])?> </a></h2>
    <p class="blog-post-meta"><?php echo ($singlePost['Created_at']); ?> by <?php echo ($singlePost['Author'])?> </p>
    <p><?php echo ($singlePost['Body'])?> </p>
    
<div> <?php include("comments.php") ?> </div>
     </div>
</body>
</html>