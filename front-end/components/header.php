<!DOCTYPE html>
<?php 
  $conn = mysqli_connect("localhost","root","","cms_news");
?>
<?php 
include('function.php');
 ?>
<html lang="en">
    <head>
        <title>CMS News</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <!-- @style -->
        <link rel="stylesheet" href="">
        <link rel="stylesheet" href="../front-end/assets/css/style.css">
        <link rel="stylesheet" href="../front-end/assets/css/sport.css">
        <link rel="stylesheet" href="../front-end/assets/css/news-detail.css">
        <link rel="stylesheet" href="../front-end/assets/css/contact.css">
        <link rel="stylesheet" href="../front-end/assets/css/search.css">
        <!-- @google font -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Kantumruy&display=swap" rel="stylesheet">
        <!-- @google font -->
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
        <!-- @slick slider -->
        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
        <!-- @funcy box -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css" />
          <!-- Bootstrap Icons CDN -->
       <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
 

        <style>
             body {
            background: white;
            color: black;
            transition: background 0.5s, color 0.5s;
        }

        body.dark-mode {
            background: black;
            color: white;
            border: none;
        }

        #toggleMode {
            border: none;
            background: transparent;
            font-size: 1.5rem;
            cursor: pointer;
            margin-right: 10px;
        }

        #toggleMode:hover {
            transform: scale(1.1);
            transition: transform 0.2s ease;
            border: none;
        }

                                        
                /* Banner for sponsors start */
                .box-banner {
                    max-width: 71%;
                    margin: 0 auto;
                    height: 300px;
                    background-color: black;
                    border-radius: 10px; /* Rounded corners */
                }
                .box-sponsors {
                    width: 100%;
                    height: 100%;
                    background-color: #343a40;
                    border-radius: 10px; /* Rounded corners */
                }
                .box-sponsors img {
                    width: 100%;
                    height: 100%;
                    object-fit:fill;
                    border-radius: 10px; /* Rounded corners */
                }
                /* Banner for sponsors end */


                /* style for header start */
        header {
            background: linear-gradient(90deg, rgb(10, 76, 147), rgb(4, 148, 237)); /* Gradient background */
            padding: 20px 0;
            font-family: Arial, sans-serif;
            color: #fff; /* White text */
        }

        header .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
        }

        header .logo h3 {
            margin: 0;
            font-size: 24px;
            color: rgb(214, 12, 12);
            font-weight: bold;
            text-transform: uppercase;
        }

        header .menu {
            list-style: none;
            display: flex;
            gap: 20px;
            margin: 0;
            padding: 0;
        }

        header .menu li {
            position: relative;
        }

        header .menu li a {
            text-decoration: none;
            color: #fff;
            font-size: 16px;
            padding: 5px 10px;
            transition: color 0.3s ease;
        }

        header .menu li a:hover {
            color: rgb(18, 182, 200); /* Dark text on hover */
        }

        header .menu li .sub-menu {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            background: #27306D; /* Dropdown background */
            padding: 10px 0;
            list-style: none;
            border-radius: 5px;
        }

        header .menu li:hover .sub-menu {
            display: block;
        }

        header .menu li .sub-menu li {
            padding: 5px 20px;
        }

        header .menu li .sub-menu li a {
            color: #fff;
            font-size: 14px;
            text-decoration: none;
            display: block;
            transition: background 0.3s ease;
        }

        header .menu li .sub-menu li a:hover {
            color: rgb(18, 182, 200); /* Dark text on hover */
        }

        header .search {
            display: flex;
            align-items: center;
        }

        header .search form {
            display: flex;
            gap: 10px;
        }

        header .search input.box {
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            outline: none;
            font-size: 14px;
        }

        header .search button {
            background: rgb(7, 201, 255);
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            color: #27306D;
            cursor: pointer;
            font-size: 14px;
            transition: background 0.3s ease;
        }

        header .search button:hover {
            background: linear-gradient(90deg, rgb(10, 76, 147), rgb(4, 148, 237));
        }

        .icon {
            width: 40px;
            height: 40px;
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        .icon:hover {
            transform: scale(1.1);
        }
        </style>
    </head>
<body>
<header>
        <div class="container">
            <div class="logo">
                <a href="index.php">
                    <h3>BMC NEWS</h3>
                </a>
            </div>
            <ul class="menu">
                <li><a href="index.php">ទំព័រដើម</a></li>
                <?php 
                   $category = getTable('category');

                   foreach($category as $item){
                     ?>
                        <li class="menu-sport"><a href="javascript:void(0)"><?php echo $item['category_name'];?></a>
                            <ul class="sub-menu sport">
                                <li>
                                    <a href="">ជាតិ</a>
                                </li>
                                <li>
                                    <a href="">អន្តរជាតិ</a>
                                </li>
                                </ul>
                        </li>
                     <?php
                   }
                 ?>
                <li><a href="contact.php">ទំនាក់ទំនង</a></li>
            </ul>
            <div class="search">
                <form action="search.php" method="get">
                    <?php
                        $query = '';
                        if(isset($_GET['query'])) {
                            $query = $_GET['query'];
                        }
                    ?>
                    <input type="text" class="box" placeholder="វាយស្វែងរកព័ត៌មាន...."  name="query" value="<?= $query ?>">
                    <button><i class="fas fa-search"></i></button>
                </form>
            </div>
        </div>
            <button id="toggleMode" class="rounded-0">
                <i id="modeIcon" class="bi bi-brightness-high"></i>
            </button>
    </header>