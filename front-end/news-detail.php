<?php include "components/header.php"; ?>
<?php 


$content_id = isset($_GET['content_id']) ? (int)$_GET['content_id'] : null;

 if(isset($content_id)) {
    $content_id = $_GET['content_id'];
 }		
    $row = getById('content' , $content_id);
    $content = mysqli_fetch_assoc($row);

   

 if(isset($content['category'])) {
    $category_id = $content['category'];

    $relatedContents = getRelatedContent($category_id, $content_id);

 }
 
?>



<main class="news-detail">
    <section>
        <div class="container">
            <div class="row">
                <div class="col-8">
                    <div class="main-news">
                        <div class="thumbnail">
                            <img src="http://localhost:8080/web-news/back-end/folder_upload_image/upload_new/<?php echo $content['image'] ?>">
                        </div>
                        <div class="detail">
                            <h3 class="title"><?php echo $content['title'] ?></h3>
                            <div class="date"><?php echo $content['date'] ?></div>
                            <div class="description">
                               <?php echo $content['description'] ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="relate-news">
                        <h3 class="main-title">ព័ត៌មាន</h3>
                    
                      <?php foreach($relatedContents as $relatedContent) { ?>
                        <figure>
                            <a href="news-detail.php?content_id=<?php echo $relatedContent['id'] ?>">
                                <div class="thumbnail">
                                    <img class="img-fluid" src="http://localhost:8080/web-news/back-end/folder_upload_image/upload_new/<?php echo $relatedContent['image'] ?>" alt="">
                                </div>
                                <div class="detail">
                                    <h3 class="title"><?php echo $relatedContent['title'] ?></h3>
                                    <div class="date"><?php echo $relatedContent['date'] ?></div>
                                    <div class="description">
                                         <?php echo $relatedContent['description'] ?>
                                    </div>
                                </div>
                            </a>
                        </figure>
                        <?php
                          } 
                          ?>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php include "components/footer.php"; ?>