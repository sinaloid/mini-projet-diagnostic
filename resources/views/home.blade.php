@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="font-weight-bold">
                            @if (Route::currentRouteName() === 'allQuestion')
                                <i class="fas fa-users mr-2"></i>Liste des questions <span class="float-right"><span>
                            @else
                                @if (Route::currentRouteName() === 'allUser')
                                    <i class="fas fa-users mr-2"></i>Liste des utilisateurs <span class="float-right"><span>
                                @else
                                    <i class="fas fa-users mr-2"></i>Liste des diagnostics <span class="float-right"><span>
                                @endif
                            @endif
                            
                            <div class="d-inline-block">
                                    <a href="{{route('allDiagnostic')}}" class="badge badge-lg btn sm-black btn-sm  ">liste</a>
                                    @php
                                         $idAdmin = App\Models\Option::all()->first();
                                        if(isset($idAdmin)){
                                            $isAdmin = ($idAdmin->user_id == auth()->user()->id) ? true : false;
                                        }
                                    @endphp
                                    @if ($isAdmin)
                                        <a href="{{route('allQuestion')}}" class="badge badge-lg btn sm-black btn-sm  ">questions</a>
                                        <a href="{{route('allUser')}}" class="badge badge-lg btn sm-black btn-sm ">utilisateurs</a>
                                    @endif
                            </div>
                        </h3>

                </div>

                <div class="card-body table-responsive">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (Route::currentRouteName() === 'allQuestion')
                        <a class="btn sm-black mb-3" href="{{route('question.create')}}">Creation/Modification</a>
                        @include('includes.question')
                    @else
                        @if (Route::currentRouteName() === 'allUser')
                            <a class="btn sm-black mb-3" href="{{route('user.create')}}">Creation/Modification</a>
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
