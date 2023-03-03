<?php
include("connection.php");
 ?>
<html>
<?php
$sqlComments = "SELECT * FROM posts JOIN comments ON comments.Post_id = posts.Id  WHERE comments.Post_id = {$_GET["Id"]}";
$statment = $connection->prepare($sqlComments);
$statment->execute();
$statment->setFetchMode(PDO::FETCH_ASSOC);
$comments = $statment->fetchAll();

?>
<ul>
    <?php 
    foreach ($comments as $comment) {
    ?>
    <li style="list-style-type: none">
    <p> <?php echo($comment['Text'])?> </p>
    <p class= "blog-post-meta" <?php echo($comment['Id']) ?>> Comment by: <?php echo($comment['Author'])?> <hr> </p>
   
    </li>
    <?php 
     }
     ?>
</ul>
</html>



