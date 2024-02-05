<header>
  <link  href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="css/index.css" rel="stylesheet">
  <nav class="navbar navbar-expand-lg navbar-dark d-none d-lg-block" style="z-index: 2000;">
    <div class="container-fluid">
      <a class="navbar-brand nav-link" target="_blank">
        <strong>FUNDWINGS</strong>
      </a>
        <i class="fas fa-bars"></i>
       
      <div class="collapse navbar-collapse" id="navbarExample01">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item active">
            <a class="nav-link home" href="#start">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link"href="#vision&mission">Vision&mission</a>
          </li>
           <li class="nav-item ">
            <a class="nav-link"href="#aboutus">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#contactus">Contact US</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div id="intro" class="bg-image shadow-2-strong">
    <div class="mask" style="background-color: rgba(0, 0, 0, 0.8);">
      <div class="container d-flex align-items-center justify-content-center text-center h-100">
        <div class="text-white" data-mdb-theme="dark" id="start">
          <h4 class="mb-3"> <strong style="color:aqua;">Happiness</strong> <strong> Comes From</strong> </h4>
          <h5 class="mb-4">  <strong style="color:aqua;">your action.</strong></h5>
          <a href="donation.php" name="donate" class="btn btn-outline-light btn-lg m-2">Donate Now</a>
          <button class="btn btn-outline-light btn-lg m-2"  onclick="sign()"data-target="#signup" id="startcampain" >Start Your Own Campain</button>
           
        </div>
      </div>
    </div>
  </div>
</header>
<main class="mt-5">
  <div class="container">
    <!--Section: Content-->
    <section id="vision&mission">
      <div class="row">
        <div class="col-md-6 gx-5 mb-4">
          <div class="bg-image hover-overlay shadow-2-strong" data-mdb-ripple-init data-mdb-ripple-color="light">
            <img src="image/FundWings.png" class="img-fluid" />
            <a href="#!">
              <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
            </a>
          </div>
        </div>

        <div class="col-md-6 gx-5 mb-4">
          <h4><strong>vision</strong></h4>
          <p class="text-muted">
            Our vision is to be the most successful crowdfunding platform in the MENA region.
          </p>
          <p><strong>mission</strong></p>
          <p class="text-muted">
            Our business mainly focuses on raising funds for startups and SMEs, and collecting donations for whatever causes, humanitarian for example. Our objective is to create a safe environment where initiators can collect enough money through their campaigns to kick off their projects or smart ideas, and where backers can fund whichever project in which they see potential.
          </p>
        </div>
      </div>
    </section>
    <!--Section: Content-->
    <hr class="my-5" />
    <!--Section: Content-->
    <section class="text-center" id="aboutus">
      <h4 class="mb-5"><strong>About US</strong></h4>
      <p class="text-muted">
        FundWings, originated in Egypt, is based on the idea of how one can support a business in which he sees potential, or just simply likes. We serve both sides, businesses and charities, and backers/investors/donators. We operate and manage a safe environment for transactions between them to take place.
      </p>
    </section>
    <!--Section: Content-->
    <hr class="my-5" />
    <!-- The Modal -->
    <div class="modal signup" id="signup">
          <div class="modal-dialog">
          <div class="modal-content">
          <!-- Modal Header -->
          <div class="modal-header">
          <h4 class="modal-title">Sign UP</h4>
          </div>
          <!-- Modal body -->
          <div class="modal-body">
            <form class="form-group" method="post" action ="">
              <label for="username" class="label">username</label>
              <input type="text" id="username" name="username" class="form-control input" required>
              <br>
              <label for="username" class="label">email</label>
              <input type="email" name="email" id="email" class="form-control input" required>
              <br>
              <label for="password" class="label" >password</label>
              <input type="password" name="password" id="password" class="form-control input" required>
              <br>
              <label for=" confirm password" class="label" >confirm password</label>
              <input type="password" name="confirmpassword" id="confirm_password" class="form-control input" required>
              <br>
              <input type="submit" class="btn btn-primary" onclick="move()" name="submit" value="signup">
            </form>    
          </div>
          <?php require("C:/xampp/htdocs/try/control/control.php");?>
          <!-- Modal footer -->
          <div class="modal-footer">
          <button type="button" class="btn btn-danger" onclick="closesign()">Close</button>
          <button type="button" onclick="login_open()" class="btn btn-success">login</button>
          </div>
          </div>
          </div>
          </div>
          
              <div id="login" class="modal ">
            <div class="modal-dialog">
              <div class="modal-content">
              <!-- Modal Header -->
              <div class="modal-header">
              <h4 class="modal-title">register</h4>
              </div>
              <!-- Modal body -->
              <div class="modal-body">
                <form class="form-group" method="post" action="">
                  <label for="email" class="label">email</label>
                  <input type="email" name="emails" id="email" class="form-control input" required>
                  <br>
                  <label for="password" class="label" >password</label>
                  <input type="password" id="password" name="passwords" class="form-control input" required>
                  <br>
                  <input type="submit" class="btn btn-primary" name="submit" value="check">
                </form>    
              </div>
               
              <!-- Modal footer -->
              <div class="modal-footer">
              <button type="button" class="btn btn-danger" onclick="closelogin()">Close</button>
              <button type="button"  onclick="register_open()"   class="btn btn-success">sign up</button>
              </div>
              </div>
              </div>
              </div>
              <?php require("C:/xampp/htdocs/try/control/control.php");?>
        <div class="text-center py-4 align-items-center" id="contactus">
          <p>Contact FUNDWINGS on social media</p>
          <a href="https://www.youtube.com/channel/UC5CF7mLQZhvx8O5GODZAhdA" class="btn btn-primary m-1" role="button" data-mdb-ripple-init
             rel="nofollow" target="_blank">
             <i class="fa fa-telegram"></i>
          </a>
          <a href="https://www.facebook.com/mdbootstrap" class="btn btn-primary m-1" role="button" rel="nofollow" data-mdb-ripple-init
             target="_blank">
             <i class="fa fa-facebook"></i>
          </a>
          <a href="https://twitter.com/MDBootstrap" class="btn btn-primary m-1" role="button" rel="nofollow" data-mdb-ripple-init
             target="_blank">
             <i class="fa fa-whatsapp"></i>
          </a>
          <a href="https://github.com/mdbootstrap/mdb-ui-kit" class="btn btn-primary m-1" role="button" rel="nofollow" data-mdb-ripple-init
             target="_blank">
             <i class="fa fa-instagram"></i>
          </a>
        </div>
        
        <script src="scripts/scripts.js"></script> 
  </body>