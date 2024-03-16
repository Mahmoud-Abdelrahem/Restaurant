<?php
include "shared/env.php";
include "shared/head.php";
include "shared/header.php";



if (isset($_POST['send'])) {
  $username = $_POST['name'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $number_person = $_POST['num_person'];
  $date = $_POST['date'];

  $insert = "INSERT INTO `tabel_res`(`id`, `your_name`, `phone`, `email`, `num_person`,`date`) VALUES (null,'$username',$phone,'$email',$number_person,'$date')";
  $i = mysqli_query($conn, $insert);
}
?>

<body>
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
                <input type="text" class="form-control" name="name" placeholder="Your Name" aria-describedby="basic-addon1" required />
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
                <input type="date" name="date" class="form-control" placeholder="mm/dd/yyyy" />
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
  <?php
  include "shared/footer.php";
  ?>
</body>
