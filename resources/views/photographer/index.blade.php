@extends('skeleton.index')

@section('heading')
        PHOTOGRAPHERS
@endsection

@section('content')
        @if (session()->has('del_message'))
                <?php 
                echo '
                        <div id="mess" class="alert alert-danger">
                                <strong>Success!</strong> ' . session()->get("del_message") . '
                        </div>
                        <script>
                                setTimeout(function(){ document.getElementById("mess").style.display = "none"; }, 3000);
                        </script>
                ';
                ?>
        @endif
      @foreach ($data as $key => $item)
        <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center" 
                        onclick="location.href='{{route('photographer.show', ['photographer' => $key])}}'">
                        <div>
                                <img style="float: left" src="{{$item['avatar']}}" alt="avatar" width="20%">
                                <p style="float: left; margin-left: 3%">
                                        <strong>Name:</strong> {{$item['name']}}<br>
                                        <strong>Date Of Birth:</strong> {{$item['dt']}}
                                        <strong>Email:</strong> {{$item['email']}}<br>
                                        <strong>Mobile No:</strong> {{$item['phone']}}<br>
                                        <strong>Website:</strong> {{$item['weblink']}}  
                                </p>
                          </div>
                        <span class="badge">
                                <form action="{{route('photographer.index')}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="pkey" value="{{$key}}">
                                        <button type="submit" class="btn btn-danger"">DELETE</button>
                                </form>
                        </span>
                </li>
        </ul>
        <br>
      @endforeach
        
@endsection