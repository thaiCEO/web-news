<!-- Modal -->
<div class="modal fade" id="modal_delete_news" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel"></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
         <input type="hidden" name="content_id" class="content_id">
         <input type="hidden" name="content_image" class="content_image">
         <h3>Do you want to delete this ?</h3>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
        <button onclick="deleteNews()" type="button" class="btn btn-success">Yes</button>
      </div>
    </div>
  </div>
</div>