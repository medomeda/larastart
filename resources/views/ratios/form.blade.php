   
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
        <div class="col-md-12">
            <div class="form-group">
                <label for="name">Nom:</label>
                <input type="text" class="form-control" name="name" value="{{ old('name') ?? $ratio->name ?? null }}"/>
            </div>
            <div class="form-group">
                <label for="abreviation">Abréviation:</label>
                <input type="text" class="form-control" name="abreviation" value="{{ old('abreviation') ?? $ratio->abreviation ?? null }}"/>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea cols="5" rows="5" class="form-control" name="description" >{{ old('description') ?? $ratio->description ?? null }}</textarea>
            </div>
            <div class="form-group">
                <label for="description">Type indicateurs:</label>
               

                <select name="typeparam" class="form-control">
                    @foreach (config('parametres.TYPE_INDICATEURS') as $key => $value)
                        <option value="{{ $key }}" 
                        @isset($ratio->typeparam)
                            @if ($key == old('myselect', $ratio->typeparam))
                                selected="selected"
                            @endif
                        @endisset
                        >{{ $value }}</option>
                    @endforeach
                </select>

            </div>
            <div class="form-group">
                <div class="form-check">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" value="">Est Calculé(Formule) :
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="formule">Formule:</label>
                <textarea cols="5" rows="3" class="form-control" name="formule" >{{ old('formule') ?? $ratio->formule ?? null }}</textarea>
            </div>

        </div>

    </div>
   
    <hr/>
    <a href="{{ route('ratios.index')}}" class="btn btn-secondary">Retour</a>
    <button type="submit" class="btn btn-primary">Enregister</button>
</form>

