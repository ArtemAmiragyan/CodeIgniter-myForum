
<div class="list-group">
    <?php foreach ($categories as $category):?>
    <a href="<?php echo site_url('categories/posts/'.$category['id']);?>" class="list-group-item list-group-item-action"><?php echo $category['id'];?>
    <?php echo $category['name'];?></a>   
    <?php endforeach; ?>
</div>
