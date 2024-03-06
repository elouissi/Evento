
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Now UI Dashboard by Creative Tim
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="{{asset('public/css/style.scss')}}">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="orange">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-mini">
          CT
        </a>
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
          Creative Tim
        </a>
      </div>
      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
          <li>
            <a href="{{url('dashboard')}}">
              <i class="now-ui-icons design_app"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="active" >
            <a href="{{route('evenement')}}">
              <i class="now-ui-icons design_app"></i>
              <p>Evenement</p>
            </a>
          </li>
         
        </ul>
      </div>
    </div>
    <div class="main-panel" id="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="#pablo">Table List</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <form>
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <i class="now-ui-icons ui-1_zoom-bold"></i>
                  </div>
                </div>
              </div>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="#pablo">
                  <i class="now-ui-icons media-2_sound-wave"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Stats</span>
                  </p>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="now-ui-icons location_world"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Some Actions</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#pablo">
                  <i class="now-ui-icons users_single-02"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Account</span>
                  </p>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      @if (Auth::check() && Auth::user()->hasRole('organisateur'))

    
      <div class="container" style="    margin-top: 73px;">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#form" >
            creation des evenements
          </button>  
 
        @for($i = 0 ;$i < count($evenements); $i += 2)
        <div class="row list-project">
            <div class="col-md-7">
              <img src="{{ asset('storage/'.$evenements[$i]->image) }}" alt="project-image" class="rounded">
 
            </div>

            <!-- / column -->
            <div class="col-md-5">
                <div class="project-info-box mt-0">
                    <h5>{{$evenements[$i]->titre}}</h5>
                    <p>{{$evenements[$i]->description}}</p>
                </div>
                <!-- / project-info-box -->
    
                <div class="project-info-box mb-10">
                    <p><b>organisateur:</b> {{$evenements[$i]->user->name}}</p>
                    <p><b>Date:</b> {{$evenements[$i]->date}}</p>
                    <p><b>localisation:</b> {{$evenements[$i]->localisation}}</p>
                    <p><b>places:</b> {{$evenements[$i]->capacity}}</p>
                </div>
                <!-- / project-info-box -->
    
              

                <form action="{{ route('DeleteEvent', $evenements[$i]->id) }}" method="POST">
                  <a href="{{route('EditEvent',$evenements[$i]->id)}}" class="btn btn-danger d-block">UPDATE </a>
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-primary">Delete</button>
              </form>
  
              </div>
            <!-- / column -->
        </div>
        <!-- / row list-project -->
    
        <div class="spacer-line-fw border-secondary opc-25 mt-30 mb-30">&nbsp;</div>
        @if ($i + 1 < count($evenements))

        <div class="row list-project">
            <div class="col-md-5 tablet-top">
                <div class="project-info-box mt-0">
                  <h5>{{$evenements[$i]->titre}}</h5>
                  <p>{{$evenements[$i]->description}}</p>
                </div>
                <!-- / project-info-box -->
    
                <div class="project-info-box mb-10">
                  <p><b>organisateur:</b> {{$evenements[$i+1]->user->name}}</p>
                    <p><b>Date:</b> {{$evenements[$i+1]->date}}</p>
                    <p><b>localisation:</b> {{$evenements[$i+1]->localisation}}</p>
                    <p><b>places:</b> {{$evenements[$i+1]->capacity}}</p>
                </div>
                <!-- / project-info-box -->
                <form action="{{ route('DeleteEvent', $evenements[$i+1]->id) }}" method="POST">
                  <a href="{{route('EditEvent',$evenements[$i+1]->id)}}" class="btn btn-danger d-block">UPDATE </a>
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-primary">Delete</button>
              </form>
    
             </div>
            <!-- / column -->
    
            <div class="col-md-7">
              <img src="{{ asset('storage/'.$evenements[$i+1]->image) }}" alt="project-image" class="rounded">           
             </div>
            <div class="spacer-line-fw border-secondary opc-25 mt-30 mb-30">&nbsp;</div>

            @endif
            <!-- / column -->
        </div>

        @endfor
        {{ $evenements->links('vendor.pagination.bootstrap-5') }}
   
        
        <div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header border-bottom-0">
                <h5 class="modal-title" id="exampleModalLabel">Create </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="{{route('CreateEvent')}}" method="POST"  enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                  <div class="form-group">
                    <label >Cliquer ici pour ajouter la photo
                    </label>
                    <input type="file" class="form-control" id="image" name="image">                
                    <small id="emailHelp" class="form-text text-muted">Your information is safe with us.</small>
                    @error('image')
                    <span class="text-danger" > {{$message}}</span>
                 @enderror
                  </div>

                  <div class="form-group">
                    <label for="">titre</label>
                    <input type="text" name="titre" class="form-control"placeholder="titre">
                    <small  class="form-text text-muted">Your information is safe with us.</small>
                    @error('titre')
                    <span class="text-danger" > {{$message}}</span>
                 @enderror
                  </div>
                  <div class="form-group">
                    <label for="">description</label>
                    <textarea type="text" name="description" class="form-control"placeholder="ecrivez votre description ici"></textarea>
                    <small  class="form-text text-muted">Your information is safe with us.</small>
                    @error('description')
                    <span class="text-danger" > {{$message}}</span>
                 @enderror
                  </div>
                  <div class="form-group">
                    <label for="email1">lieux</label>
                    <input type="adresse" name="lieux" class="form-control" id="adresse1" aria-describedby="adresseHelp" placeholder="Enter lieux">
                    <small id="adresseHelp" class="form-text text-muted">Your information is safe with us.</small>
                    @error('lieux')
                    <span class="text-danger" > {{$message}}</span>
                 @enderror
                  </div>
                  <div class="form-group">
                    <label >localisation</label>
                    <input type="adresse" name="localisation" class="form-control"  aria-describedby="adresseHelp" placeholder="Enter localisation">
                    <small id="adresseHelp" class="form-text text-muted">Your information is safe with us.</small>
                    @error('localisation')
                    <span class="text-danger" > {{$message}}</span>
                 @enderror
                  </div>
                  <div class="form-group">
                    <label for="email1">prix</label>
                    <input type="number" name="prix" class="form-control"  aria-describedby="prixHelp" placeholder="Enter prix">
                    <small id="prixHelp" class="form-text text-muted">Your information is safe with us.</small>
                    @error('prix')
                    <span class="text-danger" > {{$message}}</span>
                 @enderror
                  </div>
                  <div class="form-group">
                    <label for="1">durée</label>
                    <select class="form-control" name="durée">
                      <option selected >selectionner une la durée</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                  
                    </select>  
                    @error('durée')
                    <span class="text-danger" > {{$message}}</span>
                 @enderror             
                     </div>
                  <div class="form-group">
                    <label for="1">capacity </label>
                    <input type="number" class="form-control" name="capacity" placeholder="la capacity ">
                    @error('capacity')
                    <span class="text-danger" > {{$message}}</span>
                 @enderror
                  </div>
                  <div class="form-group">
                    <label for="1">date </label>
                    <input type="date" name="date" class="form-control" id="2" placeholder="la date ">
                    @error('date')
                    <span class="text-danger" > {{$message}}</span>
                 @enderror
                  </div>
                  <div class="form-group">
                    <label for="1">categorie </label>
                    <select class="form-control" name="categorie_id">
                      <option selected >selectionner une categorie</option>
                      @foreach($categories as $categorie)
                      <option value="{{$categorie->id}}" >{{$categorie->nom}}</option>
                      @endforeach
                    </select>
                    @error('categorie_id')
                    <span class="text-danger" > {{$message}}</span>
                 @enderror
                  </div>
                  <div class="form-group">
                    <label for="1">ci vous voulez controller l'autorisation a la participation a ce evenement </label>
                    <div class="form-check">
                      <input class="form-check-input" name="accptance" value="manuel"  type="radio" >
                      <label class="form-check-label" for="exampleRadios1">
                        accepter
                      </label>
                    </div>
                  
                  </div>
                </div>
                <div class="modal-footer border-top-0 d-flex justify-content-center">
                  <button type="submit" class="btn btn-success">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>

        <!-- / row list-project -->
    
    
        <!-- / row list-project -->
    </div>
    @endif
      <footer class="footer">
        <div class=" container-fluid ">
          <nav>
            <ul>
              <li>
                <a href="https://www.creative-tim.com">
                  Creative Tim
                </a>
              </li>
              <li>
                <a href="http://presentation.creative-tim.com">
                  About Us
                </a>
              </li>
              <li>
                <a href="http://blog.creative-tim.com">
                  Blog
                </a>
              </li>
            </ul>
          </nav>
          <div class="copyright" id="copyright">
            &copy; <script>
              document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
            </script>, Designed by <a href="https://www.invisionapp.com" target="_blank">Invision</a>. Coded by <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a>.
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script><!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>
</body>

