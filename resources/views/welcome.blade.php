@extends('layouts.app')

@section('content')
<header class="text-dark text-start py-5 mt-4 mt-md-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6">
                    <h1 class="d-none d-md-block display-5 fw-bold"><span class="text-primary">Welcome</span>, Angelenos!</h1>
                    <h2 class="d-md-none display-5 fw-bold"><span class="text-primary">Welcome</span>, Angelenos!</h2>
                    <p class="d-md-none">Discover opportunities waiting for you, whether you are an Employer or an aspiring Employee.</p>
                    <p class="d-none d-md-block">Discover opportunities waiting for you, whether you are an Employer or an aspiring Employee. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Rerum unde cupiditate sunt ducimus tempora illo aliquid! Corrupti, vel explicabo! Hic possimus, voluptas enim atque unde natus consectetur dolorem veritatis esse?</p>
                </div>
                <div class="d-none d-md-block col-md-6 bg-image my-2 py-5" style="background-image: url('{{ asset('images/tech-savvy-freelancer.jpg') }}'); 
                background-size: cover; 
                background-position: center; 
                height: 250px; 
                border-radius: 20px;">
                </div>
            </div>
            <div class="row d-none d-md-flex">
                <div class="col-md-auto">
                    <button class="btn btn-primary btn-large">Employ now!</button>
                </div>
                <div class="col-md-auto">
                    <button class="btn btn-primary btn-large">Apply now!</button>
                </div>
            </div>
            <div class="row mt-3 mt-md-5">
                <div class="col-12 col-md-6">
                    <form class="d-flex" role="search">
                        <input class="form-control me-2 border-2 border-dark" type="search" placeholder="Discover popular jobs..." aria-label="Search">
                        <button class="btn btn-primary" type="submit">Search</button> 
                    </form>
                </div>
            </div>
        </div>
    </header>
    <div class="container py-3">
        <div class="row">
            <div class="col-12 col-md-auto mx-auto">
                <h4 class="d-block d-md-none text-dark display-6 fw-bold">Popular&nbsp;<span class="text-primary">Services</span></h4>
                <h4 class="d-none d-md-block text-dark display-6 fw-bold">Popular&nbsp;<span class="text-primary">Services</span></h4>
            </div>
        </div>
        <div class="d-flex overflow-auto my-3 gap-3 flex-nowrap justify-content-md-center">
            <div class="card border-dark border-2 shadow-sm flex-shrink-0" style="flex: 1 1 auto; min-width: 50px; max-width: 180px; min-height: 200px; max-height: 270x;">
                <div class="card-body">
                    <img src="{{ asset('images/software-system.svg') }}" width="40" height="40" class="d-block mx-auto my-2">
                    <h6 class="card-title text-dark text-center">Delivery</h6>
                    <p class="card-text text-dark text-center">Lorem ipsum dolor sit, amet consectetur</p>
                </div>
            </div>
            <div class="card border-dark border-2 shadow-sm flex-shrink-0" style="flex: 1 1 auto; min-width: 50px; max-width: 180px; min-height: 200px; max-height: 270x;">
                <div class="card-body">
                    <img src="{{ asset('images/software-system.svg') }}" width="40" height="40" class="d-block mx-auto my-2">
                    <h6 class="card-title text-dark text-center">Software Design</h6>
                    <p class="card-text text-dark text-center">Lorem ipsum dolor sit, amet consectetur</p>
                </div>
            </div>
            <div class="card border-dark border-2 shadow-sm flex-shrink-0" style="flex: 1 1 auto; min-width: 50px; max-width: 180px; min-height: 200px; max-height: 270x;">
                <div class="card-body">
                    <img src="{{ asset('images/software-system.svg') }}" width="40" height="40" class="d-block mx-auto my-2">
                    <h6 class="card-title text-dark text-center">Construction</h6>
                    <p class="card-text text-dark text-center">Lorem ipsum dolor sit, amet consectetur</p>
                </div>
            </div>
            <div class="card border-dark border-2 shadow-sm flex-shrink-0" style="flex: 1 1 auto; min-width: 50px; max-width: 180px; min-height: 200px; max-height: 270x;">
                <div class="card-body">
                    <img src="{{ asset('images/software-system.svg') }}" width="40" height="40" class="d-block mx-auto my-2">
                    <h6 class="card-title text-dark text-center">Plumbing</h6>
                    <p class="card-text text-dark text-center">Lorem ipsum dolor sit, amet consectetur</p>
                </div>
            </div>
        </div>
    </div>
@endsection
