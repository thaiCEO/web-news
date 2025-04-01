<?php include "components/header.php"; ?>
<?php 
    $query = isset($_GET['query']) ? trim(mysqli_real_escape_string($conn, $_GET['query'])) : '';

    // Fetch matching news
    $sql = "SELECT * FROM content WHERE title LIKE '%$query%' OR description LIKE '%$query%'";
    $data = mysqli_query($conn, $sql);

  //    echo var_dump($data);
?>
<main class="sport">
    <section class="trending">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="content-trending">
                        <div class="content-left">
                            RESULT SEARCH
                        </div>   
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container">
            <div class="row">
                <?php 
                    while($row = mysqli_fetch_assoc($data)) {
                        // Fetch data from the database
                        $title = $row['title'];
                        $date = $row['date'];
                        $description = $row['description'];
                        $image = $row['image'];
                        $content_id = $row['id']; 
                        
                        echo '
                        <div class="col-4">
                            <figure>
                                <a href="news-detail.php?content_id='.$content_id.'">
                                    <div class="thumbnail">
                                        <img  class="img-fluid"  src="http://localhost:8080/web-news/back-end/folder_upload_image/upload_new/'.$image.'" alt="News Image">
                                    </div>
                                    <div class="detail">
                                        <h3 class="title">'.$title.'</h3>
                                        <div class="date">'.$date.'</div>
                                        <div class="description">'.$description.'</div>
                                    </div>
                                </a>
                            </figure>
                        </div>
                        ';
                    }
                ?>
            </div>
        </div>
    </section>
</main>
<?php include "components/footer.php"; ?>
