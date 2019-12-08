<div class="row m-2"> 
    @foreach($societes as $societe)
        <div class="col-xs-12 col-sm-6 col-md-3">
            <div class="card h-100">
                <img src="https://picsum.photos/150" class="card-img-top w-100" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $societe->name }}</h5>
                    <p class="card-text">{{ $societe->sigle }}</p>
                    <a href="{{ route('societes.show',$societe->id)}}" class="btn btn-primary">Voir</a>
                </div>
            </div>
        </div>
    @endforeach
</div>
