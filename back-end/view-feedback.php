<?php
include('components/header.php');
include_once "message/news/create.php";
include_once "message/news/edit.php";
include_once "message/news/delete.php";
?>
<div class="col-10">
    <div class="content-right">
        <div class="top">
            <h3 class="text-center">Show feedback</h3>  
        </div>
        <div class="bottom view-post">
            <div class="row m-0 p-0 mt-3">
                <a class=" mb-3" href="feedback.php">back>></a>
                <div class="col-lg-6 col-md-12 shadow p-5">
                    <h4 class=" text-success">Show Feedback</h4>
                    <div class="detail-feedback">
                        <p>id: 1001</p>
                        <p>username: Solika</p>
                        <p>email: 123@gmail.com</p>
                        <p>phone : 08759989</p>
                        <p>content: Good job on the new design</p>
                    </div> 
                </div>
                <div class="col-lg-6 col-md-12 shadow p-5">
                    
                    <h4 class=" text-success">Reply Feedback</h4>
                    <form>
                        <div class="form-group">
                            <label for="replyContent">Reply Content:</label>
                            <textarea name="reply" class="form-control w-100" style="height: 100px;" cols="10" ></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">send to email</button>
                    </form>
    
                </div>
            </div>

        </div>
    </div>
</div>
</div>
</div>
<?php include "components/footer.php" ?>