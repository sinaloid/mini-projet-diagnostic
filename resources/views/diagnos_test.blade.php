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
                <div id="progess" class="progress-bar" style="width:0%"><label id="pourcentage">0</label></div>
            </div>
        </div>
    </div>
    <div class="col-12 mt-3">
        <div class="card py-4 px-1 justify-content-center mx-auto card-width">
            <table class="table table-sm table-bordered mt-2 w-time-quest mx-auto">
                <tbody>
                    <tr>
                        <td class="col-6"><label id="question">1</label>/60</td>
                        <td class="d-flex">
                            <span class="ml-auto"><label id="minutes">00</label>:<label id="seconds">00</label>
                            </span>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="row">
                <div class="col-12">
                    <form id="reponse" action="" method="post">
                        @csrf
                        @foreach ($datas as $data)
                            @if ($i === 1)
                                <p id="{{$i}}" class="text-center card-text font-weight-bold" style="font-size: 1.4em">{{ $data->question }}</p>
                                @php
                                $i++;
                                @endphp
                            @else
                                <p id="{{$i}}" class="text-center card-text font-weight-bold" style="display:none; font-size: 1.4em">{{ $data->question }}</p>
                                @php
                                $i++;
                                @endphp
                            @endif
                            <input type="hidden" name="hidden_1" id="hidden" value="{{$data->categorie}}"/>
                        @endforeach
                        <input type="hidden" name="hidden_1" id="hidden_1" value="0" />
                        <input type="hidden" name="hidden_2" id="hidden_2" value="0" />
                        <input type="hidden" name="hidden_3" id="hidden_3" value="0" />
                        <input type="hidden" name="hidden_4" id="hidden_4" value="0" />
                        
                    </form>

                    <div class="text-center my-2">
                        <Button id="btn1" onclick="reponse(1)" class="btn sm-black">plutôt vrai</Button>
                        <Button id="btn2" onclick="reponse(0)" class="btn sm-black">plutôt faux</Button>
                    </div>
                </div>
            </div>
            
        </div>
        <div class="col-8 mx-auto mt-1 py-4 card">
            <div class="col-12 text-center">
                <a class="btn mt-2 sm-black" href="#">Voir les questions</a>
                <a class="btn mt-2 sm-black" href="#">Resultat pdf ou csv</a>
            </div>
        </div>
    </div>
    <script>
        var pourcentage = document.getElementById("pourcentage");
        var progess = document.getElementById("progess");
        var question = document.getElementById("question");
        var btn1 = document.getElementById("btn1");
        var btn2 = document.getElementById("btn2");

        var hidden = document.getElementById("hidden");
        var hidden_1 = document.getElementById("hidden_1");
        var hidden_2 = document.getElementById("hidden_2");
        var hidden_3 = document.getElementById("hidden_3");
        var hidden_4 = document.getElementById("hidden_4");

        var minutesLabel = document.getElementById("minutes");
        var secondsLabel = document.getElementById("seconds");
        var qst = 1;
        per = 1;
        var totalSeconds = 0;
        var time = setInterval(setTime, 1000);
        
        function setTime() {
            ++totalSeconds;
            secondsLabel.innerHTML = pad(totalSeconds % 60);
            minutesLabel.innerHTML = pad(parseInt(totalSeconds / 60));
            minute = totalSeconds / 60;
            if(minute === 20){
            clearInterval(time)
        }
        }

        function pad(val) {
            var valString = val + "";
            if (valString.length < 2) {
                return "0" + valString;
            } else {
                return valString;
            }
        }

        function reponse(val){
            if(qst < 60){
                qst++;
                per++;
                question.innerHTML = qst;
                tmp = (parseInt(per * 100 / 60)) + "%"
                pourcentage.innerHTML = tmp;
                progess.style.width = tmp

                if(hidden.value === 1){
                    hidden_1.value = hidden_1.value + 1;
                    document.getElementById("" + qst).style.display = "none";
                    document.getElementById("" + (qst + 1)).style.display = "block";
                    
                }else if(hidden.value === 2){
                    hidden_2.value = hidden_2.value + 1;     
                    document.getElementById("" + qst).style.display = "none";
                    document.getElementById("" + (qst + 1)).style.display = "block";
                }else if(hidden.value === 3){
                    hidden_3.value = hidden_3.value + 1;     
                    document.getElementById("" + qst).style.display = "none";
                    document.getElementById("" + (qst + 1)).style.display = "block";
                }else{
                    hidden_4.value = hidden_4.value + 1; 
                    document.getElementById("" + qst).style.display = "none";
                    document.getElementById("" + (qst + 1)).style.display = "block";    
                }
            }
            if(qst === 60){
                btn1.classList.add("disabled")
                btn2.classList.add("disabled")
            }
        }

    </script>
@endsection
