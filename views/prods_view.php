
<div class="container">
<div class="row">
  <div class="col-md-9 col-md-push-3">
      <h1>XYZ's 3D Printing Marketplace</h1><hr>      
      <div class="row">
<?php
//var_dump($prodnames);
foreach ($prodnames as $p => $v){
?>
    <div class="col-md-3">
        <?php echo $v['prod_title']; ?><a href="<?php echo site_url().'products/pn/'.$v['prod_id']; ?>" class="thumbnail" ><img src="<?php echo site_url();?>ext/img/products/<?php echo $v['prod_img']; ?>_thumb.jpg" style="height:120px" alt="<?php echo $v['prod_title']; ?>" style="width:120px;"></a>
    </div>          
<?php } ?>
          
      </div>
      
  </div>
  <div class="col-md-3 col-md-pull-9"><h3>Categories</h3>
      All Products
  </div>
</div>
  
</div>
