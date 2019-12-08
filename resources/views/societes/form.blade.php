   
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    <br />
@endif
     
<form method="post" action={{ $route }}>
    @csrf
    <div class="row">
        <div class="col-md-9">
            <div class="form-group">
                <label for="name">Nom:</label>
                <input type="text" class="form-control" name="name" value="{{ old('name') ?? $societe->name ?? null }}"/>
            </div>
            <div class="form-group">
                <label for="sigle">Sigle:</label>
                <input type="text" class="form-control" name="sigle" value="{{ old('sigle') ?? $societe->sigle ?? null }}"/>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea cols="5" rows="5" class="form-control" name="description" >{{ old('description') ?? $societe->description ?? null }}</textarea>
            </div>
        

        </div>

        <div class="col-md-3">
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="customFile">
                <label class="custom-file-label" for="customFile">Choose file</label>
            </div>

        </div>
    </div>
   
    <hr/>
    <a href="{{ route('societes.index')}}" class="btn btn-secondary">Retour</a>
    <button type="submit" class="btn btn-primary">Enregister</button>

</form>
    