<header class="bg-dark text-white py-3">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <img src="{{ asset('Images/WOrk wise.png') }}" alt="Job Portal Logo" class="img-fluid" style="max-width: 80px;">
            </div>
            <h1 class="mx-auto">WorkWise</h1> 
            <div class="d-none d-lg-block">
                <span></span>
            </div>
        </div>

        <nav class="navbar navbar-expand-lg navbar-white">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('job-listings') }}">Job Listings</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about') }}">About Us</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>
