<h2><?= $title ?></h2>

<!<div class="alert alert-danger" role="alert">
<?php echo validation_errors(); ?>
<!</div>

<?php echo form_open('posts/create'); ?>
  <div class="form-group">
    <label for="exampleFormControlInput1">Title</label>
    <input class="form-control" name="title" placeholder="Add Title">
  </div>

  <div class="form-group">
    <label for="exampleFormControlTextarea1">Content</label>
    <textarea class="form-control" name="text"  rows="5" placeholder="Tell about it" ></textarea>
  </div>
  
  <div class="form-group">
    <label for="exampleFormControlSelect1">Category</label>
    <select name="categoryId" class="form-control" id="exampleFormControlSelect1">
    <?php foreach($categories as $category):?>  
      <option value="<?php echo $category['id'];?>"><?php echo $category['name'];?></option>
    <?php endforeach;?>  
    </select>
  </div>
  <button type="submit" class="btn btn-light">Submit</button>
</form>