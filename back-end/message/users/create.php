
<!-- Modal -->
<div class="modal fade" id="modal_add_users" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog " style=" max-width:60%;">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Users page</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" id="form_add_users">
            <div class="form-group">
                <label for="">Username</label>
                <input type="text" name="username" class="username form-control shadow-none" required>
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" name="email" class="email form-control shadow-none" required>
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="password" class="password form-control shadow-none" required>
            </div>
            <div class="form-group">
                <label for="">Role</label>
                <select name="role" class="role form-select">
                    <option value="1">Admin</option>
                    <option value="0">User</option>
                </select>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        <button onclick="add_users('#form_add_users');" type="button" class="btn btn-success">Save</button>
      </div>
    </div>
  </div>
</div>