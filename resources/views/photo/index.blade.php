@extends('skeleton.index')

@section('heading')
    {{$search}}
@endsection

@section('content')
    @for ($i = 0, $cols = 3; ;)
        <div class="row">
          @for ($j = $i+$cols; $i < ($j) && $i < count($data->images); $i++)
            <div class="col">
                <div class="card text-warning bg-dark" onmouseover="showDetails()">
                <img class="card-img-top" src="{{$data->images[$i]->url}}" alt="">
                    <aside id="picc" class="card-body" >
                        <h4 class="card-title">Site: {{$data->images[$i]->site}}</h4>
                    </aside>
                </div>
            </div>
          @endfor
        </div>
        <br>
    @endfor
    {{-- <script>
    function showDetails() {
        document.getElementById('picc').style.visibility = "visbile";
    }
    </script> --}}
@endsection