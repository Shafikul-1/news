<?php
include "config.php";
include "header.php";
?>
<h2 class="newsHeeding">News Pepper Website</h2>
<nav class="navbar navbar-expand-lg bg-body-tertiary navbarManuel">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?php echo $mainUrl ?>">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href=" <?php echo $mainUrl ?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href=" <?php echo $mainUrl.'admin/post.php' ?>">All Post</a>
        </li>
        <?php if ($_SESSION['role'] == '1') { ?>
          <li class=" nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Admin
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="<?php echo $mainUrl ?>admin/users.php">Users</a></li>
              <li><a class="dropdown-item" href="#">Post List</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
        <?php  } ?>
        <li class="nav-item">
          <?php
          if ($_SESSION['role'] == '1') {
            echo "<a href='{$mainUrl}admin/admin.php' class='nav-link'>Admin</a>";
          } else if ($_SESSION['role'] == '2') {
            echo "<a href='{$mainUrl}admin/editor.php' class='nav-link'>Editor</a>";
          } else if ($_SESSION['role'] == '3') {
            echo "<a href='{$mainUrl}admin/commentor.php' class='nav-link'>Commentor</a>";
          } else if ($_SESSION['role'] == '4') {
            echo "<a href='{$mainUrl}admin/viewer.php' class='nav-link'>Viewer</a>";
          }
          ?>
        </li>
      </ul>
      <div class="d-flex">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">

            <?php
            if ($_SESSION['username']) {
              echo "<a href='{$mainUrl}admin/log-out.php' type='button' class='btn btn-outline-danger btn-sm'>Log Out</a>";
            } else {
              echo "<a href='{$mainUrl}admin/add-user.php' type='button' class='btn btn-outline-success btn-sm mx-2'>Login / Signup</a>";
            }
            ?>

          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>