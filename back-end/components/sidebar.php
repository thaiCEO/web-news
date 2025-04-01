
<div class="sidebar">
    <div class="sidebar-header d-flex justify-content-center">
    <!--  echo (isset($_SESSION['role']) && $_SESSION['role'] == 1) ? $_SESSION['image'] : ''; ?> -->
    <img style="width: 70px; height: 70px; border-radius: 50%;" src="./folder_upload_image/upload_Profile/3160.jpg" alt="Logo" class="logo">
    </div>

  <h6 class="text-center"><?php echo (isset($_SESSION['role']) == 1 ) ? "Admin" : ""; ?> <?php echo (isset($_SESSION['username'])) ? $_SESSION['username'] : ""; ?></h6>
  
    <nav class="sidebar-menu">
        <ul>
            <li class="menu-item active">
                <a href="index.php">
                    <i class="bi bi-house-door"></i> Dashboard 
                </a>
            </li>
          
            <li class="menu-item">
                <a href="news.php">
                    <i class="bi bi-newspaper"></i> News 
                </a>
            </li>
            <li class="menu-item">
                <a href="categories.php">
                    <i class="bi bi-app"></i> Category 
                </a>
            </li>
            <li class="menu-item">
                <a href="contact.php">
                    <i class="bi bi-person"></i> Contact 
                </a>
            </li>
            <li class="menu-item">
                <a href="view-feedback.php">
                    <i class="bi bi-chat-left-dots"></i> Feedback 
                </a>
            </li>
            <li class="menu-item">
                <a href="feedback.php">
                    <i class="bi bi-file-earmark"></i> Pages 
                </a>
            </li>
            <li class="menu-item">
                <a href="setting.php">
                    <i class="bi bi-gear"></i> Settings 
                </a>
            </li>
            <li class="menu-item ">
                <a href="logout.php" class="text-danger">
                    <i class="bi bi-box-arrow-right"></i> Logout 
                </a>
            </li>
        </ul>
    </nav>
</div>
