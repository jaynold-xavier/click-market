@extends('skeleton.index')


@section('content')
        @if (session()->has('succ_message'))
                <?php 
                        echo '
                                <div id="mess" class="alert alert-success">
                                        <strong>Success!</strong> ' . session()->get("succ_message") . '
                                        We went ahead a imported your pics from your website!!
                                </div>
                                <script>
                                        setTimeout(function(){ document.getElementById("mess").style.display = "none"; }, 3000);
                                </script>
                        ';
                ?>
        @endif
        {{-- <section id="mydetails">
                <div class="card" style="width: 30%; height: 50%">
                        <img class="card-img-top" src="{{$photographer['avatar']}}" alt="myavatar">
                        <div class="card-body">
                          <h4 class="card-title">{{$photographer['name']}}</h4>
                          <p class="card-text">{{$photographer['dt']}}</p>
                        </div>
                      </div>
        </section> --}}
        <section id="mydetails">
                <img src="{{$photographer['avatar']}}" alt="myavatar" style="border-radius: 50%" width="10%">
                <p>
                       <h2> {{$photographer['name']}} </h2>
                       <small class="text-muted"><i>DOB: {{$photographer['dt']}}</i></small> <br>
                       <small class="text-muted"><i>Website: {{$photographer['weblink']}}</i></small> <br>
                       <small class="text-muted"><i>Email: <a href="mailto:{{$photographer['email']}}">{{$photographer['email']}}</a></i></small>
                </p>

                <br>
                <hr style="border: 1px orangered solid">
                <br>

                @for ($i = 0, $cols = 3; $i < 12;)
                        <div class="row">
                        @for ($j = $i+$cols; $i < ($j); $i++)
                        <div class="col">
                                <div class="card text-warning bg-dark" onmouseover="showDetails()">
                                <img class="card-img-top" src="{{$data->images[$i]->url}}" alt="">
                                <aside id="picc" class="card-body">
                                        <span>SAdasd</span>
                                        <button type="button" class="btn btn-warning text-right" style="float: right">BUY</button>
                                </aside>
                                </div>
                        </div>
                        @endfor
                        </div>
                        <br>
                @endfor
        </section>
        
@endsection