<?php
include('components/header.php');
?>
<div class="col-10">
    <div class="content-right">
        <div class="top">
            <h3 class="text-center">My Setting</h3>
        </div>
        <div class="bottom view-post">
            <div class="row m-0 p-0 mt-2">
                <div class="col-lg-6 mt-4">
                    <h4>Profile Detail</h4>
                    <hr>
                    <div class="profiles row mt-2">
                        <div class="col-lg-6 d-flex justify-content-center align-items-center">
                            <div id="my-profile">
                               
                            </div>
                        </div>
                        <div class="col-lg-6 profile-detail p-3 profile-detail">
                            <!-- profile-detail -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 shadow p-4">
                    <h4 class="header-tilte">Update Profile</h4>
                    <form method="POST" id="formUpdateUser">
                        <div class="form-group">
                            <label for="">Username</label>
                            <input type="text" name="username" class="username form-control w-100">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" name="email" class="email form-control w-100">
                        </div>
                        <div class="form-group">
                            <label for="">Phone</label>
                            <input type="text" name="phone" class="phone form-control w-100">
                        </div>
                        <div class="form-group">
                            <label for="">Old Password</label>
                            <input type="text" name="old_password" class="old_password form-control w-100 ">
                            <p></p>
                        </div>
                        <div class="form-group">
                            <label for="">New Password</label>
                            <input type="text" name="new_password" class="new_password form-control w-100">
                        </div>
                        <div class="form-group">
                            <button type="reset" class=" btn btn-danger">Reset</button>
                            <button onclick="updateUser('#formUpdateUser')" type="button" class=" btn btn-success">Update</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="changeProfile" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Change Profile</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form  method="POST" enctype="multipart/form-data" id="form_profile">
                                <div class="form-group">
                                    <label for="">Your IMG (4x6)</label>
                                    <input type="file" name="profile" class="img form-control w-100">
                                    <button onclick="uploadProfile('#form_profile')" type="button" class=" btn btn-success rounded-0 btn_profile">upload</button>
                                </div>
                                <div class="profile-preview">
                                        
                                </div>
                            </form>
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button onclick="saveProfile('#form_profile')" type="button" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</div>
</div>
<?php include_once "components/footer.php" ?>