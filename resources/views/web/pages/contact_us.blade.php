@extends('web.layouts.main')
@section('content')
    <style>
        body {
            background-color:  #252926; /* Dark greenish background */
            color: #615339; /* Gold color */
            font-family: 'Arial', sans-serif;
        }

        .hero.page-inner {
            background-color: transparent!important; /* Same dark background for hero */
        }

        .heading, .breadcrumb-item a {
            color: #615339; /* Gold color for headings */
        }

        .contact-info h4, .contact-info p, .form-control, .btn-primary {
            color: #615339;
            background-color:  #252926;
            border-color: #615339; /* Matching border color */
        }

        .form-control::placeholder {
            color: #615339;
        }

        .btn-primary {
            background-color: #af8c53!important;
            border: none;
        }

        .btn-primary:hover {
            background-color: #af8c53; /* Lighter gold on hover */
        }

        /* Style for the contact form */
        .contact-info i {
            color: #615339;
        }

        .open-hours, .address, .email, .phone {
            border-left: 2px solid #615339 !important;
            padding-left: 15px;
        }
    </style>

<div class="hero page-inner overlay" style="background-image: url('public/assets/web/images/other-page-top.jpg')">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-9 text-center mt-5">
                <h1 class="heading" data-aos="fade-up">Contact Us</h1>
                <nav aria-label="breadcrumb" data-aos="fade-up" data-aos-delay="200">
                    <ol class="breadcrumb text-center justify-content-center">
                        <li class="breadcrumb-item">
                            <a href="index.html">Home</a>
                        </li>
                        <li class="breadcrumb-item active text-white-50" aria-current="page">
                            Contact
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

    <section class="section">
        <div class="container">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d235851.18194697573!2d88.03549638387557!3d22.535126916826798!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39f882db4908f667%3A0x43e330e68f6c2cbc!2sKolkata%2C%20West%20Bengal!5e0!3m2!1sen!2sin!4v1711121406664!5m2!1sen!2sin"
                width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>

    <div class="section pt-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="100">
                    <div class="contact-info">
                        <div class="address mt-2">
                            <i class="icon-room"></i>
                            <h4 class="mb-2">Location:</h4>
                            <p>{{ $contact->location }}</p>
                        </div>
                        <div class="open-hours mt-4">
                            <i class="icon-clock-o"></i>
                            <h4 class="mb-2">Open Hours:</h4>
                            <p>
                                Monday-Friday: <br> 10:00 AM - 8 PM
                            </p>
                        </div>
                        <div class="email mt-4">
                            <i class="icon-envelope"></i>
                            <h4 class="mb-2">Email:</h4>
                            <p>{{ $contact->email }}</p>
                        </div>
                        <div class="phone mt-4">
                            <i class="icon-phone"></i>
                            <h4 class="mb-2">Call:</h4>
                            <p>{{ $contact->call }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">
                    <form action="{{ URL::To('contact-query') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-6 mb-3">
                                <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                            </div>
                            <div class="col-6 mb-3">
                                <input type="email" name="email" class="form-control" placeholder="Your Email" required>
                            </div>
                            <div class="col-12 mb-3">
                                <input type="text" name="subject" class="form-control" placeholder="Subject" required>
                            </div>
                            <div class="col-12 mb-3">
                                <textarea name="message" cols="30" rows="7" class="form-control" placeholder="Message" required></textarea>
                            </div>
                            <div class="col-12">
                                <input type="submit" value="Send Message" class="btn btn-primary">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
