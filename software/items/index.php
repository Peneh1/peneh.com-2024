<?php
include 'db.php';
$sql = "SELECT * FROM items";
$rows = $db->query($sql);
?>

<style>
  .item{
  box-shadow: 5px 10px 18px #888888;
    border-radius: 7px;
    width:300px;
    float:left;
    margin: 20px;
  }
 
  .price{
   float:right;
   color: white;
    background-color:#000;
    width:60px;
    font-size:18px;
    padding:5px;
    margin:10px;
    text-align:center;
    
  }
   .img{
    width:300px;
    height:200px;
    display:block;
    border-radius: 7px 0px 0px 7px;
  }
  .title{
   font-size:24px;
    text-align:center;
    padding:0px 5px;
  }
  .discription{
    padding:10px;
  
    
  }
</style>


<a href="admin/add-new.php">Admin</a>
<hr>




<?php while ($row = $rows ->fetch_assoc()): ?>
<div class="item">
   <img class="img" src="img/<?php echo $row['img_url'];?>" alt="<?php echo $row['title'];?>">
   <h6 class="price">$<?php echo $row['price'];?></h6>
  <div style="clear:both"></div>
  <h5 class="title"><?php echo $row['title'];?></h5>
    <p class="discription"><?php echo $row['discription'];?></p>
  </div>
  		<?php endwhile; ?>
