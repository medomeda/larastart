   
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
            <div class="form-group">
                <label>Logo</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="customFile">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
            </div>
            <div class="form-group text-center">
                <img id ="preview" src="" alt="logo société" style="width: 150px; height: 150px;">
                <button class="btn btn-danger btn-block del">Supprimer</button>
            </div>

    

            <input type="file" multiple id="gallery-photo-add">
            <div class="gallery"></div>


        </div>

       
      
    </div>
   
    <hr/>
    <a href="{{ route('societes.index')}}" class="btn btn-secondary">Retour</a>
    <button type="submit" class="btn btn-primary">Enregister</button>
</form>

@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


<script>

    $(function(){
        $('#customFile').on('change', (e) => {
            let that = e.currentTarget
            if (that.files && that.files[0]) {
                $(that).next('.custom-file-label').html(that.files[0].name)
                let reader = new FileReader()
                reader.onload = (e) => {
                    $('#preview').attr('src', e.target.result)
                }
                reader.readAsDataURL(that.files[0])
            }
        })
        $('.del').on('click', (e) => {
            e.preventDefault();
            $('#preview').attr('src', null)
        });

         // Multiple images preview in browser
        var imagesPreview = function(input, placeToInsertImagePreview) {

            if (input.files) {
                var filesAmount = input.files.length;

                for (i = 0; i < filesAmount; i++) {
                    var reader = new FileReader();

                    reader.onload = function(event) {
                        $($.parseHTML('<img>'))
                        .attr('src', event.target.result)
                        .css({"width":"150px","height":"150px"})
                        .appendTo(placeToInsertImagePreview);
                    }

                    reader.readAsDataURL(input.files[i]);
                }
            }

        };

        $('#gallery-photo-add').on('change', function() {
            imagesPreview(this, 'div.gallery');
        });


    });


</script>
    
@endsection