<h2><?php echo $post['title'];?></h2>
<div class="alert alert-light" role="alert">
                <small><?php echo $post['createdDate']; ?></small>
        </div>
<div class="card">
  <div class="card-body">
            <?php echo $post['text']?>
  </div>
</div>
  <hr>
    <a class="btn btn-light" href="<?php echo base_url();?>posts/edit/<?php echo $post['slug'];?>">Edit</a>

    <?php echo form_Open('/posts/delete/'.$post['id']);?>
        <input type="submit" value="Delete" class="btn btn-light">
    </form>
