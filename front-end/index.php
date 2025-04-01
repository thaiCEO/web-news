<?php include "components/header.php"; ?>

<main class="home">
    <section class="trending">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="content-trending">
                        <div class="content-left">
                            TRENDING NOW
                        </div>   
                        <div class="content-right">
                            <marquee behavior="" direction="left">
                                <div class="text-news">
                                <?php
                                    $latestNews = getLatestNews(); // Fetch the latest news from the database
                                    foreach ($latestNews as $news) {
                                        echo '<i class="fas fa-angle-double-right"></i> <a href="news-detail.php?content_id=' . $news['id'] . '">' . $news['title'] . '</a> &ensp;';
                                    }
                                    ?>
                                </div>
                            </marquee>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<!--tending news start-->
<?php $trendingNews = trendingNews(1); ?>
 <?php foreach ($trendingNews as $item) { ?>
    <section class="latest-news">
        <div class="container">
            <div class="row">
                <div class="col-8 content-left">
                    <figure>
                        <a href="news-detail.php?content_id=<?php echo $item['id']?>">
                            <div class="thumbnail">
                                <img class="img-fluid" src="http://localhost:8080/web-news/back-end/folder_upload_image/upload_new/<?php echo $item['image'] ?>" alt="">
                                <div class="title">
                                    <?php echo $item['title'] ?>
                                </div>
                            </div>
                        </a>
                    </figure>
                </div>
                <div class="col-4 content-right">
                    <div class="col-12">
                    
                    <?php 
                        $trendingNewsleft = trendingNews(3);
                        $startIndex = 2; // Define starting index
                        foreach ($trendingNewsleft as $index => $newsleft) {
                            if ($index + 1 < $startIndex) {
                                continue; // Skip until reaching the starting index
                            }
                            // print_r($newsleft);
                            // exit;
                     ?>
                        <figure>
                            <a href="news-detail.php?content_id=<?php echo $newsleft['id']?>">
                                <div class="thumbnail">
                                    <img class="img-fluid" src="http://localhost:8080/web-news/back-end/folder_upload_image/upload_new/<?php echo $newsleft['image'] ?>" alt="">
                                <div class="title">
                                    <?php echo $newsleft['title'] ?>
                                </div>
                                </div>
                            </a>
                        </figure>
             <?php } ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
 <?php }?>
<!--trending news end-->

<!-- Custom Banner start -->
    <div class="box-banner">
           <div class="box-sponsors">
                    <h2 class="text-white text-center"></h2>
                     <img src="https://www.khmerbeverages.com/wp-content/uploads/2021/02/Banner-300cm-x-120cmH-FN-01-scaled.jpg" alt="Sponsor Logo"> 
           </div>
        </div>
    </div>

<!-- Custom Banner end -->

<?php 
   $category = getTable('category');
?>

<?php foreach($category as $item) { ?>
    <section class="trending">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="content-trending">
                        <div class="content-left">
                           <?php echo $item['category_name'] ?>
                        </div>   
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Image News -->
    <section class="news">
        <div class="container">
            <div class="row">

                <?php
                  $category_id = $item['category_id'];
                  $contents = getContent('content' , $category_id);
                 ?>

                <?php foreach($contents as  $content) { ?>

                <div class="col-4">
                    <figure>
                        <a href="news-detail.php?content_id=<?php echo $content['id'] ?>">
                            <div class="thumbnail">
                                <img style="width: 100%;height: 255px;​" class="img-fluid" src="http://localhost:8080/web-news/back-end/folder_upload_image/upload_new/<?php echo $content['image'] ?>" alt="">
                            <div class="title">
                                <?php echo $content['title']; ?>
                            </div>
                            </div>
                        </a>
                     </figure>
                 </div>

                <?php } ?>

            </div>
        </div>
    </section>

<?php } ?>

  

</main>
<?php include "components/footer.php"; ?>