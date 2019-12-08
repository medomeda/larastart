@extends('layouts.app')

@section('content')
    <div class="page-title">
        <div class="container">
            <h2>Modifier société</h2>
            <hr>
        </div>
    </div>
    <div class="page-content mt-4">  
        <div class="container">       
         
            @include('societes.form',['route' => route('societes.update', $societe->id)])

        </div>
         
    </div>
  
@endsection