</html>
<style>
  

/*------- portfolio -------*/
.project {
  margin: 15px 0;
}

.no-gutter .project {
  margin: 0 !important;
  padding: 0 !important;
}

.has-spacer {
  margin-left: 30px;
  margin-right: 30px;
  margin-bottom: 30px;
}

.has-spacer-extra-space {
  margin-left: 30px;
  margin-right: 30px;
  margin-bottom: 30px;
}

.has-side-spacer {
  margin-left: 30px;
  margin-right: 30px;
}

.project-title {
  font-size: 1.25rem;
}

.project-skill {
  font-size: 0.9rem;
  font-weight: 400;
  letter-spacing: 0.06rem;
}

.project-info-box {
  margin: 15px 0;
  background-color: #fff;
  padding: 30px 40px;
  border-radius: 5px;
}

.project-info-box p {
  margin-bottom: 15px;
  padding-bottom: 15px;
  border-bottom: 1px solid #d5dadb;
}

.project-info-box p:last-child {
  margin-bottom: 0;
  padding-bottom: 0;
  border-bottom: none;
}
img {
    width: 100%;
    max-width: 100%;
    height: auto;
    -webkit-backface-visibility: hidden;
}
.rounded {
    border-radius: 5px !important;
}
.btn-xs.btn-icon {
    width: 34px;
    height: 34px;
    max-width: 34px !important;
    max-height: 34px !important;
    font-size: 10px;
    line-height: 34px;
}
/* facebook button */
.btn-facebook, .btn-facebook:active, .btn-facebook:focus {
  color: #fff !important;
  background: #4e68a1;
  border: 2px solid #4e68a1;
}

