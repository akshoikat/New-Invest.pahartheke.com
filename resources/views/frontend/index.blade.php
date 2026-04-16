<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ @$setting->website_name ?? 'Ecommerce' }}</title>
    <link rel="icon" type="image/x-icon" href="{{asset(@$setting->favicon)}}"/>
    <!-- bootstrap 5.3 Cdn -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />

    <!-- jqury cdn link -->
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
      integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>

    <!-- custom fonts link -->
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap"
      rel="stylesheet" />

    <!-- font awesome cdn -->
    <link  rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
      integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer" />
    <!-- brands link -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
    />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css" />
    

    <!-- swiper slider cdn -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <!-- custom css -->
    <link rel="stylesheet" href="{{asset("frontend/css/style.css")}}" />
  </head>

  <body>
    <!-- navbar start -->
    <nav class="navbar navbar-expand-lg">
      <div class="container">
        <a class="navbar-brand" href="#">
          <img style="width:100px" src="{{asset($setting->logo_url)}}" alt="Logo here" />
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav d-flex align-items-center me-auto mb-2 mb-lg-0">
            @php
                $fiveCategories = $categories->take(5)
            @endphp

            @foreach ($fiveCategories as $category)
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="#">{{$category->name}}</a>
            </li>
            @endforeach
          </ul>
          {{-- <form class="d-flex align-items-center" role="search">
            <!-- if you use this input  -->
            <input
              class="form-control d-none"
              type="search"
              placeholder="Search"
              aria-label="Search"
            />
            <div class="nav-search-icon">
              <i class="fa-solid fa-magnifying-glass"></i>
            </div>
          </form> --}}
        </div>
      </div>
    </nav>
    <!-- navbar end -->

    <!-- hero section start -->

    <!-- swiper slider start -->
    <div class="swiper">
      <!-- Additional required wrapper -->
      <div class="swiper-wrapper">
        <!-- Slider item 1 -->
        @foreach ($sliders as $slider)
        <div class="swiper-slide">
          <div class="slider-main-wrapper">
            <img
              src="{{asset($slider->image)}}"
              class="d-block w-100"
              alt="slideshow1"
            />
            <!-- hero title aria -->
            <div class="slider-contents-wrapper">
              <div class="hero-title-aria">
                <div class="top-sub-title">{{$slider->title}}</div>
                <h2 class="hero-main-title">{{$slider->sub_title}}</h2>
              </div>
              <!-- price aria -->
              <div class="price-wrapper">
                <div>
                  <div class="top-sub-price">Starting at ${{$slider->starting_price}}</div>
                  <h2 class="main-price">
                    ${{$slider->discount_price}}
                    <span class="old-price"> ${{$slider->reguler_price}} </span>
                  </h2>
                </div>

                {{-- @dd(@$slider->shop_now) --}}

                <div class="buttons-wrapper">
                  {{-- <button class="button-primary">read more</button> --}}
                  @if ($slider->shop_now['name'])
                  <a href="{{@$slider->shop_now['link']}}" class="button-primary button-outline">
                    {{@$slider->shop_now['name']}}
                  </a>
                  @endif
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
      <!-- If we need pagination -->
      <div class="swiper-pagination"></div>

      <!-- If we need navigation buttons -->
      <div class="swiper-button-prev"></div>
      <div class="swiper-button-next"></div>
    </div>
    <!-- swiper slider end -->

    <!-- hero section end -->

    <!-- features section start -->
    <section class="services-section">
      <div class="container">
        <div class="services-grid">
          <div class="service-box">
            <div class="service-box-icon">
              <i class="fa-solid fa-truck"></i>
            </div>
            <div class="service-box-body">
              <h3>Free delivery</h3>
              <p>Cras pellentesque, nisi ac tempus pellentesqna</p>
            </div>
          </div>
          <div class="service-box">
            <div class="service-box-icon">
              <i class="fa-solid fa-headset"></i>
            </div>
            <div class="service-box-body">
              <h3>24/h support</h3>
              <p>Pellenteque habitant morbi senectus et netus et male</p>
            </div>
          </div>
          <div class="service-box">
            <div class="service-box-icon">
              <i class="fa-solid fa-lock"></i>
            </div>
            <div class="service-box-body">
              <h3>30 - Day returns</h3>
              <p>In nec erat elementum, et venenatis purus nec</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- features section end -->

    <!-- products section start -->
    <section class="products-section">
      <div class="container">
        <div class="d-flex flex-column products-block">
          <ul
            class="nav nav-tabs d-flex justify-content-center align-items-center border-0"
            id="myTab"
            role="tablist"
          >
            <li class="nav-item tab-in">
              <button
                class="nav-link tab-text active"
                id="all"
                data-bs-toggle="tab"
                type="button"
                role="tab"
                aria-controls="category"
                aria-selected="true"
                onclick="getProductByCategory('all')"
              >
                All
              </button> 
            </li>
            @foreach ($categories as $category)
            <li class="nav-item tab-in">
              <button  onclick="getProductByCategory('{{$category->id}}')" class="nav-link tab-text"
                id="category-tab"
                data-bs-toggle="tab"
                type="button"
                role="tab"
                aria-controls="category"
                aria-selected="true"
                >
                {{$category->name}}
              </button>
            </li>
            @endforeach
          </ul>

          <div class="tab-content" id="myTabContent">
            <div class="" >
              <div id="productGrid" class="products-grid">
                <!-- product item -->
              </div>

              <div id="noProductMessage" class="d-flex justify-content-center d-none">
                <h4>No Product Found</h4>
              </div>

              <div id="spinner" class="d-flex justify-content-center d-none">
                <div class="spinner-grow spinner-grow-sm" style="color: #F33535" role="status">
                  <span class="visually-hidden">Loading...</span>
                </div>
                <div class="spinner-grow spinner-grow-sm" style="color: #F33535" role="status">
                  <span class="visually-hidden">Loading...</span>
                </div>
                <div class="spinner-grow spinner-grow-sm" style="color: #F33535" role="status">
                  <span class="visually-hidden">Loading...</span>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- products section end -->

    <!-- marketing section start -->
    <section class="marketing-section">
      <div class="container">
        <div class="row p-0">
          @foreach ($banners as $banner)
          <div class="col-sm-12 col-lg-6 p-0">
            <div class="marketing-item" style="background-image: url({{asset($banner->image_url)}})">
              <div class="sircle-wrap">
                <div class="marketing-form-text">from</div>
                <div class="currency-wrap">
                  <span class="sub">$</span>
                  <span class="currency">{{$banner->start_from}}</span>
                </div>
              </div>
              <div class="marketing-contents-wrap">
                <h2>{{$banner->title}}</h2>
                <div class="marketing-item-price-wrap">
                  <span class="starting-text">Starting at</span>
                  <span class="marketing-price">${{$banner->start_at}}</span>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </section>
    <!-- marketing section end -->

    <!-- expolor section start -->
    <section class="expolor-section">
      <div class="container">
        <div class="expolor-contents">
          <div class="expolor-caption">
            <div class="hero-title-aria">
              <div class="top-sub-title" style="color: white">
                Ready to explore
              </div>
              <h2 class="hero-main-title">ONE STEP AHEAD.</h2>
            </div>
            <!-- price aria -->
            <div class="price-wrapper">
              <div>
                <div class="top-sub-price">
                  Find the full range of mobile smartphones, SmartWear &
                  accessories in our...
                </div>
              </div>

              <div class="buttons-wrapper">
                <button
                  class="button-primary"
                  style="background-color: transparent; border: 2px solid white"
                >
                  read more
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- expolor section end -->

    <!-- brands section start -->
    <section class="brands-section">
      <div class="container">
        <div class="brands">
          <div class="brands-heading">
            <h2>Brands</h2>
          </div>
          <div class="row p-0">
            <div class="col p-0">
              <div class="brands_slider_container">
                <div class="owl-carousel owl-theme brands_slider">
                  @foreach ($brands as $brand)
                  <div class="owl-item" style="width: 250px">
                    <div
                      class="brands_item d-flex flex-column justify-content-center"
                    >
                      <img
                        src="{{ asset($brand->logo_url) }}"
                        alt="{{$brand->logo}}"
                      />
                    </div>
                  </div>
                  @endforeach
                </div>
                <!-- Brands Slider Navigation -->
                <div class="brands_nav brands_prev">
                  <i class="fas fa-chevron-left"></i>
                </div>
                <div class="brands_nav brands_next">
                  <i class="fas fa-chevron-right"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- brands section end -->

    <!-- footer start -->
    <footer class="footer">
      <!-- footer subscribe block -->
      <div class="subscribe-block">
        <div class="container">
          <div class="row p-0 align-items-center subs-wrapper">
            <div class="col-12 col-md-6 p-0">
              <div class="subscribe-item-wrapper">
                <div class="subs-icon">
                  <i class="fa-solid fa-location-arrow"></i>
                </div>
                <div class="subs-item-contents">
                  <h4>Sign up for our newsletter</h4>
                  <div class="subs-item-details">
                    and enjoy <strong>-15% off</strong> your first purchase!
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-6 p-0">
              <form class="subs-form" action="{{route("frontend.storenewsletter")}}" method="POST">
                @csrf
                <div class="subs-input-wrap">
                  <input
                    class="subs-input"
                    placeholder="Email address"
                    type="email"
                    name="email"
                    id=""
                    required
                  />
                  <button type="submit">subscribe</button>
                </div>
              </form>

            </div>
          </div>
        </div>
      </div>
      <!-- footer starts from here -->
      <div class="container">
        <div class="footer-block">
          <div class="footer-items-wrapper">
            <div class="footer-item">
              <a class="footer-logo" href="#">
                <img style="width: 100px" src="{{ asset(@$setting->logo_url) }}" alt="footer-logo-orange"
                />
              </a>
            </div>
            <div class="footer-item">
              <h4 class="footer-items-title">My Account</h4>
              <ul class="footer-item-list-wrapper">
                <li>
                  <a class="footer-link" href="#">My Account</a>
                </li>
                <li>
                  <a class="footer-link" href="#">Register</a>
                </li>
                <li>
                  <a class="footer-link" href="#">Search</a>
                </li>
                <li>
                  <a class="footer-link" href="#">Wishlist</a>
                </li>
                <li>
                  <a class="footer-link" href="#">Best sellers</a>
                </li>
                <li>
                  <a class="footer-link" href="#">Latest news</a>
                </li>
              </ul>
            </div>
            <div class="footer-item">
              <h4 class="footer-items-title">Customer Services</h4>
              <ul class="footer-item-list-wrapper">
                <li>
                  <a class="footer-link" href="#">Help & Contact</a>
                </li>
                <li>
                  <a class="footer-link" href="#">Buy Venedor</a>
                </li>
                <li>
                  <a class="footer-link" href="#">About Us</a>
                </li>
                <li>
                  <a class="footer-link" href="#">Contact Us</a>
                </li>
                <li>
                  <a class="footer-link" href="#">What's new</a>
                </li>
                <li>
                  <a class="footer-link" href="#">Affiliates</a>
                </li>
              </ul>
            </div>
            <div class="footer-item">
              <div class="footer-sub-items-wrapper">
                <div class="footer-sub-item">
                  <h4 class="footer-items-title">Contact Details</h4>
                  <div class="contact-block">
                    <div class="contact-widget">
                      <div class="border-virtical"></div>
                      <div class="contact-widget-icon">
                        <i class="fa-solid fa-phone"></i>
                      </div>
                      <ul class="contact-number">
                        <li>{{@$setting->number_one}}</li>
                        <li>{{@$setting->number_two}}</li>
                      </ul>
                    </div>
                    <div class="contact-widget">
                      <div class="border-virtical"></div>
                      <div class="contact-widget-icon">
                        <i class="fa-solid fa-envelope"></i>
                      </div>
                      <ul class="contact-number">
                        <li>{{@$setting->email_one}}</li>
                        <li>{{@$setting->email_two}}</li>
                      </ul>
                    </div>
                    <div class="contact-widget">
                      <div class="border-virtical"></div>
                      <div class="contact-widget-icon">
                        <i class="fa-brands fa-facebook"></i>
                      </div>
                      <ul class="contact-number">
                        <li>{{@$setting->facebook_url_one}}</li>
                        <li>{{@$setting->facebook_url_two}}</li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="footer-sub-item">
                  <h4 class="footer-items-title">Information</h4>
                  <ul class="footer-item-list-wrapper">
                    <li>
                      <a class="footer-link" href="#">New products</a>
                    </li>
                    <li>
                      <a class="footer-link" href="#">Top sellers</a>
                    </li>
                    <li>
                      <a class="footer-link" href="#">Special products</a>
                    </li>
                    <li>
                      <a class="footer-link" href="#">Terms and conditions</a>
                    </li>
                    <li>
                      <a class="footer-link" href="#">Legal notice</a>
                    </li>
                    <li>
                      <a class="footer-link" href="#">Delivery</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="footer-item">
              <h4 class="footer-items-title">QUICK CONTACT</h4>
              <form class="footer-form" action="{{route("frontend.storeContact")}}" method="POST">
                @csrf
                <div class="footer-form-input-wrapper">
                  <img src="{{asset("frontend/img/footer_map1.avif")}}" alt="footer_map" />
                  <input
                    type="email"
                    placeholder="Enter your e-mail"
                    name="email"
                    id="email"
                  />
                  <textarea
                    name="message"
                    placeholder="Write your review"
                    id=""
                  ></textarea>
                </div>
                <button class="footer-form-submit-button">send</button>
              </form>
            </div>
          </div>

          <!-- footer bottom contents -->
          <div
            class="footer-bottom-contents d-flex justify-content-center align-items-center"
          >
            <span>100% Secure & Trusted Payment</span>
            <p>
              Need help? Call us at
              <a class="footer-bottom-contact-number" href="tel:+0203-980-14-79"
                ><strong>+0203-980-14-79</strong></a
              >
              for any assistance required.
            </p>
          </div>
        </div>
      </div>
    </footer>
    <!-- footer end -->

    <!-- bootstrap 5.3 Cdn -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
    <!-- brands OwlCarousel -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.js"></script>

    <!-- swiper cdn -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script src="{{asset("frontend/js/swiper.js")}}"></script>
    <!-- brands jqury  -->
    <script>
      $(document).ready(function () {
        if ($(".brands_slider").length) {
          var brandsSlider = $(".brands_slider");

          brandsSlider.owlCarousel({
            loop: true,
            autoplay: true,
            autoplayTimeout: 3000,
            nav: false,
            dots: false,
            autoWidth: true,
            items: 8,
            margin: 42,
            
          });

          if ($(".brands_prev").length) {
            var prev = $(".brands_prev");
            prev.on("click", function () {
              brandsSlider.trigger("prev.owl.carousel");
            });
          }

          if ($(".brands_next").length) {
            var next = $(".brands_next");
            next.on("click", function () {
              brandsSlider.trigger("next.owl.carousel");
            });
          }
        }
      });

        function getProductByCategory(category){
          $("#productGrid").html('');
          $("#spinner").removeClass('d-none');
          $("#noProductMessage").addClass('d-none');
          const route = `{{route('frontend.category-product')}}`;
          $.get({
            url : route,
            data: {id:category},
            dataType : 'json',
            success : (data) => {
              
              if(data.length > 0){
                let html = '';
                data.forEach(product => {
                  html += `
                    <a href="#" class="products-item">
                      <div class="product-images-wrap">
                        <img 
                          class="product-img frist-img" 
                          src="${product.thumb_url}" 
                          alt="${product.name}" 
                        />
                        <img 
                          class="product-img second-img" 
                          src="${product.image_url}" 
                          alt="${product.name}" 
                        />
                      </div>

                      <div class="product-info-wrap">
                        <span class="product-type">${product.brand.name}</span> 
                        <div class="product-name">
                          ${product.name}
                        </div>
                        <div class="product-price">
                          <span class="product-old-price money">$${product.regular_price}</span> 
                          <span class="current-price money">$${product.discount_price}</span> 
                        </div>
                        <button class="product-button">order now</button>
                      </div>
                    </a>
                  `;
                  $("#spinner").addClass('d-none');
                  $("#noProductMessage").addClass('d-none');
                  $("#productGrid").html(html);
                });
              }else{
                $("#spinner").addClass('d-none');
                $("#noProductMessage").removeClass('d-none');
              }
            }
          })
        }

        getProductByCategory('all');
    </script>
  </body>
</html>
