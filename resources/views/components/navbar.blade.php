<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">   

        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('hompage')}}">Aulab Post</a>
        </li>    
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{route('article.index')}}">Tutti gli articoli</a>
      </li> 
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Inserisci un articolo</a>
              </li>
             <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="{{route('careers')}}">Lavora con noi</a>
             </li>
             <form action="{{route('article.search')}}" method="GET" class="d-flex" role="search">
              <input class="form-control me-2" type="search" name="query" placeholder="Cerca tra gli articoli..." aria-label="Search">
              <button class="btn btn-outline-secondary" type="submit">Cerca</button>
            </form>
          
          @auth
          @if (Auth::user()->is_admin)
            <li><a class="dropdown-item" href="{{route('admin.dashboard')}}">Dashboard Admin</a></li>
          @endif
          @if (Auth::user()->is_revisor)
            <li><a class="dropdown-item" href="{{route('revisor.dashboard')}}">Dashboard Revisor</a></li>
          @endif
          <li class="nav-item">
            <a class="nav-link" href="{{route('article.create')}}">Inserisci un articolo</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Benvenuto {{Auth::user()->name}}
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Profilo</a></li>
                 <li>
                   <hr class="dropdown-divider">
                  </li>
               <li><a class="dropdown-item" href="#" onclick="event.preventDefault(); document.queryselector('#forl-logout').submit(); ">Logout</a></li>
               <form action="{{route('logout')}}" method="POST" id="form-logout">
                @csrf
              </form>   

            </ul>
          </li>
          @endauth
          @guest
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Benvenuto Ospite
            </a>
            <ul class="dropdown-menu">
             <li><a class="dropdown-item" href="{{route('register')}}">Registrati</a></li>
             <li><a class="dropdown-item" href="{{route('login')}}">Accedi</a></li>
            </ul>
          </li>
          @endguest
        </ul>
          
        </ul>
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>