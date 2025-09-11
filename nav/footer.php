<div class="footer">
  <div class="container">
    <hr class="featurette-divider" />
    <div class="row1">
      <div class="col-lg-6 col-md-6">
        <div class="footer-contact nobr">
          <h2>Get In Touch</h2>

          <p><i class="fa fa-map-marker-alt"></i>Paterno St. Tacloban CIty</p>
          <p><i class="fa fa-phone-alt"></i>+9123456789</p>
          <p><i class="fa fa-envelope"></i>123@123.com</p>

          <div class="footer-social">
            <a class="btn" href=""><i class="fab fa-twitter"></i></a>
            <a class="btn" href=""><i class="fab fa-facebook-f"></i></a>
            <a class="btn" href=""><i class="fab fa-youtube"></i></a>
            <a class="btn" href=""><i class="fab fa-instagram"></i></a>
            <a class="btn" href=""><i class="fab fa-linkedin-in"></i></a>
          </div>
        </div>
      </div>
      <div class="col-lg-5 col-md-6 nobr">
        <div class="footer-link">
          <h2>Popular Links</h2>
          <a class="nav-link active" href="index.php">Home</a>
          <a class="link-underline-primary link-opacity-100-hover" href="About.php">About Us</a>
          <a class="link-underline-primary link-opacity-50-hover" href="Contact.php">Contact Us</a>
          <a class="nav-link " href="#services">Service</a>
          <a class="nav-link" href="../views/login.php">Admin only</a>
        </div>
      </div>
    </div>
  </div>
</div>
</main>
<!-- Modal for registe-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">🌟 Register New User</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="../page/Homepage.php?function=Register" method="POST" enctype="multipart/form-data" class="p-4 rounded shadow-lg bg-light">
          <div class="mb-3">
            <label for="username" class="form-label">Username 🧑‍💻</label>
            <input type="text" class="form-control" id="username" name="username" required>
          </div>

          <div class="mb-3">
            <label for="Password" class="form-label">Password 🧑‍💻</label>
            <input type="password" class="form-control" id="Password" name="password" required>
          </div>

          <div class="mb-3">
            <label for="profile_pic" class="form-label">Profile Picture 🖼️</label>
            <input type="file" class="form-control" id="profile_pic" name="profile_pic">
          </div>

          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="first_name" class="form-label">First Name</label>
              <input type="text" class="form-control" id="first_name" name="first_name" required>
            </div>
            <div class="col-md-6 mb-3">
              <label for="last_name" class="form-label">Last Name</label>
              <input type="text" class="form-control" id="last_name" name="last_name" required>
            </div>
          </div>

          <div class="mb-3">
            <label for="nickname" class="form-label">Nickname 🎭</label>
            <input type="text" class="form-control" id="nickname" name="nickname">
          </div>

          <div class="mb-3">
            <label class="form-label">Gender ⚧️</label>
            <select class="form-select" name="gender">
              <option value="">Select</option>
              <option value="Male">Male</option>
              <option value="Female">Female</option>
              <option value="Other">Other</option>
            </select>
          </div>

          <div class="mb-3">
            <label for="phone" class="form-label">Phone 📱</label>
            <input type="text" class="form-control" id="phone" name="phone">
          </div>

          <div class="mb-3">
            <label for="email" class="form-label">Email 📧</label>
            <input type="email" class="form-control" id="email" name="email">
          </div>

          <div class="mb-3">
            <label class="form-label">Preferred Contact Method</label>
            <select class="form-select" name="preferred_contact">
              <option value="">Choose</option>
              <option value="Phone">Phone</option>
              <option value="Email">Email</option>
              <option value="SMS">SMS</option>
            </select>
          </div>

          <div class="mb-3">
            <label for="address" class="form-label">Address 🏠</label>
            <textarea class="form-control" id="address" name="address" rows="2"></textarea>
          </div>

          <div class="row">
            <div class="col-md-4 mb-3">
              <label for="city" class="form-label">City</label>
              <input type="text" class="form-control" id="city" name="city">
            </div>
            <div class="col-md-4 mb-3">
              <label for="state" class="form-label">State</label>
              <input type="text" class="form-control" id="state" name="state">
            </div>
            <div class="col-md-4 mb-3">
              <label for="zip_code" class="form-label">Zip Code</label>
              <input type="text" class="form-control" id="zip_code" name="zip_code">
            </div>
          </div>

          <button type="submit" class="btn btn-primary w-100 glow-on-hover">🚀 Register</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!--end of modal for register-->

<!--modal for login-->
<div class="modal fade" id="loginmodal" tabindex="-1" aria-labelledby="LoginModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="LoginModalLabel">Login</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="../page/Homepage.php?function=login" method="POST" enctype="multipart/form-data" class="p-4 rounded shadow-lg bg-light">
          <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" required>
          </div>

          <div class="mb-3">
            <label for="Password" class="form-label">Password</label>
            <input type="password" class="form-control" id="Password" name="password" required>
          </div>
          <button type="submit" class="btn btn-primary w-100 glow-on-hover">Login</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!--end of modal for login-->


<div class="modal fade" id="myModal" role="dialog" style="display: none;" aria-hidden="true">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Car Wash Booking</h4>
      </div>
      <div class="modal-body">
        <form method="post">
          <p>
            <select name="packagetype" required="" class="form-control">
              <option value="">Package Type</option>
              <option value="1">BASIC CLEANING ($10.99)</option>
              <option value="2">PREMIUM CLEANING ($20.99)</option>
              <option value="3 ">COMPLEX CLEANING($30.99)</option>
            </select>

          </p>
          <p>
            <select name="washingpoint" required="" class="form-control">
              <option value="">Select Washing Point</option>

              <option value="1">Cielo Car Washing Point (ABC Street New Delhi 1110001)</option>

              <option value="2">ABC Car Washing Point (A3263 Sector 1- Noida 201301)</option>

              <option value="3"> Matrix Car washing Point (H911 Indira Puram Ghaziabad 201017 UP)</option>

              <option value="6">Pawing Car Wash Center (Pawing, Palo, Leyte)</option>

              <option value="7">Poto's War Wash (Pater St. Tacloban CIty)</option>

              <option value="9">Jake Car Wash0 (Government Center, Palo Leyte, Sample)</option>
            </select>
          </p>
          <p><input type="text" name="fname" class="form-control" required="" placeholder="Full Name"></p>
          <p><input type="text" name="contactno" class="form-control" pattern="[0-9]{10}" title="10 numeric characters only" required="" placeholder="Mobile No."></p>
          <p>Wash Date <br><input type="date" name="washdate" required="" class="form-control"></p>
          <p>Wash Time <br><input type="time" name="washtime" required="" class="form-control"></p>
          <p><textarea name="message" class="form-control" placeholder="Message if any"></textarea></p>
          <p><input type="submit" class="btn btn-custom" name="book" value="Book Now"></p>
        </form>
      </div>
    </div>

  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
  AOS.init();
</script>

<script
  src="../assets/dist/js/bootstrap.bundle.min.js"
  class="astro-vvvwv3sm"></script>

<script>
  function underConstruction() {
    alert('Feature is underconstruction.');
  }
</script>
</body>

</html>