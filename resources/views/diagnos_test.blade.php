




@extends('layouts.app')

@section('title')
    Diagnostic-test
@endsection

@section('script')
    
@endsection

@section('content')
<div class="progressBar col-12">
    <div class="w-80 mx-auto">
        <!--div class="w-5 d-inline-block"><span class="w-progres">Progrès </span></div-->
        <div class=" d-inline-block w-100">
            <div class="progress-bar" style="width:100%">70%</div>
        </div>
    </div>
</div>
<div class="col-12 mt-3">
    <div class="card py-4 px-1 justify-content-center mx-auto card-width">
        <table class="table table-bordered mt-2 w-time-quest mx-auto">
            <tbody>
            <tr>
                <td class="col-6">1/60</td>
                <td class="d-flex">
                    <span class="ml-auto">19:59</span>
                </td>
            </tr>
            </tbody>
        </table>
        <div class="row">
            <div class="col-12">
                <p class="text-center card-text">
                    Je préfère dissimuler ce que je pense ou
                    ressens si je connais la bien la personne
                </p class="text-center card-text">
                <div class="text-center my-2">
                    <Button class="btn btn-primary">plutôt vrai</Button>
                    <Button class="btn btn-primary">plutôt faux</Button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection