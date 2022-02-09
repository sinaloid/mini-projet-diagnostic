@extends('layouts.app')

@section('title')
    Diagnostic
@endsection

@section('content')
    <div class="col-12 mt-3">
        <div class="col-12 col-md-12">
            <div class="card justify-content-center mx-auto">
                <div class="card-body">
                    <h1 class="text-center card-title">
                        Prêt à commencer!
                    </h1>
                    <p class="text-center card-text">
                        1. Vous disposez de 20 minutes pour répondre aux
                        60 questions suivantes
                    </p>
                    <p class="text-center card-text">
                        2. Répondez spontanément en choisissant
                        <span class="font-weight-bolder">
                            plutôt vrai
                        </span>
                        ou
                        <span class="font-weight-bolder">
                            plutôt faux
                        </span>
                    </p>

                    <p class="text-center card-text my-2">
                        <a href="{{ route('test') }}" class="mx-auto btn btn-call">
                            Démarrez le Test
                        </a>
                    </p>
                </div>
            </div>
        </div>
        
    </div>
@endsection
