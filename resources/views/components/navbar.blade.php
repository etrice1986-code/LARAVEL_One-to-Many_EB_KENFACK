<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{route('home')}}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('product.index')}}">I miei prodotti</a>
        </li>
       <li class="nav-item">
         <a class="nav-link" href="{{route('article.index')}}">I miei articoli</a>
      </li>
      {{-- visibile solo se l'utente NON è autenticato --}}
@guest
<li class="nav-item">
    <a class="nav-link" href="{{route('register')}}">Registrati</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{route('login')}}">Accedi</a>
</li>

@endguest



{{-- visibile solo se l'utente È autenticato --}}
@auth
 <li class="nav-item">
    <a class="nav-link" href="{{route('product.create')}}">Crea prodotto</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{route('article.create')}}">Crea articolo</a>
  </li>


  
<li class="nav-item">
    <a class="nav-link" href="#">benvenuto' {{Auth::user()->name}}</a>
</li>
<li class="nav-item">
    <form action="{{route('logout')}}" method="POST">
        @csrf
        <button class="nav-link btn btn-link" type="submit">Logout</button>
    </form>
</li>
@endauth

        
      </ul>
    </div>
  </div>
</nav>