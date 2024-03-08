<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Landing Zero Free Bootstrap Theme with Video</title>
    <meta name="description" content="This is a free Bootstrap landing page theme created for BootstrapZero. Feature video background and one page design." />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="generator" content="Codeply">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" />
    <link href="//cdnjs.cloudflare.com/ajax/libs/animate.css/3.1.1/animate.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="//code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />
    <link rel="stylesheet" href="{{asset('css/styles.css')}}" />
  </head>
  <body>
    <nav id="topNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="{{url('/home')}}"><i class="ion-ios-analytics-outline"></i>EVENTO</a>
            </div>
            <div class="navbar-collapse collapse" id="bs-navbar">
                <ul class="nav navbar-nav">
                    
                   
                    
                    <li>
                        <a class="page-scroll" href="#two">Highlights</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#three">Gallery</a>
                    </li>
                    
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        @if (Route::has('login'))
                        
                            @auth
                              <li>   
                                @if (Auth::check() && Auth::user()->hasRole('admin') || Auth::check() && Auth::user()->hasRole('organisateur') || Auth::check() && Auth::user()->hasRole('spectateur'))

                                <a href="{{ url('/dashboard') }}" class="page-scroll">dashboard</a></li>
                                @endif
                             <li>  
                                 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                                    <li> <button  type="submit" class="btn page-scroll text-white" style="color:black;font-weight: 750;  margin-top:13px; margin-right:13px; ">logout</button>
                                    </li>                           
                             </form>
                        </li>
                            @else
                            
                              <li> <a href="{{ route('login') }}" class="page-scroll">Log in</a></li> 
        
                                @if (Route::has('register'))
                                  <li> <a href="{{ route('register') }}" class="page-scroll">Register</a></li> 
                                @endif
                            @endauth
                        
                    @endif                 
                   </li>
                </ul>
            </div>
        </div>
    </nav>
    <header id="first">
        <div class="header-content" style="{{asset('images/parties.gif')}}">
            <div class="inner">
                <h1 class="cursive">evento, evenement reservation</h1>
                <h4>soiyez le bienvenue au palteform EVENTO pour resrver votre evenement</h4>
                <hr>
             <a href="#one" class="btn btn-primary btn-xl page-scroll">Get Started</a>
            </div>
        </div>
        <img src="{{asset('images/parties.jpg')}}" style="width: -webkit-fill-available;margin-top:-312px;vertical-align:text-top" alt="Your browser does not support .">

        
    </header>
    <section class="bg-primary" id="one">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 text-center">
                    <h2 class="margin-top-0 text-primary">reserver un evenement disponible</h2>
                    <br>
                    <p class="text-faded">
                        Bootstrap's responsive grid comes in 4 sizes or "breakpoints": tiny (xs), small(sm), medium(md) and large(lg). These 4 grid sizes enable you create responsive layouts that behave accordingly on different devices.
                    </p>
                    <a href="#three" class="btn btn-default btn-xl page-scroll">VOIR TOUS LES EVENEMENTS</a>
                </div>
            </div>
        </div>
    </section>
    <div class="my-3" style="display: flex">
    <div class="container_search" >
        <input checked="" class="checkbox" type="checkbox"> 
        <div class="mainbox">
            <div class="iconContainer">
                <svg viewBox="0 0 512 512" height="1em" xmlns="http://www.w3.org/2000/svg" class="search_icon"><path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"></path></svg>
            </div>
         <input class="search_input" id="hero_field" placeholder="search by title and price" type="text">
        </div>
    </div>
    <div class="center" style="">
        <select id="categorie" name="categorie" class="custom-select sources" style=" border-radius: 9px;   border: darkviolet;   height: 47px; width: 168px; background-color: black; margin-left: 32px;">
          <option value="" selected disabled>choisir une categorie</option>

          @foreach($categories as $categorie)
          <option value="{{$categorie->id}}"">{{$categorie->nom}}</option>
         @endforeach
        </select>
      </div>
    </div>
      <section id="search_list" class="no-padding"  >
        <div class="container-fluid">
            <div class="row no-gutter">
                @foreach($evenements as $evenement )
                <div class="col-lg-4 col-sm-6">
                    <a href="{{route('ShowEvent', $evenement->id)}}" class="gallery-box" data-toggle="modal" data-src="//splashbase.s3.amazonaws.com/unsplash/regular/photo-1430916273432-273c2db881a0%3Fq%3D75%26fm%3Djpg%26w%3D1080%26fit%3Dmax%26s%3Df047e8284d2fdc1df0fd57a5d294614d">
                        <img src="{{asset('storage/'.$evenement->image)}}" class="img-responsive" alt="Image 1">
                        <div class="gallery-box-caption">
                            <div class="gallery-box-content">
                                <div>
                                    <i class="icon-lg ion-ios-search"></i>
                                    <h2> <strong>le nom d'évenement :</strong> {{$evenement->titre}}</h2>
                                    <p><strong> prix :</strong>{{$evenement->prix}} $</p>
                                    <p> <strong>nombre de place :</strong> {{$evenement->capacity}}</p>
                                    <p> <strong>description :</strong> {{$evenement->description}}</p>
                                    
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
               
            
            
        </div>
 
    </section>
    

 
    <section id="last">
 
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="margin-top-0 wow fadeIn">Get in Touch</h2>
                    <hr class="primary">
                    <p>We love feedback. Fill out the form below and we'll get back to you as soon as possible.</p>
                </div>
                <div class="col-lg-10 col-lg-offset-1 text-center">
                    <form class="contact-form row">
                        <div class="col-md-4">
                            <label></label>
                            <input type="text" class="form-control" placeholder="Name">
                        </div>
                        <div class="col-md-4">
                            <label></label>
                            <input type="text" class="form-control" placeholder="Email">
                        </div>
                        <div class="col-md-4">
                            <label></label>
                            <input type="text" class="form-control" placeholder="Phone">
                        </div>
                        <div class="col-md-12">
                            <label></label>
                            <textarea class="form-control" rows="9" placeholder="Your message here.."></textarea>
                        </div>
                        <div class="col-md-4 col-md-offset-4">
                            <label></label>
                            <button type="button" data-toggle="modal" data-target="#alertModal" class="btn btn-primary btn-block btn-lg">Send <i class="ion-android-arrow-forward"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <footer id="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-6 col-sm-3 column">
                    <h4>Information</h4>
                    <ul class="list-unstyled">
                        <li><a href="">Products</a></li>
                        <li><a href="">Services</a></li>
                        <li><a href="">Benefits</a></li>
                        <li><a href="">Developers</a></li>
                    </ul>
                </div>
                <div class="col-xs-6 col-sm-3 column">
                    <h4>About</h4>
                    <ul class="list-unstyled">
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">Delivery Information</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms &amp; Conditions</a></li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-3 column">
                    <h4>Stay Posted</h4>
                    <form>
                        <div class="form-group">
                          <input type="text" class="form-control" title="No spam, we promise!" placeholder="Tell us your email">
                        </div>
                        <div class="form-group">
                          <button class="btn btn-primary" data-toggle="modal" data-target="#alertModal" type="button">Subscribe for updates</button>
                        </div>
                    </form>
                </div>
                <div class="col-xs-12 col-sm-3 text-right">
                    <h4>Follow</h4>
                    <ul class="list-inline">
                      <li><a rel="nofollow" href="" title="Twitter"><i class="icon-lg ion-social-twitter-outline"></i></a>&nbsp;</li>
                      <li><a rel="nofollow" href="" title="Facebook"><i class="icon-lg ion-social-facebook-outline"></i></a>&nbsp;</li>
                      <li><a rel="nofollow" href="" title="Dribble"><i class="icon-lg ion-social-dribbble-outline"></i></a></li>
                    </ul>
                </div>
            </div>
            <br/>
            <span class="pull-right text-muted small"><a href="http://www.bootstrapzero.com">Landing Zero by BootstrapZero</a> ©2015 Company</span>
        </div>
    </footer>
    <div id="galleryModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
        	<div class="modal-body">
        		<img src="//placehold.it/1200x700/222?text=..." id="galleryImage" class="img-responsive" />
        		<p>
        		    <br/>
        		    <button class="btn btn-primary btn-lg center-block" data-dismiss="modal" aria-hidden="true">Close <i class="ion-android-close"></i></button>
        		</p>
        	</div>
        </div>
        </div>
    </div>
    <div id="aboutModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
        	<div class="modal-body">
        		<h2 class="text-center">Landing Zero Theme</h2>
        		<h5 class="text-center">
        		    A free, responsive landing page theme built by BootstrapZero.
        		</h5>
        		<p class="text-justify">
        		    This is a single-page Bootstrap template with a sleek dark/grey color scheme, accent color and smooth scrolling.
        		    There are vertical content sections with subtle animations that are activated when scrolled into view using the jQuery WOW plugin. There is also a gallery with modals
        		    that work nicely to showcase your work portfolio. Other features include a contact form, email subscribe form, multi-column footer. Uses Questrial Google Font and Ionicons.
        		</p>
        		<p class="text-center"><a href="http://www.bootstrapzero.com">Download at BootstrapZero</a></p>
        		<br/>
        		<button class="btn btn-primary btn-lg center-block" data-dismiss="modal" aria-hidden="true"> OK </button>
        	</div>
        </div>
        </div>
    </div>
    <div id="alertModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
        <div class="modal-content">
        	<div class="modal-body">
        		<h2 class="text-center">Nice Job!</h2>
        		<p class="text-center">You clicked the button, but it doesn't actually go anywhere because this is only a demo.</p>
        		<p class="text-center"><a href="http://www.bootstrapzero.com">Learn more at BootstrapZero</a></p>
        		<br/>
        		<button class="btn btn-primary btn-lg center-block" data-dismiss="modal" aria-hidden="true">OK <i class="ion-android-close"></i></button>
        	</div>
        </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>

