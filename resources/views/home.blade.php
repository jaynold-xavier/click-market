@extends('skeleton.index')

@section('home') active @endsection

@section('content')
    <div id="cont" style="text-align: center;">
        <br>
        <div class="col-xs-6-12">
            <div class="row">
                <div class="col-sm">
                    <img src="images/post1.jpg" id="post1" width="200px" alt="" style="opacity: 0.5;">
                </div>
                <div class="col-sm">
                    <span id="banner-text">TRADE YOUR<br>PHOTOGRAPHS<br>WITH THE<br>WORLD</span>
                </div>
                <div class="col-sm">
                    <img src="images/post2.jpg" id="post2" width="200px" alt="" style="opacity: 0.5;">
                </div>
            </div>
            <br>
            <h5>Get inspired with incredible photos from diverse styles and <br>
                genres around the world. We're not guided by fads—just great photography.</h5>
            <br>
            <span>
                <div class="row">
                    <div class="col-sm">
                        <h3>GET STARTED!</h3>
                        <button type="button" id="signup-btn" onclick="location.href='{{route('photographer.create')}}'" class="btn btn-light" onmouseover="btn_hovered('post1')" onmouseout="btn_blured('post1')" btn-lg btn-block>SIGN UP</button>
                    </div>
                    <div class="col-sm">
                        <img src="images/icon/cam.png" alt="cam_icon" width="100px">
                    </div>
                    <div class="col-sm">
                        <h3>CONTINUE TRADING!</h3>
                        <button type="button" id="signup-btn" onmouseover="btn_hovered('post2')" onmouseout="btn_blured('post2')" class="btn btn-dark" btn-lg btn-block">LOGIN</button>         
                    </div>
                  </div>
            </span>
        </div>
    </div>
    <script>
        function btn_hovered(pic){
            document.getElementById(pic).style.opacity = 1.0
            document.getElementById(pic).style.marginTop = "50px"
        }

        function btn_blured(pic){
            document.getElementById(pic).style.opacity = 0.5
            document.getElementById(pic).style.marginTop = "0%"
        }
    </script>
@endsection