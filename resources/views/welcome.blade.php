@extends('layouts.app')

@section('content')
<div class="container-fluid p-0">
    <nav class="navbar navbar-expand-md bg-white fixed-top shadow-sm">
        <div class="container">
            <a class="navbar-brand text-dark" href="{{ url('/') }}">Quest Hunt</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link text-dark" href="{{ route('login') }}">Post</a></li>
                    <li class="nav-item"><a class="nav-link text-dark" href="{{ route('login') }}">Apply</a></li>
                    <li class="nav-item"><a class="nav-link text-danger" href="{{ route('register') }}">Join</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <header class="text-dark py-5 mt-4 mt-md-5 bg-white">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="d-none d-md-block display-5 fw-bold text-center">Welcome, Angelenos!</h1>
                    <h2 class="d-md-none display-5 fw-bold">Welcome, Angelenos!</h2>
                    <p class="d-md-none">Discover opportunities waiting for you, whether you are an Employer or an aspiring Employee.</p>
                    <p class="d-none d-md-block text-center">Discover opportunities waiting for you, whether you are an Employer or an aspiring Employee. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Rerum unde cupiditate sunt ducimus tempora illo aliquid! Corrupti, vel explicabo! Hic possimus, voluptas enim atque unde natus consectetur dolorem veritatis esse?</p>
                </div>
            </div>
            
            <div class="row">
                <div class="col-12">
                    <form class="d-flex" role="search">
                        <input class="form-control me-2 border-1 border-dark" type="search" placeholder="Discover popular jobs..." aria-label="Search">
                        <button class="btn btn-danger" type="submit">Search</button> 
                    </form>
                </div>
            </div>
        </div>
    </header>

    <div id="carouselcontent" class="container carousel slide py-3 mb-3" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-md-7">
                            <h1 class="text-dark display-6 fw-bold">Become an Employer</h1>
                            <p class="text-dark">Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus fuga dignissimos autem culpa quas aperiam, incidunt animi velit esse ex, ipsa quisquam voluptas omnis repudiandae necessitatibus? Incidunt tempore perferendis ea. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolores ratione sunt voluptatibus cum dolorum alias, quisquam veritatis, laborum, perferendis exercitationem eligendi illum omnis eum rem incidunt voluptates? Ipsum, nihil autem?</p>
                            <button onclick="window.location.href='{{ route('login') }}';" class="btn btn-danger w-50">Employ now!</button>
                        </div>
                        <div class="col-md-5 d-none d-md-block" style="background-image: url('{{ asset('images/427871806_948960113530614_2763071840680278191_n.jpg') }}'); 
                        background-size: cover; 
                        background-position: center;
                        background-repeat: no-repeat;
                        border-radius: 20px;"></div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-md-7">
                            <h1 class="text-dark display-6 fw-bold">Become an Employee</h1>
                            <p class="text-dark">Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus fuga dignissimos autem culpa quas aperiam, incidunt animi velit esse ex, ipsa quisquam voluptas omnis repudiandae necessitatibus? Incidunt tempore perferendis ea. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolores ratione sunt voluptatibus cum dolorum alias, quisquam veritatis, laborum, perferendis exercitationem eligendi illum omnis eum rem incidunt voluptates? Ipsum, nihil autem?</p>
                            <button onclick="window.location.href='{{ route('register') }}';" class="btn btn-danger w-50">Apply now!</button>
                        </div>
                        <div class="col-md-5 d-none d-md-block" style="background-image: url('{{ asset('images/490790031_1610160639644167_3002709841025943956_n.jpg') }}'); 
                        background-size: cover; 
                        background-position: center;
                        background-repeat: no-repeat;
                        border-radius: 20px;"></div>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselcontent" data-bs-slide="prev">
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselcontent" data-bs-slide="next">
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <footer class="py-3 mb-3 text-center fixed-bottom">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="display-6 text-dark fw-bold text-center d-none d-md-block">Join the&nbsp;<span class="text-dark">Community</span></h1>
                    <p class="text-center d-none d-md-block text-dark">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum minima eos fuga quis asperiores. Facere repellendus consequuntur, dignissimos magnam aspernatur eaque adipisci inventore delectus ut impedit placeat eum nostrum esse.</p>
                    <h1 class="display-6 text-dark fw-bold text-start d-block d-md-none">Join the&nbsp;<span class="text-dark">Community</span></h1>
                    <p class="text-start d-block d-md-none text-dark">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum minima eos fuga quis asperiores. Facere repellendus consequuntur, dignissimos magnam aspernatur eaque adipisci inventore delectus ut impedit placeat eum nostrum esse.</p>
                    <button class="btn btn-danger w-50" onclick="window.location.href='{{ route('register') }}';">Join now!</button>
                </div>
            </div>
        </div>
    </footer>
</div>
@endsection
