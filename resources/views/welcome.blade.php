@extends('layouts.app')

@section('title')
    Accueil
@endsection
@section('content')
<div class="col-12 col-md-6 col-lg-6">
    <img class="img-fluid" src={{ asset('img/img.png') }} height="400px" />
</div>
<div class="col-12 col-md-6 col-lg-6 my-3">
    <div class="card mx-auto">
        <div class="card-body ">
            <div class="card-text">
                <p class="p-0 my-0">
                    <span class="font-weight-bolder">
                        58.665
                    </span>
                    <span class="font-weight-lighter">utilisateurs testés aujourd'hui</span> 
                </p>
                <p class="p-0 my-0">
                    <span class="font-weight-lighter">Moy. Score de l'assertivité:</span> 
                    <span class="font-weight-bolder">
                        65
                    </span>
                </p>
            </div>
            <h1 class="card-title">
                Le test d'
                <span class="text-uppercase">
                    assertivité
                </span>
                en ligne le plus précis
            </h1>
            <h2 class="mb-2 text-muted card-title">
                Découvrez votre personnalité la plus dominante
            </h2>
            <div class="d-grid gap-2">
                <Button class="btn btn-call">
                    Trouvez votre niveau d'assertivité
                    maintenant 
                </Button>
            </div>
            <p class="card-text my-1">
                - Répondez à 60 questions
            </p>
            <p class=" card-text my-1">
                - Téléchargez le résultat au format PDF ou CSV
            </p>
        </div>
    </div>
</div>
@endsection
