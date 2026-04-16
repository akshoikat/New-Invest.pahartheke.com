<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->

    <title>Pahar Theke</title>
    {{-- favicon --}}
    <link rel="shortcut icon" href="{{ $setting->favicon }}" type="image/x-icon">
    <!-- fontawesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- siliguri font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@300;400;500;600;700&family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet" />

    <!-- roboto font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet" />

    <!-- swiper css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!-- custom css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}" />


    <!-- Meta Pixel Code -->
    <script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window, document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '994412389332701');
    fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
    src="https://www.facebook.com/tr?id=994412389332701&ev=PageView&noscript=1"
    /></noscript>
    <!-- End Meta Pixel Code -->


    <style>
        .call-button {
            background-color: #28a745;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            text-decoration: none;
        }

        .responsive-img {
            width: 100%;
            height: 366px;

        }

        @media (max-width: 560px) {
            .responsive-img {
                width: 100%;
                height: auto;
            }
        }

        .product-item {
            border: none !important;
            padding: 0px !important;
        }

        .checkout-form {
            padding: 15px !important;
        }
    </style>

</head>

<body>
    <section class="hero-section">
        <!-- navbar start -->
        <nav class="navbar-aria">
            <div class="container">
                <div class="nav-layout">
                    <a class="logo" href="">
                        <img src="{{ $setting->logo }}" alt="logo" />
                    </a>
                    <div class="nav-middle-text">
                        <p> {{ $setting->website_title }}
                        </p>
                    </div>
                    <div class="nav-button">
                        <a href="tel:{{ $setting->phone }}">
                            <button style="width: 150px!important;">
                                <span style="color:white!important">📞</span> {{ $setting->phone }}
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </nav>
        <!-- navbar end -->
        <div class="hero-bg-overly"></div>
    </section>
    <section class="main-banner">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel" role="region"
            aria-label="Carousel">
            <div class="carousel-inner">
                @foreach ($banners as $banner)
                <div class="carousel-item @if ($loop->first) active @endif" role="group"
                    aria-label="Slide {{ $loop->index + 1 }}">
                    <img src="{{ $banner->image }}" class="d-block w-100" alt="Banner {{ $loop->index + 1 }}" />
                </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="prev" aria-label="Previous slide">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="next" aria-label="Next slide">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
            </button>
        </div>
    </section>


    <section class="highlight-section">
        <div class="container">
            <div class="highlight-layout">
                <div class="highlight-about">
                    <div class="highlight-title">
                        <h3><strong><b>আসসালামু আলাইকুম</b></strong></h3>
                    </div>
                    <p class="highlight-details" style="font-size: 18px; font-weight:bold;">
                        আপনি নিশ্চই এমন মোরগ-মুরগি খুজছেন যা আপনার বাসায় বাচ্চা, বয়স্ক সবার জন্য সমান ভাবে নিরাপদ। যা
                        গ্রোথ হরমন এবং অন্যান্য ক্ষতিকর উপদান মুক্ত। ওনেক খুজছেন কিন্তু ঘুরে ফিরে সেই ফিড খাওয়া মোরগ
                        মুরগি। অনেক কস্টে দেশি হলেও তাও হয়তো ফারমিং করা। সীমিত যায়গার কারনে খোলামেলা পরিবেশে ন্যাচারাল
                        খাবার খেয়ে বেড়ে ওঠা মুরগি একটু মুসকিল এবং রেয়ারই বটে। আমরা পাহাড় থেকে টিম দীর্ঘ ৫ বছর ধরে কাজ
                        করছি শুধুমাত্র পাহাড়ি দেশি মোরগ মুরগি নিয়ে যা হিলি চিকেন/ নেটিভ চিকেন নামে পরিচিত।<br> বড় জাতের
                        এই
                        হিলি মুরগি পাহাড়ি মুক্ত পরিবেশে জংলি ফলমূল, লতাপাতা, ঘাস, পোকামাকর খেয়ে বেড়ে ওঠে। তাই এই মুরগি
                        অত্তান্ত শক্তিশালী এবং সম্পূর্ণ রোগবালাই মুক্ত। দিতে হয়না কোন গ্রোথ হরমন বা ক্ষতিকর কোন উপাদান।
                        ঢাকায় সম্পূর্ণ ক্যাশ অন ডেলিভারিতে রেয়ার এই মুরগি পেতে অর্ডার করতে পারেন এখনি। ঢাকার বাইরে কিছু
                        জেলায় এই মুরগি লাইভ দেয়া যায় তবে সারা দেশে শুধুমাত্র ড্রেসিং ডেলিভারি দেয়া সম্ভব।
                        <!-- <p>আপনার কি চুল লম্বা বা কালো হচ্ছে না?</p> -->
                    </p>
                    <div class="highlight-button">
                        <a href="#orderlink">অর্ডার করুন</a>
                    </div>
                </div>
                <div class="highlight-video" style="height: 400px;">
                    <iframe src="https://www.youtube.com/embed/xadB0sIcYQ0?si=uDmFVt_vq1CwGEpq"> </iframe>
                    <h4 class="mb-3">Title: দেখে নিন কিভাবে এই মুরগি বেড়ে ওঠে। </h4>
                </div>
            </div>
            {{-- <div class="highlight-text">
                <strong>আমাদের অন্যান্য পন্য !</strong>
            </div>
            <div class="container mt-4">
                <div class="row">
                    @php
                    $repeat = [64, 74, 62, 67, 62, 67, 64, 74];
                    @endphp
                    @foreach ($affiliates as $key => $affiliate)
                    <div class="col-md-3 col-sm-6 mb-4">
                        <div class="card h-100">
                            <a href="{{ $affiliate->link }}">
                                <img src="{{ $affiliate->image }}" class="card-img-top"
                                    alt="{{ $affiliate->name }}">
                            </a>
                            <div class="card-body text-center">
                                <h5 class="card-title">{{ $affiliate->name }}</h5>
                                <span class="badge bg-success"
                                    style="font-weight: bold; font-size: calc(100% + 2px);">
                                    {{ $affiliate->repeat_customer }} %
                                </span>


                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div> --}}
            {{-- Why Chose Us --}}
            <div class="highlight-text">
                <strong>কেন আমাদের উপর আস্থা রেখে অর্ডার করবেন ?</strong>
            </div>

            <div class="feature-grid">
                <div class="features-list-wrapper">
                    <ul class="feature-list">
                        <li>
                            <span class="feature-list-icon"><i class="fa-solid fa-star"></i></span>
                            <span class="feature-list-text"> আমরা দীর্ঘ ৫ বছর ধরে কাজ করছি শুধুমাত্র পাহাড়ি পণ্য নিয়ে।
                                এর বাইরে আমাদের
                                কোন পণ্য নেই । তাই পাহাড়ি যে কোন পণ্য পেতে আমাদের উপর আস্তা রাখতে পারেন। </span>
                        </li>
                        <li>
                            <span class="feature-list-icon"><i class="fa-solid fa-star"></i></span>
                            <span class="feature-list-text"> আমাদের রিপিট কাস্টমার প্রায় ৭০-৮০ % যা বাংলাদেশেতো বটেই
                                পৃথিবীতেই
                                বিরল।</span>
                        </li>
                        <li>
                            <span class="feature-list-icon"><i class="fa-solid fa-star"></i></span>
                            <span class="feature-list-text"> নিজেদের তত্তাবধনেপার্বত্য অঞ্চলে বিভিন্ন পাড়া এবং
                                সাপ্তাহিক
                                হাট থেকে আমাদের এই মোরগ মুরগি সংগ্রহ করা হয়। আমাদের কোন সাপ্লায়ার নেই। তাই আমাদের পণ্য
                                শতভাগ
                                নিরাপদ। </span>
                        </li>
                        <li>
                            <span class="feature-list-icon"><i class="fa-solid fa-star"></i></span>
                            <span class="feature-list-text"> আমাদের রয়েছে রিপ্লেস রিফান্ড সুভিদা। তাই আপনার ঠকে যাওয়ার
                                কোন সুযোগই নেই।
                            </span>
                        </li>
                    </ul>
                </div>
                <!-- sliders -->

                <style>
                    .swiper-slide img {
                        height: 300px;
                        width: 300px;
                    }
                </style>
                <div class="feature-list-slider">
                    <div class="swiper  swiper2">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
                            <!-- Slides -->

                            <div class="swiper-slide">
                                <img src="{{ asset('frontend/img/product-2.jpg') }}" alt="" />
                            </div>
                            <div class="swiper-slide">
                                <img src="{{ asset('frontend/img/product-3.jpg') }}" alt="" />
                            </div>
                            <div class="swiper-slide">
                                <img src="{{ asset('frontend/img/product-4.jpg') }}" alt="" />
                            </div>
                            <div class="swiper-slide">
                                <img src="{{ asset('frontend/img/poduct-1.jpg') }}" alt="" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <!-- <div class="highlight-lg-text">
        <h2>আমাদের সকল পন্য বি এস টি আই পরিক্ষিত</h2>
      </div>
      <div class="highlight-button checkout-button">
        <a href="">অর্ডার করুন</a>
      </div> -->
            <!-- <div class="divide-border"></div> -->
            <!-- <div class="why-block">
        <h3 class="why-top-title">
          <strong>
            কেন আমাদের উপর আস্থা রেখে অর্ডার করবেন ?
          </strong>
        </h3>
        <h4 class="why-middle-text">কারণ আমরা শতভাগ প্রাকৃতিক ভেষজ উপাদানের সংমিশ্রণে নিজেস্ব ফ্যাক্টরিতে প্রস্তুতকৃত
          ডিয়ার ব্রান্ডের পণ্য বিক্রি করছি,যা বিএসটিআই অনুমোদিত তাই আমাদের পণ্যের কোন ধরনের পার্শপ্রতিক্রিয়া নেই।</h4>
        <h4 class="why-last-text">আমাদের ডিয়ার ব্রান্ডের পণ্য ডিয়ার হেয়ার অয়েল এ ব্যবহৃত কিছু ভেষজ উপাদানের নাম ও
          সংক্ষিপ্ত বিবরণ নিম্নে উল্লেখ করা হলো।</h4>
      </div> -->




            <div class="divide-border"></div>
            <div class="row p-none">
                <div class="features-text-item col-12 col-md-6 p-none">
                    <div class="features-texts-title">
                        <h3>আমাদের সোর্সিং </h3>
                    </div>
                    <div class="features-details">
                        {!! $source->our_source ?? "" !!}


                    </div>
                </div>
                <div class="features-text-item col-12 col-md-6 p-none mar">
                    <div class="features-texts-title">
                        <h3>ডেলিভারি প্রসেস
                        </h3>
                    </div>
                    <div class="features-details"> {!! $source->delivary_process ?? "" !!}
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section id="orderlink" class="checkout-section">
        <div class="container">
            <div class="checkout-form">
                <div class="form-top-title">
                    <strong>এখনই অর্ডার করুন </strong>
                </div>
                <div class="form-middle-text">
                    <strong>
                        অর্ডার করতে আপনার সঠিক তথ্য দিয়ে নিচের ফর্মটি সম্পূর্ণ পূরন করুন। (আগে থেকে কোন টাকা দেয়া লাগবে
                        না। প্রোডাক্ট হাতে পাবার পর টাকা দিবেন)
                        প্রয়োজনে কল করুন-

                    </strong>
                </div>
                <div class="form-number-text">
                    <strong>প্রয়োজনে কল করুন- {{ $setting->phone }}</strong>
                </div>
                <div class="checkout-label-text">
                    <p> আপনার পন্যটি নির্বাচন করুনঃ </p>
                </div>



                <div class="row">
                    <!-- Card 1 -->
                    @foreach ($products as $product)
                    <div style="text-align:center;" class="col-md-4 mb-4">
                        <div class="card">
                            <img src="{{ $product->thumb_url }}" class="card-img-top responsive-img"
                                alt="Product Image">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p class="card-text">{{ $product->discount_price }} BDT</p>
                                <a href="{{ route('frontend.checkout', $product->id) }}" class="btn"
                                    style="background-color: #023d02; color:white;">Order Now</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!-- image sizeing fixed -->
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- whatsapp  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <style>
        /* WhatsApp Floating Button */
        .whatsapp {
            width: 70px;
            height: 70px;
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #25d366;
            color: white;
            padding: 15px;
            border-radius: 50%;
            cursor: pointer;
            font-size: 30px;
            box-shadow: 0px 4px 10px rgba(214, 202, 202, 0.2);
            z-index: 1000;
            text-align: center;
        }

        /* Hidden Chat Box */
        .chat-box {
            display: none;
            position: fixed;
            bottom: 105px;
            right: 20px;
            width: 420px;
            padding: 10px 0;
            z-index: 999;


        }

        .custom-card {
            padding: 10px;
            border: none;
            background: #f4ecec;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);

        }

        .card-head {
            display: flex;
            align-items: center;
            background-color: #25d366;
            padding: 10px;
            color: white;
            border-radius: 10px 10px 0 0;
            padding: 47px 15px;
            margin-bottom: 30px;
        }

        .card-head .icon {
            margin-right: 10px;
        }

        .second-card {
            display: flex;
            align-items: center;
            gap: 12px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            padding: 10px;
            margin-top: 10px;
            border-left: 4px solid green;
            transition: transform 0.3s ease;
            margin: 10px 0;
        }

        .second-card:hover {
            transform: translateY(-5px);
        }

        .second-card a {
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
            color: black;
            width: 100%;
        }

        .second-card i {
            font-size: 24px;
            color: green;
        }

        .second-card p {
            margin: 0;
            font-size: 16px;
            font-weight: bold;
        }

        /* Responsive Design - Media Queries */
        @media (max-width: 576px) {

            /* Extra Small & Small Devices */
            .whatsapp {
                bottom: 15px;
                right: 15px;
                padding: 12px;
                font-size: 26px;
            }

            .chat-box {
                bottom: 70px;
                right: 10px;
                width: 280px;
            }

            .card-head {
                flex-direction: column;
                text-align: center;
            }

            .card-head .icon {
                margin-bottom: 10px;
            }

            .second-card {
                flex-direction: column;
                text-align: center;
            }
        }

        @media (max-width: 360px) {

            /* Very Small Phones */
            .whatsapp {
                bottom: 10px;
                right: 10px;
                padding: 10px;
                font-size: 22px;
            }

            .chat-box {
                bottom: 60px;
                right: 5px;
                width: 250px;
            }

            .card-head {
                font-size: 14px;
            }
        }
    </style>
    </head>

    <body>

        <!-- WhatsApp Floating Button -->
        <span class="whatsapp">
            <i style="font-size: 40px; padding-top: 1px;" class="fa-brands fa-whatsapp"></i>
        </span>

        <!-- Hidden Chat Box -->
        <div class="chat-box">
            <div class="row">
                <div class="col-md-12">
                    <div class="custom-card">
                        <div class="card-head">
                            <div class="icon">
                                <i style="color:#fff; font-size: 50px;" class="fa-brands fa-square-whatsapp"></i>
                            </div>
                            <div class="right-section">
                                <h5>Start a Conversation...</h5>
                                <p>Hi! Click below to chat on <b>WhatsApp</b></p>
                            </div>
                        </div>
                        <div class="second-card">
                            <a href="https://wa.me/+8801531532139?text=I'm%20interested%20in%20your%20car%20for%20sale" target="_blank">
                                <i style="font-size: 40px; padding: 10px 5px;" class="fa-brands fa-square-whatsapp"></i>
                                <p style="margin-left: 10px; flex-grow: 1;">Support</p>
                                <i style="font-size: 30px;" class="fa-brands fa-whatsapp"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <script>
            $(document).ready(function() {
                $(".whatsapp").click(function() {
                    $(".chat-box").toggle();
                });

                // Close chat box when clicking outside
                $(document).click(function(event) {
                    if (!$(event.target).closest(".whatsapp, .chat-box").length) {
                        $(".chat-box").hide();
                    }
                });
            });
        </script>



        <!-- end whatsap -->


        <!-- Footer Section -->

        <footer class="custom-bg-success text-white py-3">
            <div class="container">
                <div class="row">
                    <!-- Company Info -->
                    <div class="col-md-3 mb-4">
                        <h5 class="fw-bold mb-3">আমাদের সম্পর্কে</h5>
                        <p class="mb-1">{{ $setting->website_description }} </p>

                        <p class="mb-3">{{ $setting->address }} </p>
                        <div class="d-flex gap-2">
                            <button class="btn btn-outline-light btn-sm" style="font-size: 13px">
                                {{ $setting->phone }}

                            </button>
                            <button class="btn btn-outline-light btn-sm">
                                {{ $setting->email }}
                            </button>
                        </div>
                    </div>


                    <!-- Quick Links -->
                    <div class="col-md-3 mb-4 custom-quick-link">
                        <h5 class="fw-bold mb-3">দ্রুত লিংক</h5>
                        <ul class="list-unstyled">
                            <li class="mb-2"><a href="#" class="text-white text-decoration-none">আমাদের পণ্য</a>
                            </li>
                            <li class="mb-2"><a href="#" class="text-white text-decoration-none">অর্ডার করুন</a>
                            </li>
                            <li class="mb-2"><a href="#" class="text-white text-decoration-none">ডেলিভারি
                                    নীতি</a></li>
                            <li class="mb-2"><a href="#" class="text-white text-decoration-none">যোগাযোগ</a></li>
                        </ul>
                    </div>

                    <!-- Social Links -->
                    <div class="col-md-3 mb-4">
                        <h5 class="fw-bold mb-3">যোগাযোগ মাধ্যম</h5>
                        <div class="d-flex gap-3 mt-3">
                            <a href="{{ $setting->facebook_url }}" class="text-white"><i
                                    class="custom-icon  fab fa-facebook-f fs-4"></i></a>
                            <a href="{{ $setting->instagram_url }}" class="text-white"><i
                                    class="custom-icon  fab fa-instagram fs-4"></i></a>
                            <a href="{{ $setting->youtube_url }}" class="text-white"><i
                                    class="custom-icon  fab fa-youtube fs-4"></i></a>
                            <a href="{{ $setting->whatsapp_url }}" class="text-white"><i
                                    class="custom-icon  fab fa-whatsapp fs-4"></i></a>
                        </div>
                    </div>

                    <!-- Newsletter -->
                    <div class="col-md-3 mb-4">
                        <h5 class="fw-bold mb-3">নিউজলেটার</h5>
                        <p class="mb-3">নতুন পণ্য এবং অফার সম্পর্কে জানতে সাবস্ক্রাইব করুন</p>
                        <div class="input-group mb-3">
                            <input type="email" class="form-control" placeholder="আপনার ইমেইল">
                            <button style="background-color:#023d02; color:white;" class="btn btn-light"
                                type="button">সাবস্ক্রাইব</button>
                        </div>
                    </div>
                </div>

                <!-- Copyright -->
                <div class="row ">
                    <div class="col-12">
                        <hr class="border-light">
                        <p class="text-center mb-0">© 2025 পার্বত্য পণ্য। সর্বস্বত্ব সংরক্ষিত।</p>
                    </div>
                </div>
            </div>
        </footer>


        {{-- <footer class="footer">
        <div class="container">
            <div class="footer-layout">
                <div class="footer-brand">
                    <a href="#">
                        <img src="./img/logo.png" alt="">
                    </a>
                </div>
                <div class="contact-info-wrapper">
                    <h4>Contact info</h4>
                    <ul class="footer-link-list-wrapper">
                        <li class="footer-link-list">
                            <span class="footer-phone-text">Phone No:</span>
                            <ul class="number-list">
                                <li><a href="#">025463416354</a></li>
                                <li><a href="#">025463416354</a></li>
                                <li><a href="#">025463416354</a></li>
                            </ul>

                        </li>
                    </ul>
                    <ul class="footer-link-list-wrapper">
                        <li class="footer-link-list">
                            <span class="footer-phone-text">Social link:</span>
                            <ul class="number-list Social">
                                <li><a href="#">
                                        <i class="fa-brands fa-facebook"></i>
                                    </a></li>
                                <li><a href="#"><i class="fa-brands fa-youtube"></i></a></li>
                                <li><a href="#"><i class="fa-brands fa-whatsapp"></i></a></li>
                            </ul>

                        </li>
                    </ul>
                </div>
            </div>
            <!--  -->
            <div class="footer-bottom-aria">
                <span>All right reserved by Faisal | 2025</span>
                <div class="utility-links-wrap">
                    <a href="#">SHIPPING & DELIVERY</a>
                    <a href="#">REFUND & RETURN POLICY</a>
                </div>
            </div>
        </div>
    </footer> --}}


        <!-- Option 1: Bootstrap Bundle with Popper -->

        <script src="{{ asset('/frontend/js/jquery.min.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
            integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
            integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
        </script>

        <!-- swiper js -->
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

        <!-- custom js -->
        <script src="{{ asset('frontend/js/swiper.js') }}"></script>


        <script>
            $(document).ready(function() {
                $('.counter-plus').click(function() {
                    let thisPId = $(this).data('id');
                    let qtyInput = $(`#qty-input-${thisPId}`);
                    let qtyInputVal = $(`#qty-input-${thisPId}`).val();
                    let IncVal = parseInt(qtyInputVal) + 1;
                    qtyInput.val(IncVal);
                    notZero(thisPId);
                });
                $('.counter-minus').click(function() {
                    let thisPId = $(this).data('id');
                    let qtyInput = $(`#qty-input-${thisPId}`);
                    let qtyInputVal = $(`#qty-input-${thisPId}`).val();
                    let IncVal = parseInt(qtyInputVal) - 1;
                    qtyInput.val(IncVal);
                    notZero(thisPId);
                });


                function notZero(thisPId) {
                    let qtyInputVal = $(`#qty-input-${thisPId}`).val();
                    if (qtyInputVal < 0) {
                        $(`#qty-input-${thisPId}`).val(0);
                    }

                }
            });
        </script>
    </body>

</html>