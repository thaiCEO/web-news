<?php 
    include('components/header.php');
    include('message/contact/create.php');
    include('message/contact/edit.php');
?>
                <div class="col-10">
                    <div class="content-right">
                        <div class="top">
                            <h3 class="text-center">All Contanct</h3>
                        </div>
                        <div class="bottom view-post">

                            <div class="row m-0 p-0 mt-5">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h3>Contact list</h3>
                                    <button data-bs-toggle="modal" data-bs-target="#modal_add_contact" class=" btn btn-primary rounded-0 shadow-none">new contanct</button>
                                </div>
                                <table class=" table table-striped table-bordered table-light">
                                    <thead>
                                        <tr class=" text-danger">
                                            <th>ID</th>
                                            <th>LOGO</th>
                                            <th>NAME</th>
                                            <th>CONTACT</th>
                                            <th>STATUS</th>
                                            <th class=" text-center">ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1001</td>
                                            <td>facebook.jpg</td>
                                            <td>phument</td>
                                            <td>phument@gmail.com</td>
                                            <td>admin</td>
                                            <td class=" text-center">
                                                <button data-bs-toggle="modal" data-bs-target="#modal_edit_contact" class=" btn btn-info btn-sm rounded-0">edit</button>
                                                <button class=" btn btn-danger btn-sm rounded-0">Delete</button>
                                            </td>
                                            
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php include "components/footer.php" ?>