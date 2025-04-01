<?php
  $conn = mysqli_connect("localhost","root","","cms_news");
  
  function getTable( $table_name ) {
    global $conn;
    $sql = "SELECT * FROM $table_name";
    $result = mysqli_query( $conn, $sql );
     
    return $result;
  }
 ?>

<!-- Modal -->
<div class="modal fade" id="modal_add_news" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" style=" max-width:70%;">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add News Post</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" id="form_add_news" enctype="multipart/form-data">
          <div class="row">
            <div class="col-md-8">
              <div class="form-group mb-3">
                <label for="">Title</label>
                <input type="text" name="title" class="title form-control shadow-none" >
              </div>
              <div class="form-group mb-3">
                <label for="">Descriptin</label>
                <textarea name="description" cols="10" rows="20" class="description form-control shadow-none"></textarea>
              </div>
              <div class="form-group mb-3">
                <label for="">Status</label>
                <select name="status" class="status form-select">
                    <option value="1">Active</option>
                    <option value="0">Block</option>
                </select>
              </div>
    
            </div>
            <div class="col-md-4">
              <div class="form-group">
                  <label for="">Category</label>
                  <select name="category" class="category shadow-none  form-control">
                     <?php $category = getTable("category"); 
                     
                      foreach ($category as $item) {
                        ?>
                          <option value="<?php echo $item['category_id']?>"><?php echo $item['category_name']?></option>
                        <?php 
                      }
                     
                     ?>
                      
                     
                  </select>
              </div>
              <div class="form-group">
                  <label for="">Type</label>
                  <select name="sub_category" class="sub_category shadow-none  form-control">
                  <?php $category = getTable("category"); 
                     
                     foreach ($category as $item) {
                       ?>
                         <option value="<?php echo $item['category_id']?>"><?php echo $item['category_name']?></option>
                       <?php 
                     }
                    
                    ?>
                  </select>
              </div>
              <div class="form-group mt-3">
                  <input  type="file" name="image" class="image form-control">
                  <i onclick="upload_image('#form_add_news')"  class="bi bi-plus-circle-fill btn_upload"></i>
                  <div class="image_preview">
                
                  </div>
              </div>

            </div>

          </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        <button onclick="add_news('#form_add_news')" type="button" class="btn btn-success">Save</button>
      </div>
    </div>
  </div>
</div>