.btn-facebook:hover {
  color: #fff !important;
  background: #3b4f7a;
  border: 2px solid #3b4f7a;
}

.btn-facebook-link, .btn-facebook-link:active, .btn-facebook-link:focus {
  color: #4e68a1 !important;
  background: transparent;
  border: none;
}

.btn-facebook-link:hover {
  color: #3b4f7a !important;
}

.btn-outline-facebook, .btn-outline-facebook:active, .btn-outline-facebook:focus {
  color: #4e68a1 !important;
  background: transparent;
  border: 2px solid #4e68a1;
}

.btn-outline-facebook:hover {
  color: #fff !important;
  background: #4e68a1;
  border: 2px solid #4e68a1;
}

/* twitter button */
.btn-twitter, .btn-twitter:active, .btn-twitter:focus {
  color: #fff !important;
  background: #65b5f2;
  border: 2px solid #65b5f2;
}

.btn-twitter:hover {
  color: #fff !important;
  background: #5294c6;
  border: 2px solid #5294c6;
}

.btn-twitter:hover {
  color: #fff !important;
  background: #5294c6;
  border: 2px solid #5294c6;
}

.btn-twitter-link, .btn-twitter-link:active, .btn-twitter-link:focus {
  color: #65b5f2 !important;
  background: transparent;
  border: none;
}

.btn-twitter-link:hover {
  color: #5294c6 !important;
}

.btn-outline-twitter, .btn-outline-twitter:active, .btn-outline-twitter:focus {
  color: #65b5f2 !important;
  background: transparent;
  border: 2px solid #65b5f2;
}

.btn-outline-twitter:hover {
  color: #fff !important;
  background: #65b5f2;
  border: 2px solid #65b5f2;
}

/* google button */
.btn-google, .btn-google:active, .btn-google:focus {
  color: #fff !important;
  background: #e05d4b;
  border: 2px solid #e05d4b;
}

.btn-google:hover {
  color: #fff !important;
  background: #b94c3d;
  border: 2px solid #b94c3d;
}

.btn-google-link, .btn-google-link:active, .btn-google-link:focus {
  color: #e05d4b !important;
  background: transparent;
  border: none;
}

.btn-google-link:hover {
  color: #b94c3d !important;
}

.btn-outline-google, .btn-outline-google:active, .btn-outline-google:focus {
  color: #e05d4b !important;
  background: transparent;
  border: 2px solid #e05d4b;
}

.btn-outline-google:hover {
  color: #fff !important;
  background: #e05d4b;
  border: 2px solid #e05d4b;
}

/* linkedin button */
.btn-linkedin, .btn-linkedin:active, .btn-linkedin:focus {
  color: #fff !important;
  background: #2083bc;
  border: 2px solid #2083bc;
}

.btn-linkedin:hover {
  color: #fff !important;
  background: #186592;
  border: 2px solid #186592;
}

.btn-linkedin-link, .btn-linkedin-link:active, .btn-linkedin-link:focus {
  color: #2083bc !important;
  background: transparent;
  border: none;
}

.btn-linkedin-link:hover {
  color: #186592 !important;
}

.btn-outline-linkedin, .btn-outline-linkedin:active, .btn-outline-linkedin:focus {
  color: #2083bc !important;
  background: transparent;
  border: 2px solid #2083bc;
}

.btn-outline-linkedin:hover {
  color: #fff !important;
  background: #2083bc;
  border: 2px solid #2083bc;
}

/* pinterest button */
.btn-pinterest, .btn-pinterest:active, .btn-pinterest:focus {
  color: #fff !important;
  background: #d2373b;
  border: 2px solid #d2373b;
}

