@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h2 class="text-center mb-4">About Us</h2>
    <div class="row">
        <div class="col-md-6">
            <img src="Images/WOrk wise.png" class="img-fluid rounded mb-4" alt="Our Mission">
        </div>
        <div class="col-md-6">
            <h3>Our Mission</h3>
            <p>We aim to connect job seekers with opportunities that match their skills and career aspirations. By making the job search process simple, transparent, and accessible, we help people build the future they envision.</p>

            <h3>Our Vision</h3>
            <p>To be the leading job portal that empowers individuals and organizations by simplifying the hiring process and making job opportunities accessible to everyone.</p>

            <h3 class="card-text">Founder & CEO</h3>
            <p>Muskan is dedicated to making job opportunities accessible to everyone and leads the company with a vision for growth and excellence.</p>
        </div>
    </div>

    <section id="contact" class="bg-light py-5">
        <div class="container">
            <h2 class="text-center">Get in Touch</h2>
            <p class="text-center">Contact us for any questions or inquiries</p>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <form>
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" id="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" id="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="message">Message:</label>
                            <textarea id="message" class="form-control" rows="5" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Send Message</button>
                    </form>
                </div>
                <div class="col-md-4 offset-md-1">
                    <h3>Contact Information</h3>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-map-marker-alt"></i> Address: Naval Colony, hbchs, Karachi</li>
                        <li><i class="fas fa-phone"></i> Phone: +92 3367390366</li>
                        <li><i class="fas fa-envelope"></i> Email: <a href="mailto:muskan@gmail.com.com">muskanvijay@gmail.com</a></li>
                    </ul>
                    <h3>Social Media</h3>
                    <ul class="list-inline">
                        <li class="list-inline-item"><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                        <li class="list-inline-item"><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                        <li class="list-inline-item"><a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <div class="text-center mt-5">
        <h3>Join Us on Our Journey</h3>
        <p>Whether you're a job seeker, an employer, or someone looking to make an impact, we're here to help you achieve your goals.</p>
        <a href="{{ route('home') }}" class="btn btn-primary">Explore Opportunities</a>
    </div>
</div>
@endsection
