@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>
                            @if (Route::currentRouteName() === 'question')
                                <i class="fas fa-users mr-2"></i>Liste des questions <span class="float-right"><strong>
                            @else
                                @if (Route::currentRouteName() === 'user')
                                    <i class="fas fa-users mr-2"></i>Liste des utilisateurs <span class="float-right"><strong>
                                @else
                                    <i class="fas fa-users mr-2"></i>Liste des Diagnostics <span class="float-right"><strong>
                                @endif
                            @endif
                            
                            <div class="d-inline-block">
                                    <a href="{{route('list_diagnostic')}}" class="badge badge-lg btn sm-black btn-sm  ">liste</a>
                                    <a href="{{route('question')}}" class="badge badge-lg btn sm-black btn-sm  ">questions</a>
                                    <a href="{{route('user')}}" class="badge badge-lg btn sm-black btn-sm ">utilisateurs</a>
                            </div>
                        </h3>

                </div>

                <div class="card-body table-responsive">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @foreach (['kkkk', 'ldlldl'] as $data)
                    @endforeach

                    @if (Route::currentRouteName() === 'question')
                        <a class="btn sm-black mb-3" href="{{route('question.create')}}">Creation/Modification</a>
                        @include('includes.question')
                    @else
                        @if (Route::currentRouteName() === 'user')
                            <a class="btn sm-black mb-3" href="{{route('createUser')}}">Creation/Modification</a>
                            @include('includes.user')
                        @else
                            <a class="btn sm-black mb-3" href="{{route('diagnostic')}}">Nouveau diagnostic</a>
                            @include('includes.list_diagnostic')
                        @endif
                    @endif
                    <div class="d-flex justify-content-center">
                        {{$datas->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
