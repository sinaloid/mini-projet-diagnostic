@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>
                            <i class="fas fa-users mr-2"></i>List des Diagnostics <span class="float-right"><strong>
                                <div class="d-inline-block">
                                    <span class="badge badge-lg btn sm-black btn-sm  ">questions</span></strong></span>
                                    <span class="badge badge-lg btn sm-black btn-sm ">utilisateurs</span></strong></span>
                                </div>
                        </h3>

                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
