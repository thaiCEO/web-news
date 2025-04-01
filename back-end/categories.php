<?php
include('components/header.php');
?>
<div class="col-10">
    <div class="content-right">
        <div class="top">
            <h3 class="text-center">Categories</h3>
        </div>
        <div class="bottom view-post">
            <div class="row m-0 p-0 mt-5">
                <div class="col-lg-12">
                    <form method="POST" class=" shadow p-5" id="formCategory">

                       <input type="hidden" name="category_id" id="category_id">
                        <div class="form-gruop">
                            <label for="">Category Name</label>
                            <input type="text" name="category_name" id="category_name" class="category_name form-control w-100">
                        </div>
                        <div class="form-gruop">
                            <label for="">Status</label>
                            <select name="category_status" id="category_status" class="category_status form-select">
                                <option value="1">Active</option>
                                <option value="0">Block</option>
                            </select>
                        </div>
                        <div class="form-buuton mt-3">
                            <button type="reset" class=" btn btn-danger rounded-0 reset_category">Reset</button>
                            <button onclick="add_Category('#formCategory');" type="button"  class=" btn btn-success rounded-0 save_category">Save</button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-12 mt-5">
                    <table class=" table table-striped table-bordered table-light">
                        <thead>
                            <tr class=" text-danger">
                                <th>ID</th>
                                <th>NAME</th>
                                <th>STATUS</th>
                                <th class=" text-center">ACTION</th>
                            </tr>
                        </thead>
                        <tbody id="allCategory">
                           
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </div>
</div>
</div>
</div>
<?php include_once "components/footer.php" ?>