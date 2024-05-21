
<!-- Modal -->
<div class="modal fade" id="SignupModel" tabindex="-1" aria-labelledby="SignupModelLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="SignupModelLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/forum/partials/_handleSighup.php" method="POST">
      <div class="modal-body">
  <div class="form-group">
    <label for="username">Name</label>
    <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">
    
  </div>
  <div class="form-group">
    <label for="useremail">Email address</label>
    <input type="email" class="form-control" id="useremail" name="useremail" aria-describedby="emailHelp">
    
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>
  <div class="form-group">
    <label for="cpassword"> Confirm Password</label>
    <input type="password" class="form-control" id="cpassword" name="cpassword">
  </div>

  <div class="form-group">  
            <label for="role">Role:</label>
            <select class="form-control" name="role" required="">
              <option value="">Select Role</option>
              
              <option value="admin">Admin</option>
              <option value="user">User</option>
            </select>
          </div>
  
  <button type="submit" class="btn btn-primary">SignUp</button>
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
  
</div>
</form>
    </div>
  </div>
</div>
















  
