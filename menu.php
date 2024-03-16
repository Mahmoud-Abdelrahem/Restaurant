<?php
include "shared/env.php";
include "shared/head.php";
include "shared/header.php";

$select = "SELECT * FROM `categories` ";
$s = mysqli_query($conn, $select);

$select2 = "SELECT * FROM  `meals`";
$s2 = mysqli_query($conn, $select2);

// Fetch meals based on selected category
if (isset($_GET['find'])) {
  if ($_GET['find'] == 1) {
    $select2 = "SELECT * FROM  `meals`";
    $s2 = mysqli_query($conn, $select2);
  } else {
    $id = $_GET['find'];
    $select2 = "SELECT * FROM  `meals` where cat_id = $id";
    $s2 = mysqli_query($conn, $select2);
  }
}

if(isset($_POST['insert'])){
  $username=$_POST['order_username'];
  $address=$_POST['order_username_address'];
  $phone=$_POST['order_username_phone'];
  $meal_id=$_POST['meal_id'];

  $insert="INSERT INTO `order`(`id`, `order_username`, `order_username_address`, `order_username_phone`, `meal_id`) VALUES (null,'$username','$address',$phone,$meal_id)";
  $i=mysqli_query($conn,$insert);
}

?>

<body>
  <!-- start our menu -->
  <div class="menu pt-5 pb-5">
    <div class="container" id="menu">
      <div class="our-menu d-flex flex-column justify-content-center align-items-center pb-5">
        <h2 class="pb-4 fs-1 fw-bold text-dark">Our Menu</h2>
        <div class="menu-links" id="menu">
          <ul class="nav nav-pills">
            <?php foreach ($s as $data): ?>
              <li class="nav-item mx-1">
                <a class="nav-link text-black" href="menu.php?find=<?= $data['id'] ?>#menu">
                  <?= $data['name'] ?>
                </a>
              </li>
            <?php endforeach ?>
          </ul>
        </div>
      </div>

      <div class="row">
        <?php foreach ($s2 as $data): ?>
          <div class="col-lg-4 col-md-4 mb-4">
            <div class="card bg-dark border-0">
              <div class="card-img">
                <img src="<?php echo $data['image'] ?>" alt="..." />
              </div>
              <div class="card-body p-4">
                <h5 class="card-title text-white">
                  <?php echo $data['name'] ?>
                </h5>
                <p class="text-white">
                  <?php echo $data['description'] ?>
                </p>
                <div class="sal d-flex justify-content-between align-items-center">
                  <span class="text-white">
                    <?php echo $data['price'] ?> L.E
                  </span>
                  <div class="card-icon p-2 bg-warning rounded-circle">
                    <!-- Modified: Added data attributes for meal information -->
                    <a href="#" class="order-btn" data-meal-id="<?php echo $data['id']; ?>"
                      data-meal-name="<?php echo $data['name']; ?>" data-meal-price="<?php echo $data['price']; ?>">
                      <i class="fa-solid fa-cart-shopping text-white"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach ?>
      </div>
    </div>
  </div>
  <!-- end our menu -->

  <!-- Modal for order form -->
  <div id="orderModal" class="modal" style="display:none;">
    <div class="modal-content">
      <span class="close">&times;</span>
      <h3 class="h3form">Make Your Order</h3>
      <form id="order-form"  method="POST">

      <input type="hidden" name="meal_des" id="meal_des" value="">
        <label for="meal"> Num of Meal</label>
        <input type="text" name="meal" id="meal" readonly>

        <input type="hidden" name="meal_id" id="meal_id" value="">
        <label for="selected_meal"> Selected Meal</label>
        <input type="text" name="selected_meal" id="selected_meal" readonly>
        <label for="order_username">Your Name</label>
        <input type="text" name="order_username" id="order_username" required>
        <label for="order_username_address">Your Address</label>
        <input type="text" name="order_username_address" id="order_username_address" required>
        <label for="order_username_phone">Your Phone </label>
        <input type="tel" name="order_username_phone" id="order_username_phone" required>
        <button type="submit" name="insert">Make Order</button>
      </form>
    </div>
  </div>

  <?php
  include "shared/script.php";
  include "shared/footer.php";
  ?>
</body>
