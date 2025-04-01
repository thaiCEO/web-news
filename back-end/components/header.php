

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!-- @theme style -->
    <!-- <link rel="stylesheet" href=""> -->
    <link rel="stylesheet" href="../back-end/assets/style/theme.css">

    <!-- @Bootstrap -->
    <link rel="stylesheet" href="../back-end/assets/style/bootstrap.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Battambang:wght@100;300;400;700;900&display=swap" rel="stylesheet">

    <!-- link alert  -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

    <style>
        

.sidebar {
    width: 250px;
    background-color: #f8f9fa;
    height: 100vh;
    padding: 20px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.sidebar-header {
    display: flex;
    align-items: center;
    margin-bottom: 30px;
}

.sidebar-header .logo {
    width: 40px;
    margin-right: 10px;
}

.sidebar-header h5 {
    font-size: 18px;
    color: #333;
    margin: 0;
}

.sidebar-menu {
    list-style: none;
    padding: 0;
    margin: 0;
}

.sidebar-menu .menu-item {
    margin: 10px 0;
}

.sidebar-menu .menu-item a {
    display: flex;
    align-items: center;
    text-decoration: none;
    color: #495057;
    padding: 10px;
    border-radius: 5px;
    transition: all 0.3s ease;
}

.sidebar-menu .menu-item a:hover,
.sidebar-menu .menu-item.active a {
    background-color: #e9f2ff;
    color: #007bff;
}

.sidebar-menu .menu-item i {
    margin-right: 10px;
    font-size: 16px;
}

.sidebar-menu .menu-header {
    font-size: 12px;
    color: #6c757d;
    margin: 15px 0 5px;
    text-transform: uppercase;
}

.bg-danger a {
    background-color: #f8d7da;
    color: #dc3545;
}

.bg-danger a:hover {
    background-color: #f5c6cb;
}
.sidebar-menu ul li {
    list-style: none;
    padding: 0;
    margin: 0;
}


    </style>
    
    

    <!-- @tinyACE -->
    <script src="https://cdn.tiny.cloud/1/5gqcgv8u6c8ejg1eg27ziagpv8d8uricc4gc9rhkbasi2nc4/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
</head>
<body>
    <main class="admin">
        <div class="container-fluid">
            <div class="row m-0">
                <div class="col-2">
                   
                    <!--siderbar-->
                      <?php include "sidebar.php" ?>
                     <!--siderbar-->                   
                  
                </div>