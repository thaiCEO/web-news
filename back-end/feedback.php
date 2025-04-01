<?php
include('components/header.php');
include_once "message/news/create.php";
include_once "message/news/edit.php";
include_once "message/news/delete.php";
?>
<div class="col-10">
    <div class="content-right">
        <div class="top">
            <h3 class="text-center">All Feedback</h3>
        </div>
        <div class="bottom view-post">
            <div class="row m-0 p-0">
                <div class="col-lg-12">
                    <table class=" table table-striped table-bordered table-light">
                        <thead>
                            <tr class=" text-danger">
                                <th>Id</th>
                                <th>username</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Date</th>
                                <th class=" text-center">VIEW</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class=" align-middle">
                                <td>1001</td>
                                <td>Bongka</td>
                                <td>bongka@gmail.com</td>
                                <td>0978759989</td>
                                <td>12/07/2024</td>
                                <td class=" text-center">
                                    <a href="view-feedback.php"><i class="bi bi-eye text-primary"></i></a>
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
</div>
<?php include "components/footer.php" ?>