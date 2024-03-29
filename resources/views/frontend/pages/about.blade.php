@extends('frontend.frontendLayout.mainLayout')
@push('title')
<title>about</title>

@endpush
@section('mainContent')
    <div class="breadcrumb-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>About</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <section class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <h2 class="mb-4">Our History</h2>
                    <p>We understand the challenges, goals and dynamics that come with building a brand, launching products
                        and generating leads that help grow your business. Find out more about our capabilities, products
                        and previous partnerships.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi provident quis optio fugiat, harum
                        sint. Labore animi esse quae, cumque molestias deserunt inventore optio soluta dicta minima placeat,
                        vel suscipit?</p>
                </div>
                <div class="col-lg-6 col-md-6">
                    <img src="images/news/news-02.jpg" alt="" class="img-fluid rounded">
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-lg-6 col-md-6">
                    <img src="images/news/news-03.jpg" alt="" class="img-fluid rounded">
                </div>
                <div class="col-lg-6 col-md-6">
                    <h2 class="mb-4">Our Mission</h2>
                    <p>We understand the challenges, goals and dynamics that come with building a brand, launching products
                        and generating leads that help grow your business. Find out more about our capabilities, products
                        and previous partnerships.</p>
                    <ul class="info-list">
                        <li>Building a brand</li>
                        <li>Launching products and generating leads</li>
                        <li>The challenges, goals and dynamics</li>
                        <li>Find out more about our capabilities</li>
                    </ul>

                </div>
            </div>
        </div>
    </section>


    <section class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="mb-5">
                        <h2>Our honorable members</h2>
                        <p>Team works that bind us together to get a good result.</p>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="team-block mb-5 mb-lg-0">
                        <img src="images/team/team-1.jpg" alt="" class="img-fluid rounded">

                        <div class="team-content mt-4">
                            <h3 class="title-large">Mark Jason</h3>
                            <p>CEO of newsbit</p>

                            <p>Minima, sapiente nostrum incidunt nisi quidem voluptatem voluptatibus itaque ex!</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4  col-md-6">
                    <div class="team-block mb-5 mb-lg-0">
                        <img src="images/team/team-2.jpg" alt="" class="img-fluid rounded">

                        <div class="team-content mt-4">
                            <h3 class="title-large">Jessica roy</h3>
                            <p>Senior Cheif Editor</p>

                            <p>Minima, sapiente nostrum incidunt nisi quidem voluptatem voluptatibus itaque ex!</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="team-block">
                        <img src="images/team/team-3.jpg" alt="" class="img-fluid rounded">

                        <div class="team-content mt-4">
                            <h3 class="title-large">Hasi watson</h3>
                            <p>Junior Editor</p>

                            <p>Minima, sapiente nostrum incidunt nisi quidem voluptatem voluptatibus itaque ex!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
