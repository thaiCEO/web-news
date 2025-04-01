<!-- Modal -->
<div class="modal fade" id="modal_edit_contact" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog " style=" max-width:60%;">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Update Contact</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST">
            <div class="form-group">
                <label for="">Contact Name</label>
                <input type="text" name="name" class="name form-control shadow-none" required>
            </div>
            <div class="form-group">
                <label for="">Contact By</label>
                <input type="text" name="contact_by" class="contact_by form-control shadow-none" required>
            </div>
            <div class="form-group">
                <label for="">Contact Logo</label>
                <input type="file" name="contact_logo" class="contact_logo form-control shadow-none" required>
            </div>
            <div class="form-group">
                <label for="">Status</label>
                <select name="role" class="role form-select">
                    <option value="1">Active</option>
                    <option value="0">Block</option>
                </select>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success">Update</button>
      </div>
    </div>
  </div>
</div>