<h2><?= $title ?></h2>
<?php foreach($posts as $post):?>
    <div class="card">
    <div class="card-body">
        <h4><?php echo $post['title'];?></h4>
        <div class="alert alert-light" role="alert">
        <small><?php echo $post['createdDate'];?></small>
        <small><b>Category: <?php echo $post['name'] ?></b></small>
        </div>
        <p><?php echo word_limiter($post['text'],30);?></p>
        <p><a type="button" class="btn btn-light" href="<?php echo site_url('/posts/'.$post['slug']);?>">Read More</a> </p>
    </div>
    <?php endforeach?>