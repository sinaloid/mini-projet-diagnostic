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
                        Votre résultat est Prêt !
                    </h1>
                    <p class="text-center card-text">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                        Provident ex corrupti voluptates? Assumenda magni nihil dicta 
                        officia magnam eos, quibusdam odit quam tempore cupiditate quae 
                        reprehenderit voluptatem iure quod ut?
                    </p>
                    <div class="col-12 mx-auto mt-1 py-4">
                        <div class="col-12 text-center">
                            <div>
                                <canvas id="myChart"></canvas>
                            </div>
                        </div>
                    </div>
                    <p class="text-center card-text my-2">
                        <a href="{{route('resultat_pdf', $datas)}}" class="mx-auto btn btn-call">
                            Télécharger en pdf
                        </a>
                    </p>
                </div>
            </div>
        </div>

        <script>
            var res1 = {{$datas['hidden_1']}}
            var res2 = {{$datas['hidden_2']}}
            var res3 = {{$datas['hidden_3']}}
            var res4 = {{$datas['hidden_4']}}
             myData = {
            labels: [
                'attitude de fuite',
                'attitude d\'attaque',
                'attitude de manipulation',
                'attitude assertive',
            ],
            datasets: [{
                label: "",
                fill: false,
                backgroundColor: 'rgb(190, 99, 255, 0.6)',
                borderColor: 'rgb(190, 99, 255)',
                data: [res1, res2, res3, res4],
            }],
            options: {}
        };

        var ctx = document.getElementById('myChart');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: myData
        });
        var image = myChart.toBase64Image()
        console.log(image)
        </script>
        
    </div>
@endsection
