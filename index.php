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

if (isset($_POST['insert'])) {
  $username = $_POST['order_username'];
  $address = $_POST['order_username_address'];
  $phone = $_POST['order_username_phone'];
  $meal_id = $_POST['meal_id'];

  $insert = "INSERT INTO `order`(`id`, `order_username`, `order_username_address`, `order_username_phone`, `meal_id`) VALUES (null,'$username','$address',$phone,$meal_id)";
  $i = mysqli_query($conn, $insert);
}

if (isset($_POST['send'])) {
  $username = $_POST['name'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $number_person = $_POST['num_person'];
  $date = $_POST['date'];

  $insert = "INSERT INTO `tabel_res`(`id`, `your_name`, `phone`, `email`, `num_person`,`date`) VALUES (null,'$username',$phone,'$email',$number_person,default)";
  $i = mysqli_query($conn, $insert);
}
?>

<body>
  <!-- start main -->
  <div class="main">
    <div class="container">
      <div class="landing">
        <div class="container">
          <div class="row">
            <div class="col-lg-6">
              <div class="details">
                <h1 class="text-capitalize fw-bold">fast food resturant</h1>
                <p class="pt-3 pb-3">
                  Step into the world of culinary delight at Tasty Restaurant, where every dish tells a story of passion
                  and flavor. Located in the vibrant heart of the city, our restaurant is a haven for food enthusiasts
                  seeking a memorable dining experience.
                </p>
                <div class="box-btn main-button">
                  <a href="#menu" class="btn btn-primary btn-lg bg-warning rounded-pill">
                    Order Now
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- end main -->
  <!-- start offers -->
  <div class="offers pt-5 pb-5">
    <div class="container">
      <div class="row">
        <div class="col-md-6 mb-3">
          <div class="box d-flex align-items-center p-4">
            <div class="img-box">
              <img src="./assest/img/o1.jpg" alt="" />
            </div>
            <div class="detail-box ms-4">
              <h5>Tasty Thursdays</h5>
              <h6 class="pt-2 pb-2"><span>20%</span> Off</h6>
              <div class="box-btn main-button">
                <a href="#menu" type="button" class="btn btn-primary btn-lg bg-warning rounded-pill">
                  Order Now
                  <i class="fa-solid fa-cart-shopping"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 mb-3">
          <div class="box d-flex align-items-center p-4">
            <div class="img-box">
              <img src="./assest/img/o2.jpg" alt="" />
            </div>
            <div class="detail-box ms-4">
              <h5>Pizza Days</h5>
              <h6 class="pt-2 pb-2"><span>15%</span> Off</h6>
              <div class="box-btn main-button">
                <a href="#menu" type="button" class="btn btn-primary btn-lg bg-warning rounded-pill">
                  Order Now
                  <i class="fa-solid fa-cart-shopping"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- end offers -->

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
      <form id="order-form" method="POST">

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
  <!-- end our menu -->

  <!-- start about  -->
  <div class="about pt-5 pb-5">
    <div class="container">
      <div class="row d-flex justify-content-center align-items-center">
        <div class="col-lg-6 col-md-6">
          <div class="about-img">
            <img src="./assest/img/about-img.png" alt="" />
          </div>
        </div>
        <div class="col-lg-6 col-md-6">
          <div class="details">
            <h1 class="text-capitalize fw-bold">We Are Tasty</h1>
            <p class="pt-3 pb-3 text-white">
              Tasty Restaurant offers a culinary journey that tantalizes taste buds and creates unforgettable dining
              experiences. Nestled in the heart of the city, its warm ambiance invites patrons to indulge in a feast for
              the senses.
            </p>
            <div class="box-btn main-button">
              <a href="#menu" type="button" class="btn btn-primary btn-lg bg-warning rounded-pill">
                Order Now
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- end about -->

  <!-- start book -->
  <div class="book pt-5 pb-5">
    <div class="container">
      <div class="header-div mt-5 mb-4">
        <h1 class="text-dark fw-bold">Book A Table</h1>
      </div>
      <div class="row">
        <div class="col-lg-6 col-md-6 h-100">
          <div class="form-div h-100">
            <form action="" method="post">
              <div class="input-group mb-4">
                <input type="text" class="form-control" name="name" placeholder="Your Name" aria-describedby="basic-addon1" required/>
              </div>
              <div class="input-group mb-4">
                <input type="tel" class="form-control" name="phone" placeholder="Phone Number" aria-describedby="basic-addon1" required/>
              </div>
              <div class="input-group mb-4">
                <input type="email" class="form-control" name="email" placeholder="Your Email" aria-describedby="basic-addon1" required/>
              </div>
              <div class="input-group mb-4">
                <select name="num_person" class="form-select" id="inputGroupSelect01" required>
                  <option value selected disabled>How many persons</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                </select>
              </div>
              <div class="input-group mb-4">
                <input type="date" name="date" class="form-control" placeholder="mm/dd/yyyy" required/>
              </div>
              <div class="box-btn main-button mb-5">
                <button type="submit" name="send" class="btn btn-primary btn-lg bg-warning rounded-pill text-uppercase">
                  book now
                </button>
              </div>
            </form>
          </div>
        </div>
        <div class="col-lg-6 col-md-6">
          <div class="map-div">
            <iframe class="w-100 h-100"
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d462563.0326194868!2d54.89784037068582!3d25.075658421268994!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f43496ad9c645%3A0xbde66e5084295162!2sDubai%20-%20United%20Arab%20Emirates!5e0!3m2!1sen!2seg!4v1701344793227!5m2!1sen!2seg"
              width="600" height="450" style="border: 0" allowfullscreen="" loading="lazy"
              referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- end book -->
  <!-- start custoumer-review -->
  <div class="custoumer-review pt-5 pb-5">
    <div class="container">
      <div class="custoumer-review-title text-center pb-5">
        <h1 class="text-dark fw-bold">What Says Our Customers</h1>
      </div>
      <div class="row">
        <div class="col-lg-6">
          <div class="card mb-3 border-0 text-white">
            <div class="card-body rounded-3">
              <p class="card-text">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                Ut enim ad minim veniam
              </p>
              <h5>Mike Hamell</h5>
              <h6 class="card-subtitle mb-2">magna aliqua</h6>
            </div>
            <div class="custoumer-img mt-4">
              <img src="./assest/img/client2.jpg" alt="" />
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="card mb-3 border-0 text-white">
            <div class="card-body rounded-3">
              <p class="card-text">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                Ut enim ad minim veniam
              </p>
              <h5>Moana Michell</h5>
              <h6 class="card-subtitle mb-2">magna aliqua</h6>
            </div>
            <div class="custoumer-img mt-4">
              <img src="./assest/img/client1.jpg" alt="" />
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- end custoumer-review -->

  <?php
  include "shared/script.php";
  include "shared/footer.php";
  ?>
</body>