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
