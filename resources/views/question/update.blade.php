@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Creation d'une question
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('question.update', $question->id) }}">
                            @csrf
                            @method('put')
                            <div class="row mb-3">
                                <label for="categorie" class="col-md-4 col-form-label text-md-end">Categorie</label>

                                <div class="col-md-6">
                                    <select class="form-control @error('categorie') is-invalid @enderror" name="categorie"
                                        required id="categorie" value="{{$question->id_categorie}}">
                                        <option value="1">Attitude de fuite/passivité</option>
                                        <option value="2">Attitude d'attaque/agressivité</option>
                                        <option value="3">Attitude de Manipulation</option>
                                        <option value="4">Attitude assertive</option>
                                    </select>
                                    @error('categorie')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="question" class="col-md-4 col-form-label text-md-end">Question</label>

                                <div class="col-md-6">
                                    <input id="question" type="text"
                                        class="form-control @error('question') is-invalid @enderror" name="question"
                                        value="{{$question->question}}" required autocomplete="text" autofocus>

                                    @error('question')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Enregistrer
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
