<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="title icon" href="images/title-img.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/all.js" integrity="sha384-xymdQtn1n3lH2wcu0qhcdaOpQwyoarkgLVxC/wZ5q7h9gHtxICrpcaSUfygqZGOe" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    
    <title>Admin Dashboard</title>
  </head>
  <body class="">
    
    <!-- navbar -->
    <nav class="navbar navbar-expand-md navbar-light">
      <button class="navbar-toggler nav-button ml-auto mb-2 bg-light" type="button" data-toggle="collapse" data-target="#myNavbar">
        <div class="bg-dark line1"></div>
        <div class="bg-dark line2"></div>
        <div class="bg-dark line3"></div>
      </button>
      <div class="collapse navbar-collapse" id="myNavbar">
        <div class="container-fluid">
          <div class="row">
            <!-- sidebar -->
            <div class="col-xl-2 col-lg-3 col-md-3   sidebar fixed-top">
              <!-- <a href="#" class="navbar-brand text-white d-block mx-auto text-center"><img src="images/logo.png" class="brand-logo"></a> -->
              <!-- <button class="nav-button sideclick ml-auto mb-2 bg-light" type="button" data-toggle="collapse" data-target="">
        <div class="bg-light line1"></div>
        <div class="bg-light line2"></div>
        <div class="bg-light line3"></div>
      </button> -->
              <div class="bottom-border   pb-3">
                <img src="images/admin.jpeg" width="50" class="profile__pic mr-3">
                <a href="#" class="text-white"></a>
              </div>
              <ul class="navbar-nav flex-column mt-5">
              <h5 class="text-white"><?php echo "Welcome".$user->username;?> </h5>
                <li class="nav-item"><a href="#" class="nav-link text-white p-3 mb-2"><i class="fab fa-wpforms text-light fa-lg mr-3"></i>Form fill up</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-white p-3 mb-2 sidebar-link"><i class="fas fa-user text-light fa-lg mr-3"></i>Profile</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-white p-3 mb-2 sidebar-link"><i class="fas fa-envelope text-light fa-lg mr-3">Inbox</i>Status</a></li>
                
                
              </ul>
            </div>
            <!-- end of sidebar -->

            <!-- top-nav -->
            <div class="col-xl-12 col-lg-12 col-md-12 fixed-top py-2 top-navbar">
              <div class="row align-items-center">
              <div class=" col-xl-5 col-lg-5 col-md-5">
                
              <h8 class="text-light text-uppercase"><strong>School of Engineering & TEchnology</strong>,<bold>NU</bold></h8>  
              </div>
              <div class="col-xl-4 col-lg-4 col-md-4">
                <form>
                  <div class="input-group">
                    <input type="text" class="form-control search-input" name="" placeholder="Search...">
                    <button type="button" class="btn btn-white search-btn"><i class="fas fa-search text-danger"></i></button>
                  </div>
                </form>

              </div> 
              <div class="col-xl-3 col-lg-3 col-md-3">
                <ul class="navbar-nav">
                  <li class="nav-item icon-parent"><a href="#" class="nav-link icon-bullet"><i class="fas fa-comments text-muted fa-lg"></i></a></li>
                  <li class="nav-item icon-parent"><a href="#" class="nav-link icon-bullet"><i class="fas fa-bell text-muted fa-lg"></i></a></li>
                  <li class="nav-item ml-auto"><a href="#" class="nav-link" data-toggle="modal" data-target="#sign-out"><i class="fas fa-sign-out-alt text-danger fa-lg"></i></a></li>
                </ul>
              </div>
              </div>
             
            </div>
            <!-- end of top-nav -->
          </div>
        </div>
      </div>
    </nav>
    <!-- end of navbar -->
    <div class="modal fade" id="sign-out"  data-keyboard="false" data-backdrop="static">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title text-center">Want to leave</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            Press logout to leave
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success" data-dismiss="modal">Stay Here</button>
             <button type="button" class="btn btn-info" data-dismiss="modal">Stay Here</button>
          </div>
        </div>
      </div>
    </div>
<!--end of modal-->