


<div class="modal fade" id="CatModel" tabindex="-1" aria-labelledby="CatModelLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="CatModelLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/forum/partials/_handleCat.php" method="POST">
      <div class="modal-body">
  <div class="form-group">
    <label for="username">Category Name</label>
    <input type="text" class="form-control" id="cat_name" name="category_name" aria-describedby="emailHelp">
    
  </div>
  <div class="form-group">
    <label for="useremail">Category Description</label>
    <textarea class="form-control" id="cat_desc" name="category_description" rows="3"></textarea>
    <!-- <input type="text" class="form-control" id="" name="" aria-describedby="emailHelp"> -->
    
  </div>
 
  

 
  
  <button type="submit" class="btn btn-primary">Add</button>
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
  
</div>
</form>
    </div>
  </div>
</div>