@extends('layouts.app')

@section('content')
    <div class="page-title">
        <div class="container">
            <h2>Graphique</h2>
            <hr>
        </div>
    </div>
    <div class="page-content mt-4">  
        <div class="container">       
         
            <div class="row">
                <div class="col-md-9">

                </div>
                <div class="col-md-3">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><a href="{{ route('societes.show',$societe->id)}}">Portrait</a></li>
                        <li class="list-group-item"><a href="{{ route('societes.analysefondamentale',$societe->id)}}">Analyse fondamentale</a></li>
                        <li class="list-group-item"><a href="{{ route('societes.analysetechnique',$societe->id)}}">Analyse technique</a></li>
                        <li class="list-group-item"><a href="{{ route('societes.graphique',$societe->id)}}">Graphique</a></li>
                        <li class="list-group-item"><a href="{{ route('societes.synthese',$societe->id)}}">Synthèse</a></li>
                      </ul>
                </div>
            </div>
           

        </div>
         
    </div>
  
@endsection
