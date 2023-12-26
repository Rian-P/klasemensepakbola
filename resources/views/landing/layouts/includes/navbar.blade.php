
<nav class="navbar navbar-expand-lg bg-body-tertiary shadow">
  <div class="container">
    <a class="navbar-brand" href="{{route('home.index')}}">Aptavis</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{route('klasemen.index')}}">Klasemen</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('dataklub.index')}}">data klub</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('score.index')}}">Input Skor KLub</a>
        </li>
      </ul>
      
    </div>
  </div>
</nav>