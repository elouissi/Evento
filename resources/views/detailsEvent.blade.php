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
    <link rel="stylesheet" href="{{asset('css/details.css')}}" />
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
                <a class="navbar-brand page-scroll" href="#first"><i class="ion-ios-analytics-outline"></i> Landing Zero</a>
            </div>
            <div class="navbar-collapse collapse" id="bs-navbar">
                <ul class="nav navbar-nav">
                    
                   
                    
                    <li>
                        <a class="page-scroll" href="#two">Highlights</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#three">Gallery</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#four">Features</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#last">Contact</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        @if (Route::has('login'))
                        
                            @auth
                              <li>   
                                <a href="{{ url('/home') }}" class="page-scroll">dashboard</a></li>
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
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
    <div class="blog-single " style="    background-color: #282828;   ">

        <div class="container">
            <div class="row align-items-start">
                <div class="col-lg-8 m-15px-tb">
                    <article class="article" style="    background-color: #282828;                    ">
                        <div class="article-img">
                            <img src="{{asset('storage/'.$evenement->image)}}" title="" alt="">
                        </div>
                        <div class="article-title">
                             <h2 style="color: white" > {{$evenement->titre}}</h2>
                            <div class="media">
                              
                                <div class="media-body">
                                   <p>organisateur de l'evenement : </p> <label>{{$evenement->user->name}}</label>
                                    <span>{{$evenement->created_at}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="article-content">
                            <h3 style="color: #7B148D" >Description :</h3>
                            <p>{{$evenement->description}}</p>
                            <div style="display: flex; gap:20px">
                                <p> <strong style="color: #7B148D"> le prix : </strong > {{$evenement->prix}} $ </p>
                                <p> <strong style="color: #7B148D">la capacity :</strong> {{$evenement->capacity}}</p>
                                <p> <strong style="color: #7B148D"> la durée :</strong> {{$evenement->durée}} hour </p>
                                <p> <strong style="color: #7B148D"> la date :</strong> {{$evenement->date}}  </p>
                            </div>
                            <p> <strong style="color: #7B148D">le lieux :</strong> {{$evenement->lieux}}</p>
                            <p> <strong style="color: #7B148D">la localisation :</strong> {{$evenement->localisation}}</p>
                        </div>
                   
                    </article>
                    @auth    
                    @if (Auth::user()->hasRole(['spectateur'])) 
                
                        {{-- {{ dd($reservations->contains('status','publish'))}} --}}
                        @if ($reservations->contains('status','publish'))
                          @if($evenement->capacity !== 0)

                        <form action="{{route('mollie')}}"  method="POST" >
                            @csrf

                           <input type="number"  style="display:none"  name="prix" value="{{$evenement->prix}}">
                           <input type="text" style="display:none"  name="id" value="{{$evenement->id}}">
                           <input type="text" style="display:none"  name="titre" value="{{$evenement->titre}}">
                           <input type="text" style="display:none"  name="capacity" value="{{$evenement->capacity}}">
                           <input type="text" style="display:none"  name="tickets_vendus" value="{{$evenement->tickets_vendus}}">

 

                             <button type="submit" class="btn btn-primary d-block">check out</button>




                        </form>   
                            @endif    
                            @if($evenement->capacity == 0)
                            <p>tous les tickets sont reserver</p>
                            @endif


                        @elseif ($reservations->contains('status','refuse'))
                            <!-- Si une réservation avec le statut 'refuse' est trouvée -->
                            <p>wait response of organizer</p>
                        @else
                            <a href="{{route('CreateReserv',$evenement->id)}}" class="btn btn-danger d-block">RESERVER </a>
                        @endif
                
                    @endif
                @endauth
                
                
                
                @guest
                    
                    <a  href="{{route('register')}}"   class="btn btn-danger d-block">RESERVER </a>
 
                @endguest
            
            
               
                </div>
                <div class="col-lg-4 m-15px-tb blog-aside">
                
                    <!-- Latest Post -->
                    <div class="widget widget-latest-post" style="background-color: #7B148D" >
                        <div class="widget-title">
                            <h3 style="color:  #282828" >Latest Event</h3>
                        </div>
                        <div class="widget-body">
                            @foreach($evenements as $list)
                            <div class="latest-post-aside media">
                                <div class="lpa-left media-body">
                                    <div class="lpa-title">
                                        <h5  style="color:  #282828" ><a style="color:#282828"  href="{{route('ShowEvent', $list->id)}}">{{$list->titre}}</a></h5>
                                    </div>
                                    <div class="lpa-meta">
                                        <a  style="color:  #282828" class="name" href="{{route('ShowEvent', $list->id)}}">
                                        l'organisateur  {{$list->user->name}}
                                        </a>
                                        <a class="date" style="color:  #282828"  href="{{route('ShowEvent', $list->id)}}">
                                               la date : {{$list->date}}
                                            </a>
                                    </div>
                                </div>
                                <div class="lpa-right">
                                    <a href="{{route('ShowEvent', $list->id)}}">
                                        <img src="{{asset('storage/'.$list->image)}}" title="" alt="image d'evenement">
                                    </a>
                                </div>
                            </div>
                            @endforeach
                          
                        </div>
                    </div>
                    <!-- End Latest Post -->
              
                </div>
            </div>
        </div>
    </div>
  </body>
</html>  