$(document).ready(function() {
    $("#hero_field").keyup(function() {
        var input = $(this).val(); 
        if(input == "") input = 'all';
        $.ajax({
            url: "/search",
            method: "POST",
            data: {
                _token: '{{ csrf_token() }}',
                input: input
            },
            success: function(data) {
                $("#search_list").html(data);
            }
        });
    });

    $("#categorie").on('change', function() {
    var categorie = $(this).val(); 
    $.ajax({
        url: "{{ route('filter') }}",
        method: "GET",
        data: {
            categorie: categorie
        },
        success: function(data) {
            var evenements = data.evenements;
            var html = '';
            if (evenements.length > 0) {
                for (let i = 0; i < evenements.length; i++) {
                    html += '<div class="col-lg-4 col-sm-6">';
                    html += '<a href="/evenement/show/' + evenements[i].id + '" class="gallery-box" data-toggle="modal" data-src="//splashbase.s3.amazonaws.com/unsplash/regular/photo-1430916273432-273c2db881a0%3Fq%3D75%26fm%3Djpg%26w%3D1080%26fit%3Dmax%26s%3Df047e8284d2fdc1df0fd57a5d294614d">';
                    html += '<img src="{{ asset('storage') }}/' + evenements[i].image + '" class="img-responsive" alt="Image 1">';
                    html += '<div class="gallery-box-caption">';
                    html += '<div class="gallery-box-content">';
                    html += '<div>';
                    html += '<i class="icon-lg ion-ios-search"></i>';
                    html += '<h2><strong>le nom devenement :</strong> ' + evenements[i].titre + '</h2>';
                    html += '<p><strong>prix :</strong>' + evenements[i].prix + ' $</p>';
                    html += '<p><strong>nombre de place :</strong> ' + evenements[i].capacity + '</p>';
                    html += '<p><strong>description :</strong> ' + evenements[i].description + '</p>';
                    html += '</div>';
                    html += '</div>';
                    html += '</div>';
                    html += '</a>';
                    html += '</div>';
                }
            } else {
                html += '<h1> evenement n Not Found</h1>';
            }
            $("#search_list").html(html);
        }
    });
});

});
  </script>

      
     <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.js"></script>
    <script src="{{asset('js/script.js')}}"></script>
  </body>
</html>