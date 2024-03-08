<!--

=========================================================
* Now UI Dashboard - v1.5.0
=========================================================

* Product Page: https://www.creative-tim.com/product/now-ui-dashboard
* Copyright 2019 Creative Tim (http://www.creative-tim.com)

* Designed by www.invisionapp.com Coded by www.creative-tim.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}">
  <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}">
  <link rel="stylesheet" href="{{asset('public/css/dashboard.css')}}">

  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Now UI Dashboard by Creative Tim
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/css/now-ui-dashboard.css?v=1.5.0') }}" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="{{ asset('assets/demo/demo.css') }}" rel="stylesheet" />
</head>

<body class="user-profile">
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
          EVENTO
        </a>
      </div>
      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
          @if (Auth::check() && Auth::user()->hasRole('admin') || Auth::check() && Auth::user()->hasRole('organisateur'))
          <li>
            <a href="{{url('dashboard')}}">
              <i class="now-ui-icons design_app"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="active" >
            <a href="{{route('evenement')}}">
              <i class="now-ui-icons design_bullet-list-67"></i>
              <p>Evenement</p>
            </a>
          </li>
          @endif
            @if (Auth::check() && Auth::user()->hasRole('admin'))

          <li class="" >
            <a href="{{route('ShowCategorie')}}">
              <i class="now-ui-icons location_map-big"></i>
                         <p>categorie</p>
            </a>
          </li>
          <li class="" >
            <a href="{{route('users')}}">
              <i class="now-ui-icons users_single-02"></i>
              <p>users</p>
            </a>
          </li>
          @endif
          @if (Auth::check() && Auth::user()->hasRole('organisateur'))
          <li class="" >
            <a href="{{route('reservation')}}">
                <i class="now-ui-icons design_bullet-list-67"></i>
                <p>reservations</p>
            </a>
          </li>
          @endif
          <li class="" >
            <a href="{{route('profile')}}">
              <i class="now-ui-icons users_circle-08"></i>
              <p>profile</p>
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
            <a class="navbar-brand" href="#pablo">User Profile</a>
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
      <div class="panel-header panel-header-sm">
      </div>
      <div class="content">
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Edit evenement</h5>
              </div>
              <div class="card-body">
                <form action="{{route('UpdateEvent',$evenement->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                  <div class="row">
                    <div class="col-md-5 pr-1">
                      <div class="form-group">
                        <label>titre</label>
                        <input type="text" name="titre" class="form-control" value="{{$evenement->titre}}">
                        @error('titre')
                        <span class="text-danger" > {{$message}}</span>
                     @enderror
                      </div>
                    </div>
                    <div class="col-md-3 px-1">
                      <div class="form-group">
                        <label>description</label>
                        <input type="text" name="description" class="form-control" placeholder="{{$evenement->description}}" value="{{$evenement->description}}">
                        @error('description')
                        <span class="text-danger" > {{$message}}</span>
                     @enderror
                      </div>
                    </div>
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label for="exampleInputEmail1">lieux</label>
                        <input type="text" class="form-control" placeholder="lieux" value="{{$evenement->lieux}}" name="lieux" >
                        @error('lieux')
                        <span class="text-danger" > {{$message}}</span>
                     @enderror
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>localisation</label>
                        <input type="text" class="form-control" placeholder="localisation" name="localisation" value="{{$evenement->localisation}}">
                        @error('localisation')
                        <span class="text-danger" > {{$message}}</span>
                     @enderror
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>prix</label>
                        <input type="number" class="form-control" placeholder="prix" name="prix"  value="{{$evenement->prix}}">
                        @error('prix')
                        <span class="text-danger" > {{$message}}</span>
                     @enderror
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="1">capacity</label>
                        <input type="number" class="form-control" placeholder="prix" name="capacity"  value="{{$evenement->capacity}}">

                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="1">durée</label>
                        <select class="form-control" name="durée">
                          <option selected >{{$evenement->durée}}</option>
                          <option value="1">1h</option>
                          <option value="2">2h</option>
                          <option value="3">3h</option>
                          <option value="4">4h</option>
                      
                        </select> 
                        @error('durée')
                        <span class="text-danger" > {{$message}}</span>
                     @enderror   
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 pr-1">
                      <div class="form-group">
                        <label>capacity</label>
                        <input type="number" class="form-control" placeholder="capacity" value="{{$evenement->capacity}}">
                        @error('capacity')
                        <span class="text-danger" > {{$message}}</span>
                     @enderror
                      </div>
                    </div>
                    <div class="col-md-4 px-1">
                      <div class="form-group">
                        <label>date</label>
                        <input type="date" class="form-control" name="date" placeholder="date" value="{{$evenement->date}}">
                        @error('date')
                        <span class="text-danger" > {{$message}}</span>
                     @enderror
                      </div>
                    </div>
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label for="1">categorie </label>
                        <select class="form-control" name="categorie_id">
                          <option selected value="{{$evenement->categorie->id}}" >{{$evenement->categorie->nom}}</option>
                          @foreach($categories as $categorie)
                          <option value="{{$categorie->id}}" >{{$categorie->nom}}</option>
                          @endforeach
                        </select>
                        @error('categorie_id')
                        <span class="text-danger" > {{$message}}</span>
                     @enderror
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                        <div class="form-check">
                            <label for="1">ci vous voulez controller l'autorisation a la participation a ce evenement </label><br>

                            <input class="form-check-input" name="accptance" value="manuel"  type="radio"st >
                            <label class="form-check-label" for="exampleRadios1">
                              accepter
                            </label>
                          </div>
                          <button type="submit" class="btn btn-primary">update</button>

                    </div>
                  </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card card-user">
              
                <img src="{{ asset('storage/'.$evenement->image) }}" alt="...">
              
        
              <hr>
              <div class="button-container">
                <label >Cliquer ici pour ajouter la photo
                </label>
                <input type="file" class="form-control" id="image" name="image">  
                @error('image')
                <span class="text-danger" > {{$message}}</span>
             @enderror              
              </div>
            </form>

            </div>
          </div>
        </div>
      </div>
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
  <script src="{{ asset('assets/js/core/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
  <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="{{ asset('assets/js/plugins/chartjs.min.js') }}"></script>
  <!--  Notifications Plugin    -->
  <script src="{{ asset('assets/js/plugins/bootstrap-notify.js') }}"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('assets/js/now-ui-dashboard.min.js?v=1.5.0') }}" type="text/javascript"></script><!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
  <script src="{{ asset('assets/demo/demo.js') }}"></script>
</body>

</html>