.btn-pinterest:hover {
  color: #fff !important;
  background: #ad2c2f;
  border: 2px solid #ad2c2f;
}

.btn-pinterest-link, .btn-pinterest-link:active, .btn-pinterest-link:focus {
  color: #d2373b !important;
  background: transparent;
  border: none;
}

.btn-pinterest-link:hover {
  color: #ad2c2f !important;
}

.btn-outline-pinterest, .btn-outline-pinterest:active, .btn-outline-pinterest:focus {
  color: #d2373b !important;
  background: transparent;
  border: 2px solid #d2373b;
}

.btn-outline-pinterest:hover {
  color: #fff !important;
  background: #d2373b;
  border: 2px solid #d2373b;
}

/* dribble button */
.btn-dribbble, .btn-dribbble:active, .btn-dribbble:focus {
  color: #fff !important;
  background: #ec5f94;
  border: 2px solid #ec5f94;
}

.btn-dribbble:hover {
  color: #fff !important;
  background: #b4446e;
  border: 2px solid #b4446e;
}

.btn-dribbble-link, .btn-dribbble-link:active, .btn-dribbble-link:focus {
  color: #ec5f94 !important;
  background: transparent;
  border: none;
}

.btn-dribbble-link:hover {
  color: #b4446e !important;
}

.btn-outline-dribbble, .btn-outline-dribbble:active, .btn-outline-dribbble:focus {
  color: #ec5f94 !important;
  background: transparent;
  border: 2px solid #ec5f94;
}

.btn-outline-dribbble:hover {
  color: #fff !important;
  background: #ec5f94;
  border: 2px solid #ec5f94;
}

/* instagram button */
.btn-instagram, .btn-instagram:active, .btn-instagram:focus {
  color: #fff !important;
  background: #4c5fd7;
  border: 2px solid #4c5fd7;
}

.btn-instagram:hover {
  color: #fff !important;
  background: #4252ba;
  border: 2px solid #4252ba;
}

.btn-instagram-link, .btn-instagram-link:active, .btn-instagram-link:focus {
  color: #4c5fd7 !important;
  background: transparent;
  border: none;
}

.btn-instagram-link:hover {
  color: #4252ba !important;
}

.btn-outline-instagram, .btn-outline-instagram:active, .btn-outline-instagram:focus {
  color: #4c5fd7 !important;
  background: transparent;
  border: 2px solid #4c5fd7;
}

.btn-outline-instagram:hover {
  color: #fff !important;
  background: #4c5fd7;
  border: 2px solid #4c5fd7;
}

/* youtube button */
.btn-youtube, .btn-youtube:active, .btn-youtube:focus {
  color: #fff !important;
  background: #e52d27;
  border: 2px solid #e52d27;
}

.btn-youtube:hover {
  color: #fff !important;
  background: #b31217;
  border: 2px solid #b31217;
}

.btn-youtube-link, .btn-youtube-link:active, .btn-youtube-link:focus {
  color: #e52d27 !important;
  background: transparent;
  border: none;
}

.btn-youtube-link:hover {
  color: #b31217 !important;
}

.btn-outline-youtube, .btn-outline-youtube:active, .btn-outline-youtube:focus {
  color: #e52d27 !important;
  background: transparent;
  border: 2px solid #e52d27;
}

.btn-outline-youtube:hover {
  color: #fff !important;
  background: #e52d27;
  border: 2px solid #e52d27;
}
.btn-xs.btn-icon span, .btn-xs.btn-icon i {
    line-height: 34px;
}
.btn-icon.btn-circle span, .btn-icon.btn-circle i {
    margin-top: -1px;
    margin-right: -1px;
}
.btn-icon i {
    margin-top: -1px;
}
.btn-icon span, .btn-icon i {
    display: block;
    line-height: 50px;
}
a.btn, a.btn-social {
    display: inline-block;
}
.mr-5 {
    margin-right: 5px !important;
}
.mb-0 {
    margin-bottom: 0 !important;
}
.btn-facebook, .btn-facebook:active, .btn-facebook:focus {
    color: #fff !important;
    background: #4e68a1;
    border: 2px solid #4e68a1;
}
.btn-circle {
    border-radius: 50% !important;
}
.project-info-box p {
    margin-bottom: 15px;
    padding-bottom: 15px;
    border-bottom: 1px solid #d5dadb;
}

b, strong {
    font-weight: 700 !important;
}

.border-secondary {
    border-color: #d5dadb !important;
}
.opc-25 {
    opacity: 0.25 !important;
}
.mb-30 {
    margin-bottom: 30px !important;
}
.mt-30 {
    margin-top: 30px !important;
}
.spacer-line-full-width, .spacer-line-fw {
    width: 100%;
    line-height: 0;
    border-bottom: 2px solid #f7f7f7;
}
</style>
