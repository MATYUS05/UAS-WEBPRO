<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Grow Community Church</title>

    <!-- Styles -->
    <link rel="icon" type="image/x-icon" href="/img/logo.png">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Figtree', sans-serif;
            margin: 0;
            padding: 0;
        }

        @keyframes wiggle {
        0%, 100% {
            transform: rotate(-3deg);
        }
        50% {
            transform: rotate(3deg);
        }
    }

    .animate-wiggle {
        animation: wiggle 0.5s infinite;
    }
        

        .bg-hitam{
            background-color: black;
        }
        .tulisan-hitam{
            color: black;
        }
        .hero {
            background: url('https://via.placeholder.com/1920x1080') no-repeat center center/cover;
            height: 70vh;
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }
        .section {
            padding: 50px 20px;
        }
        .footer {
            background-color: #2B263B;
            padding: 0;
        }
        .footer .top-line {
            background-color: #2B263B;
            height: 30px;
        }
        .footer .content {
            background-color: white;
            color: black;
            padding: 30px 0;
        }
        .footer h6 {
            font-weight: bold;
            margin-bottom: 15px;
            text-align: left;
        }
        .footer p {
            margin: 0;
            line-height: 1.6;
            text-align: left;
        }
        .footer .copyright {
            text-align: center;
            padding: 10px 0;
            background-color: #2B263B;
            color: white;
            font-size: 14px;
        }
        .navbar-brand img {
            height: 40px;
        }
        .btn-primary {
            background-color: #6c757d;
            border: none;
        }
        .btn-primary:hover {
            background-color: #5a6268;
        }
        .card img {
            height: 200px;
            object-fit: cover;
        }
        .marquee-container {
            overflow: hidden;
            white-space: nowrap;
        }
        .marquee-text {
            display: inline-block;
            animation: marquee 10s linear infinite;
        }
        @keyframes marquee {
            0% { transform: translateX(100%); }
            100% { transform: translateX(-100%); }
        }

        .welcome-section {
            max-width: 1200px;
            margin: 50px auto;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 40px;
            padding: 0 20px;
        }

        .welcome-section img {
            width: 100%;
            max-width: 300px;
            height: auto;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .welcome-section div {
            max-width: 600px;
            text-align: justify;
            line-height: 1.6;
        }

        .welcome-content h3 {
            font-size: 2em;
            margin-bottom: 20px;
            color: #333;
            text-align: center;
        }

        .welcome-content p {
            margin-bottom: 20px;
            font-size: 1.1em;
            line-height: 1.8;
            color: #666;
            text-align: justify;
        }

        .welcome-content .signature {
            font-style: italic;
            margin-top: 30px;
            text-align: center;
        }

        .pastors-slider-container {
            width: 100%;
            overflow: hidden;
            padding: 20px 0;
        }

        .pastors-slider {
            display: flex;
            animation: slideShow 20s linear infinite;
            gap: 30px;
            padding: 20px 0;
        }

        .pastor-card {
            flex: 0 0 auto;
            width: 300px;
            text-align: center;
            padding: 15px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        .pastor-card img {
            width: 100%;
            height: 300px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 15px;
        }

        @keyframes slideShow {
            0% {
                transform: translateX(0);
            }
            100% {
                transform: translateX(-50%);
            }
        }

        .pastors-slider-container:hover .pastors-slider {
            animation-play-state: paused;
        }

        @media (max-width: 768px) {
            .hero {
                height: 50vh;
                padding: 20px;
                text-align: center;
            }
            .welcome-section {
                flex-direction: column;
                text-align: center;
            }
            .welcome-section img {
                max-width: 200px;
            }
            .pastors-slider {
                gap: 10px;
            }
            .pastor-card {
                width: 250px;
            }
        }

        @media (max-width: 576px) {
            .hero {
                font-size: 0.9em;
            }
            .card img {
                height: auto;
            }
            .pastor-card {
                width: 200px;
            }
            .welcome-section img {
                max-width: 150px;
            }
            .footer h6 {
            font-size: 16px;
            }
            .footer p {
                font-size: 14px;
                line-height: 1.4;
            }
        }

        @media (max-width: 992px) {
        .footer .row {
            flex-direction: column;
            text-align: center;
        }
        .footer .col-md-3 {
            margin-bottom: 20px;
        }
        
    }

    </style>
</head>
<body>


    <!-- Header -->
    <header class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
    <div class="container">
        <a class="navbar-brand animate-wiggle " href="#">
            <img src="img/logo.png" alt="Logo" style="width: 50px; height: 50px;">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">SERVICE</a>
                </li>
            </ul>
        </div>
    </div>
</header>


   <!-- Hero Section -->
<div class="relative hero text-white text-center py-20 bg-cover bg-center" style="position: relative; background: url('/img/image.jpg') center/cover no-repeat;">
    <!-- Overlay -->
    <div style="position: absolute; inset: 0; background: rgba(0, 0, 0, 0.5);"></div>
    
    <!-- Content -->
    <div style="position: relative; z-index: 1;">
        <h1 class="text-4xl md:text-6xl font-bold">WELCOME TO</h1>
        <p class="text-lg md:text-2xl mt-4">GROW COMMUNITY CHURCH</p>
    </div>
</div>



    <!-- Locations Section -->
    <section class="section">
        <div class="container text-center">
            <div class="marquee-container">
                <div class="marquee-text">
                    <span style="text-decoration: underline; text-decoration-color: purple;">JOIN US EVERY SUNDAY</span> &nbsp;&nbsp;&nbsp; 
                    <span style="text-decoration: underline; text-decoration-color: purple;">JOIN US EVERY SUNDAY</span> &nbsp;&nbsp;&nbsp; 
                    <span style="text-decoration: underline; text-decoration-color: purple;">JOIN US EVERY SUNDAY</span> &nbsp;&nbsp;&nbsp;
                </div>
            </div>

            
            <div class="row mt-4">
                <div class="col-md-4 col-sm-6 mb-3">
                    <div class="card">
                        <img src="img/jakarta.jpg" class="card-img-top" alt="Jakarta">
                        <div class="card-body">
                            <h5 class="card-title"><u>GROW COMMUNITY JAKARTA</u></h5>
                            <p class="card-text">
                                <b>08:30 | 10:30 | 13:00 | 16:00 | 18:00 (WIB)</b><br>
                                <b>Pondok Indah Office Tower 6 Lantai 3</b><br>
                                Jl. Sultan Iskandar Muda No. 29, Pondok Pinang,<br>
                                Kebayoran Lama, Jakarta Selatan
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 mb-3">
                    <div class="card">
                        <img src="img/manado.jpg" class="card-img-top" alt="Manado">
                        <div class="card-body">
                            <h5 class="card-title"><u>GROW COMMUNITY MANADO</u></h5>
                            <p class="card-text">
                                <b>10:30 | 17:00 (WITA)</b><br>
                                <b>Star Square Mall, Lantai 5</b><br>
                                Jl. R.W. Monginsidi VI, Bahu, Kota Manado,<br>
                                Sulawesi Utara<br><br>
                                <b>09:00 (WITA)</b><br>
                                <b>The Sentra Hotel, Lantai 1</b><br>
                                Jl. IR Soekarno, Kab. Minahasa Utara,<br>
                                Sulawesi Utara
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 mb-3">
                    <div class="card">
                        <img src="img/bekasi.jpg" class="card-img-top" alt="Bekasi">
                        <div class="card-body">
                            <h5 class="card-title"><u>GROW COMMUNITY BEKASI</u></h5>
                            <p class="card-text">
                                <b>09:00 | 11:00 (WIB)</b><br>
                                <b>BTC City Mall, Lantai 4</b><br>
                                Jl. HM. Joyo Martono No. 30, Margahayu,<br>
                                Bekasi, Jawa Barat
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="welcome-section">
        <img src="img/1.jpg" alt="Welcome img">
        <div class="welcome-content">
            <h3>Hi, GC Family!</h3>
            <p>A very warm welcome to all of you from the pastoral team, leaders, and volunteers at Grow Community Church! We're so happy to have you join our community. We at Grow Community Church have been on this journey since 2015, following the Lord's dreams for this generation and this nation. We're so excited to see the rise of a generation that is hungry and thirsty for God, and bring transformation to the city and nation. We are here to prepare God's people to be the best they can be, and we do this with our GC 7.0 values as the pillars for our Community from Christ.</p>
            <p class="signature">We love you all,<br>Ps. Andy and Lia Tjokro</p>
        </div>
    </div>

    <section class="section bg-light">
        <div class="container text-center">
            <h2 style="text-align: left; font-weight: bold;">OUR PASTORS</h2>
            <div class="pastors-slider-container">
                <div class="pastors-slider">
                    <!-- First set of pastors -->
                    <div class="pastor-card">
                        <img src="img/1.jpg" alt="Ps. Andy & Lia Tjokro">
                        <h5><b>Ps. Andy & Lia Tjokro</b></h5>
                        <p>Lead Pastor of Grow Community Church</p>
                    </div>
                    <div class="pastor-card">
                        <img src="img/3.png" alt="Ps. Monty & Esther Montezuma">
                        <h5><b>Ps. Monty & Esther Montezuma</b></h5>
                        <p>Associate Pastor</p>
                    </div>
                    <div class="pastor-card">
                        <img src="img/2.jpg" alt="Ps. Donny Novianus & Zsa Zsa">
                        <h5><b>Ps. Donny Novianus & Zsa Zsa</b></h5>
                        <p>Associate Pastor</p>
                    </div>
                    <div class="pastor-card">
                        <img src="img/5.jpg" alt="Ps. Timothy & Grenata Oroh">
                        <h5><b>Ps. Timothy & Grenata Oroh</b></h5>
                        <p>Associate Pastor</p>
                    </div>
                    <div class="pastor-card">
                        <img src="img/4.jpg" alt="Ps. Billy Yosafat & Agistha Permula Aswan">
                    <h5><b>Ps. Billy Yosafat & Agistha Permula Aswan</b></h5>
                        <p>Associate Pastor</p>
                    </div>
                    
                    <!-- Duplicate set for seamless loop -->
                    <div class="pastor-card">
                        <img src="img/1.jpg" alt="Ps. Andy & Lia Tjokro">
                        <h5><b>Ps. Andy & Lia Tjokro</b></h5>
                        <p>Lead Pastor of Grow Community Church</p>
                    </div>
                    <div class="pastor-card">
                        <img src="img/3.png" alt="Ps. Monty & Esther Montezuma">
                        <h5><b>Ps. Monty & Esther Montezuma</b></h5>
                        <p>Associate Pastor</p>
                    </div>
                    <div class="pastor-card">
                        <img src="img/2.jpg" alt="Ps. Donny Novianus & Zsa Zsa">
                        <h5><b>Ps. Donny Novianus & Zsa Zsa</b></h5>
                        <p>Associate Pastor</p>
                    </div>
                    <div class="pastor-card">
                        <img src="img/5.jpg" alt="Ps. Timothy & Grenata Oroh">
                        <h5><b>Ps. Timothy & Grenata Oroh</b></h5>
                        <p>Associate Pastor</p>
                    </div>
                    <div class="pastor-card">
                        <img src="img/4.jpg" alt="Ps. Billy Yosafat & Agistha Permula Aswan">
                    <h5><b>Ps. Billy Yosafat & Agistha Permula Aswan</b></h5>
                        <p>Associate Pastor</p>
                    </div>
                </div>
            </div>
        </div>
        
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="top-line"></div>
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <h6>Contact Us</h6>
                        <p>gc.office@growcommunity.church<br>Gandaria 8 Office Tower Unit 001,<br>Jalan Sultan Iskandar Muda No 8,<br>Kebayoran Lama, Jakarta Selatan 12240</p>
                    </div>
                    <div class="col-md-3">
                        <h6>Information</h6>
                        <p>Counseling Hotline<br>Cool Hotline<br>Linktree<br>...</p>
                    </div>
                    <div class="col-md-3">
                        <h6>Media</h6>
                        <p>GC Instagram<br>GC Youtube<br>G.R.O.W Youtube<br>G.R.O.W Spotify</p>
                    </div>
                    <div class="col-md-3">
                        <h6>Service Request</h6>
                        <p>Prayer Request Form<br>Grateful Form<br>...</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright">&copy;2024 Grow Community Church</div>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
