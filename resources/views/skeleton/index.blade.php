<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <link rel="shortcut icon" href="{{asset('images/icon/cam3.png')}}" type="image/x-icon">
        <link rel="stylesheet" href="{{ asset('styles/style.css') }}"/>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <title>CLICK MARKET</title>
</head>
<body>
        <nav class="navbar navbar-expand-sm navbar-dark" style="background-color: none;">
            <img src="/images/icon/piccam.png" alt="logo" width="200px" onclick="location.href='{{url('/')}}'" style="cursor: pointer;">
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                aria-expanded="false" aria-label="Toggle navigation"></button>
            <div class="collapse navbar-collapse" id="collapsibleNavId" style="white-space: nowrap">
                <ul id="mynav"  class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item @yield('about')">
                        <a class="nav-link" href="{{route('about')}}">About</a>
                    </li>
                    <li class="nav-item @yield('photo')">
                        <a class="nav-link" href="{{route('photographer.create')}}">Register</a>
                    </li>
                    <li class="nav-item @yield('photo')">
                        <a class="nav-link" href="{{route('photographer.index')}}" >Photographers</a>
                    </li>
                    <li class="nav-item @yield('photo')">
                        <a class="nav-link" href="{{route('photo.index')}}" >Contact Us</a>
                    </li>
                    {{-- <li class="nav-item dropdown" role="navigation">
                        <a class="nav-link dropdown-toggle" role="button" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Dropdown</a>
                        <div class="dropdown-menu" role="menu" aria-labelledby="dropdownId">
                            <a class="dropdown-item" href="#">Action 1</a>
                            <a class="dropdown-item" href="#">Action 2</a>
                        </div>
                    </li> --}}
                </ul>
                <form class="form-inline my-2 my-lg-0" name="frmsearch" style="width: 30%;">
                    <input class="form-control mr-sm-2" style="width: 80%;" required type="text" name="search" placeholder="Search Photos By Category">
                    <button class="btn btn-outline-primary my-2 my-sm-0" type="button" onclick="searchPhoto()">Search</button>
                </form>
            </div>
        </nav>

        <script>
            function searchPhoto() {
                var searchbar = document.frmsearch.search.value;
                if(searchbar != ""){
                    location.href="{{route('photo.index', ['search' => 'ser'])}}".replace('ser',searchbar);
                }else{
                    document.frmsearch.search.placeholder = "Please enter some search term";
                }
            }
        </script>
        
        <section style="padding: 1%">
            
            <div class="heading">
                <h1>@yield('heading')</h1>
            </div>

            <br>

            @yield('content')

            <br>
                        
            <div style="text-align: center">
                @yield('footer')
            </div>
         </section>
</body>
</html>