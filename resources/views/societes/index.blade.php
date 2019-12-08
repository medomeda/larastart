@extends('layouts.app')

@section('content')
    <div class="page-title">
        <div class="container">
            <h2>Liste des sociétés</h2>
            <hr>
        </div>
    </div>
    <div class="container page-menu">
        <a href="{{ route('societes.create')}}" class="btn btn-primary">Create</a>
    </div>
    <div class="page-content mt-4">   
        <div class="container">

          
           <!-- @include('societes.table') -->
               


            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Name</td>
                        <td>Sigle</td>
                        <td style="width: 30%;">Actions</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($societes as $societe)
                    <tr>
                        <td>{{$societe->id}}</td>
                        <td>{{$societe->name}}</td>
                        <td>{{$societe->sigle}}</td>
                        <td>
                            <a href="{{ route('societes.edit', $societe->id)}}" class="btn btn-sm btn-primary">Edit</a>
                        
                            <a href="{{ route('societes.show', $societe->id)}}" class="btn btn-sm btn-secondary">Voir</a>
                        
                            <form action="{{ route('societes.destroy', $societe->id)}}" method="post" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
  
@endsection
