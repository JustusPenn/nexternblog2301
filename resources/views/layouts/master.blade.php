<!doctype html>
<html lang="en">

<head>
  <title>Blog - @yield('title', 'All Articles')</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">

  <!-- FontAwesome v5 -->
  <link href="{{asset('css/all.css')}}" rel="stylesheet">


</head>

<body>
  <nav class="navbar navbar-expand-sm navbar-light bg-light">
      <div class="container">
        <a class="navbar-brand" href="{{ route('index')}}">Nexterns Blog</a>
        <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('index') }}" aria-current="page">Home <span class="visually-hidden">(current)</span></a>
                </li>
                @auth
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard') }}" >Dashboard</a>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link " href="{{ route('login') }}">Login </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}" >Register </a>
                </li>
                @endauth
            </ul>
        </div>
    </div>
  </nav>


  <main>
    @yield('content')
  </main>
  <footer>
    <!-- place footer here -->
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js">
  </script>

  <script src="{{ asset('js/bootstrap.min.js')}}">
  </script>
</body>

</html>
