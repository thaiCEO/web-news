<?php
include_once "components/header.php";
include_once "message/news/create.php";
include_once "message/news/edit.php";
include_once "message/news/delete.php";


?>
<div class="col-10">
    <div class="content-right">
        <div class="top">
            <h3 class="text-center">News Contents</h3>
        </div>

        <!-- seachContent -->
        <div class="row h-25 mb-4">
          <div class="col-3">
              <button onclick="btnReset()" class="btn btn-danger shadow-none">Reset</button>
          </div>

            <div class="col-6 search_box ">
                <input type="text" name="search" id="searchContent" class="form-control shadow-none" placeholder="Search Here.....">
            </div>

            <div class="col-3 text-end">
               <button class="btn btn-success shadow-none">Search</button>
            </div>
        </div>
        <!-- seachContent -->

        <div class="bottom view-post">
            <div class="row m-0 p-0">
                <div class="col-lg-12">
                   <div class=" d-flex justify-content-between align-items-center">
                      <h3>News</h3>
                      <button data-bs-toggle="modal" data-bs-target="#modal_add_news"  class=" btn btn-primary rounded-0 shadow-none">add more</button>
                   </div>


                    <table class=" table table-striped table-bordered table-light">
                        <thead>
                            <tr class=" text-danger text-center">
                                <th>Id</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Data</th>
                                <th>Author</th>
                                <th>STATUS</th>
                                <th class=" text-center">ACTION</th>
                            </tr>
                        </thead>
                        <tbody class="show_news">
                           
                        </tbody>
                    </table>

                    <div class="showing_pagination">
                        
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
</div>
</div>
<?php include "components/footer.php" ?>