@extends('layouts.app')

@section('content')
    <div class="page-title">
        <div class="container">
            <h2>Liste des ratios</h2>
            <hr>
        </div>
    </div>
    <div class="container page-menu">
        <a href="{{ route('ratios.create')}}" class="btn btn-primary">Create</a>
    </div>
    <div class="page-content mt-4">   
        <div class="container">
          
       
          <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Name</td>
                        <td>Abréviation</td>
                        <td>Type Ratio</td>
                        <td style="width: 15%;" class="text-center">Actions</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ratios as $ratio)
                    <tr>
                        <td>{{$ratio->id}}</td>
                        <td>{{$ratio->name}}</td>
                        <td>{{$ratio->abreviation}}</td>
                        <td>{{$ratio->typeparam}}</td>
                        <td class="text-center">
                            <a href="{{ route('ratios.edit', $ratio->id)}}" class="btn btn-sm btn-primary">Edit</a>
                            <a href="{{ route('ratios.show', $ratio->id)}}" class="btn btn-sm btn-secondary">Voir</a>
                            <form action="{{ route('ratios.destroy', $ratio->id)}}" method="post" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $ratios->links() }}

        </div>
    </div>
  
@endsection
