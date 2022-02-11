@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <span class="badge badge-lg bgd-secondary text-white">#Créer par:</span>
                        <span class="font-weight-bolder py-2">{{ $question->user()->first()->name }}</span>
                    </div>

                    <div class="card-body text-center">
                        <div class="col-12 text-center">
                            <p>{{ $question->question }}</p>
                        </div>
                        <a class="btn sm-black mt-2" href="{{route('question.edit', $question->slug)}}"> Modifier</a>
                        <a class="btn sm-black mt-2" href="{{route('allQuestion')}}"> Retour</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
