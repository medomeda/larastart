@extends('layouts.app')

@section('content')
    <div class="page-title">
        <div class="container">
            <h2>Modifier ratio</h2>
            <hr>
        </div>
    </div>
    <div class="page-content mt-4">  
        <div class="container">       
         
            @include('ratios.form',['route' => route('ratios.update', $ratio->id)])

        </div>
         
    </div>
  
@endsection
