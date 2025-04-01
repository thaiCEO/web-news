
<?php 
include '../config.php';
session_start();
if (isset($_SESSION['email']) && isset($_SESSION['user_id']))  {

    include('components/header.php');
    include('message/users/create.php');
    include('message/users/edite.php');

?>
                <div class="col-10">
                    <div class="content-right">
                        <div class="top">
                            <h3 class="text-center">Admin Dashboard</h3>
                        </div>
                        <div class="bottom view-post">

                            <div class="row m-0 p-0">
                                <div class="col-lg-3 col-md-4 col-6 mb-3">
                                    <div class="card bg-info">
                                        <h3 class="card-title text-center">កម្សាន្ត</h3>
                                        <p class="text-center">ចំនួនបង្ហោះ 10 ព័ត្នមាន</p>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-6 mb-3">
                                    <div class="card bg-info">
                                        <h3 class="card-title text-center">កម្សាន្ត</h3>
                                        <p class="text-center">ចំនួនបង្ហោះ 10 ព័ត្នមាន</p>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-6 mb-3">
                                    <div class="card bg-info">
                                        <h3 class="card-title text-center">កម្សាន្ត</h3>
                                        <p class="text-center">ចំនួនបង្ហោះ 10 ព័ត្នមាន</p>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-6 mb-3">
                                    <div class="card bg-info">
                                        <h3 class="card-title text-center">កម្សាន្ត</h3>
                                        <p class="text-center">ចំនួនបង្ហោះ 10 ព័ត្នមាន</p>
                                    </div>
                                </div>
                                

                            </div>

                            <div class="row m-0 p-0 mt-5">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h3>User Page</h3>
                                    <button data-bs-toggle="modal" data-bs-target="#modal_add_users" class=" btn btn-primary rounded-0 shadow-none">add user</button>
                                </div>
                                <table class=" table table-striped table-bordered table-light">
                                    <thead>
                                        <tr class=" text-danger">
                                            <th>ID</th>
                                            <th>USERNAME</th>
                                            <th>EMAIL</th>
                                            <th>ROLE</th>
                                            <th class=" text-center">ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody id="show_users">
                                      
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php include "components/footer.php" ?>


<?php } else {
    header('Location: login.php');
} ?>