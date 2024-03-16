<?php
include "shared/head.php";
include "shared/header.php";

?>

<body>
  <!-- start about  -->
  <div class="about pt-5 pb-5">
    <div class="container">
      <div class="row d-flex justify-content-center align-items-center">
        <div class="col-lg-6 col-md-6">
          <div class="about-img">
            <img src="./assest/img/about-img.png" alt="">
          </div>
        </div>
        <div class="col-lg-6 col-md-6">
          <div class="details">
            <h1 class="text-capitalize fw-bold">We Are Tasty</h1>
            <p class="pt-3 pb-3 text-white">
              We only use natural Canadian cheeses and we have a few dozen toppings to choose from. Our fries are fresh
              cut and mainly sourced by Ontario farmers. We are also environmentally conscious and use eco-friendly
              boxes and liners that are recycled through a privately sourced collection company </p>
            <div class="box-btn main-button">
              <a  href="menu.php" type="button" class="btn btn-primary btn-lg bg-warning rounded-pill">
                Order Now
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- end about -->
  <?php
  include "shared/footer.php";
  ?>
</body>