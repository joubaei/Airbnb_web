<!DOCTYPE html>
<html lang="en">
<?php
include "config.php";
if(isset($_POST['submit'])){
  $search_item = $_POST['search'];
  $select_products = mysqli_query($con, "SELECT * FROM `airbnbs` WHERE type LIKE '%$search_item%'") or die('query failed');
}
if(mysqli_num_rows($select_products) > 0){
  header("Location: search_results.php?search_item=" . urlencode($search_item));
  exit(); // Make sure to stop executing the current script after redirection
}
?>
<head>
  <link rel="stylesheet" href="airbnb.css">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    integrity="sha512-LhV8HA0m7lx/5SMqubwSHmEVRJn7n1wbL4/4mZsEZ5tfSy7cHmRoTGzshpXaMZurA2ihAhpSOOUEJnFzCXj87Q=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>airbnb official site</title>
</head>

<body>
  <header>
    <nav>
      <ul class="nav-bar">
        <li class="logo"><img src="images/Light Orange Beach Club Recreation Logo.png" alt="logo"></li>
        <section class="search-form">
        <form action="" method="post">
        <input type="text" name="search" placeholder="Search for a place" class="box">
        <input type="submit" name="submit" value="Search" class="btn">
        </form>
        </section>
      </ul>
    </nav>
  </header>

  <div class="icon-container">
    <div class="icon">
      <a href="beach.php">
        <i class="fa-solid fa-umbrella-beach"></i>
        <p>beach</p>
      </a>
    </div>
    <div class="icon">
      <a href="forest.php">
        <i class="fa-solid fa-tree"></i>
        <p>forest</p>
      </a>
    </div>
    <div class="icon">
      <a href="mountain.php">
        <i class="fa-solid fa-mountain"></i>
        <p>mountain</p>
      </a>
    </div>
    <div class="icon">
      <a href="city.php">
        <i class="fa-solid fa-city"></i>
        <p>city</p>
      </a>
    </div>
  </div><hr>

  <div class="aboutus-title">
    <h4>OUR STORY</h4>
    <h1>About Us</h1>
    <div class="aboutus">
      <img src="images/about1.1.jpg" class="about-img">
      <div class="about-text">
        <h2><b>book with us </b></h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt velit aspernatur ipsam debitis soluta eius
          aut temporibus sit commodi quos Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nisi modi libero
          neque tempore at?</p>
      </div>
    </div>
    <div class="aboutus">
      <div class="about-text">
        <h2><b>How It All Started </b></h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt velit aspernatur ipsam debitis soluta eius
          aut temporibus sit commodi quos Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nisi modi libero
          neque tempore at?</p>
      </div>
      <img src="images/about2.jpg" class="about-img">
    </div>
  </div>

  <?php
    $sql = "SELECT * FROM testimonial WHERE id BETWEEN 1 AND 4"; // Retrieve testimonials with IDs from 1 to 4
    $result = mysqli_query($con, $sql);

    echo '<div class="testimonial-slider">';
    echo '<div class="slides-container">';

    while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="testimonial-card">';
        echo '<div class="testimonial-content">';
        echo '<div class="testimonial-img">';
        echo '<img src="'.$row['path'].'" alt="image">';
        echo '</div>';
        echo '<p>"' . $row['comment'] . '"</p>';
        echo '<h3>' . $row['name'] . '</h3>';
        echo '<p class="designation">' . $row['job'] . '</p>';
        echo '</div>';
        echo '</div>';
    }

    echo '</div>';
    echo '</div>';

    $con->close();
?>

  <footer>
    <div class="social-media-icons">
      <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
      <a href="#"><i class="fa-brands fa-twitter"></i></a>
      <a href="#"><i class="fa-brands fa-instagram"></i></a>
    </div><br>
    <div class="copyright">
      <p><b>Support</b></p>
      <a href="#">
        <p>Help Center</p>
      </a>
      <!-- Other footer links -->
      <hr>
      <p><b>English (US) $ USD</b></p>
      <p>© 2023 Airbnb By Joubaei.<br> All rights reserved.</p>
    </div>
  </footer>
</body>
</html>
