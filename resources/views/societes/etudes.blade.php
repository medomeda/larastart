@extends('layouts.app')

@section('content')
    <div class="page-title">
        <div class="container">
            <h2>Liste des études</h2>
            <hr>
        </div>
    </div>
    <div class="container page-menu">
        <a href="#" class="add btn btn-primary">Ajouter</a>
        <!-- Button trigger modal -->
        @include('societes.etudes-form', ['title' => $societe->name,'id' => $societe->id])
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Ajouter nouvel indicateur
        </button>
    </div>
    <div class="page-content mt-4">   
        <div class="container">      
            <div class="etudes-table">
                @include('societes.etudes-table')
            </div>
            
        </div>
    </div>
  
@endsection
@section('scripts')
<script>

    $(function(){
        
        $(document).on('click','.add', function(e){
            e.preventDefault();
            
        });

        $(document).on('click','.save', function(e){
            axios.post('/societes/etudesSave', {
                societe_id: $('#societe_id').val(),
                ratio_id: $("#ratio_id option:selected").val(),
                periode: $("#periode option:selected").val(),
                valeur: $("#valeur").val()
            })
            .then(function (response) {
                console.log(response);
                $('.etudes-table').html(response.data.html);
                $("#exampleModal").modal('hide');

            })
            .catch(function (error) {
                console.log(error);
            });
        });

    });

   
</script>
    
@endsection