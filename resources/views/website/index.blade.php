<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>{{ $company->name }} - Typing Center in UAE</title>
    <meta name="description" content="{{ Str::limit(strip_tags($websiteSetup->about_us), 160) }}">
    <meta name="keywords" content="Typing Center in UAE, {{ $company->name }}, Emirates ID services, Visa application, Document typing, {{ $company->location }}, UAE typing center, Legal translations, Government services, Professional services in UAE, Attestation services">
    <!-- Favicons -->
    <link href="{{ $company && $company->company_icon ? asset($company->company_icon) : asset('/build/img/logo-small.jpeg') }}" rel="icon">
    <link href="{{ $company && $company->company_icon ? asset($company->company_icon) : asset('/build/img/logo-small.jpeg') }}" rel="apple-touch-icon">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="{{ asset('build/website/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('build/website/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('build/website/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('build/website/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('build/website/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('build/website/assets/css/main.css') }}" rel="stylesheet">
  </head>
  <body class="index-page">
    <header id="header" class="header d-flex align-items-center fixed-top">
      <div class="container-fluid container-xl position-relative d-flex align-items-center">
        <a href="index.html" class="logo d-flex align-items-center me-auto">
          <!-- Uncomment the line below if you also wish to use an image logo -->
          <img src="{{ $company && $company->company_logo ? asset($company->company_logo) : asset('/build/img/logo.png') }}" alt="">
          <h1 class="sitename">{{ $company->name }}</h1>
        </a>
        <nav id="navmenu" class="navmenu">
          <ul>
            <li>
              <a href="#hero" class="active">Home <br>
              </a>
            </li>
            <li>
              <a href="#about">About</a>
            </li>
            <li>
              <a href="#features">Services</a>
            </li>
            <li>
              <a href="#contact">Contact</a>
            </li>
          </ul>
          <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>
      </div>
    </header>
    <main class="main">
      <!-- Hero Section -->
      <section id="hero" class="hero section">
        <div class="container">
          <div class="row gy-4">
            <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
              <h1 data-aos="fade-up">We offer modern solutions for growing your business</h1>
              <p data-aos="fade-up" data-aos-delay="100">{{ $websiteSetup->welcome_message }}</p>
              <div class="d-flex flex-column flex-md-row" data-aos="fade-up" data-aos-delay="200">
                <a href="#contact" class="btn-get-started">Get Started <i class="bi bi-arrow-right"></i>
                </a>
              </div>
            </div>
            <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-out">
              <img src="{{ asset($websiteSetup->cover_photo) ?? asset('/build/img/logo.png') }}" class="img-fluid animated" alt="">
            </div>
          </div>
        </div>
      </section>
      <!-- /Hero Section -->
      <!-- About Section -->
      <section id="about" class="about section">
        <div class="container" data-aos="fade-up">
          <div class="row gx-0">
            <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
              <div class="content">
                <h3>Who We Are</h3>
                <p> {{ $websiteSetup->about_us }}</p>
              </div>
            </div>
            <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
              <img src="assets/img/about.jpg" class="img-fluid" alt="">
            </div>
          </div>
        </div>
      </section>
      <!-- /About Section -->
      <!-- Values Section -->
      <section id="values" class="values section">
        <div class="container section-title" data-aos="fade-up">
            <h2>Our Core Values</h2>
            <p>What drives us to deliver excellence in every service we provide.</p>
        </div>
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="card">
                        <img src="https://subiz.com.vn/blog/wp-content/uploads/2019/06/customer-centric-2.png" class="img-fluid" alt="" style="height: 200px; object-fit: cover;">
                        <h3>Customer-Centric Approach</h3>
                        <p>We prioritize our clients by providing fast, reliable, and accurate services tailored to their specific needs. Your satisfaction is our success.</p>
                    </div>
                </div>
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="card">
                        <img src="https://avatars.mds.yandex.net/i?id=02ce5f6edbf15d59e964ba94468222e83a865f35-12421722-images-thumbs&n=13" class="img-fluid" alt="" style="height: 200px; object-fit: cover;">
                        <h3>Integrity and Transparency</h3>
                        <p>We operate with complete honesty and transparency in all transactions, ensuring trust and long-term relationships with our clients.</p>
                    </div>
                </div>
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="card">
                        <img src="https://4.bp.blogspot.com/-c_wMRWCt2dY/VHUFjIFV1DI/AAAAAAAAIGY/XIU00z4OUOc/s1600/img-howWeDoIt-480.png" class="img-fluid" alt="" style="height: 200px; object-fit: cover;">
                        <h3>Excellence in Service</h3>
                        <p>We are committed to delivering top-quality services with attention to detail, accuracy, and professionalism in every document we handle.</p>
                    </div>
                </div>
            </div>
            <div class="row gy-4 mt-4">
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="400">
                    <div class="card">
                        <img src="https://www.gov.kz/uploads/2020/6/9/40bf2023b45da83f8f802c56f9599b99_original.59455.jpeg" class="img-fluid" alt="" style="height: 200px; object-fit: cover;">
                        <h3>Innovation and Efficiency</h3>
                        <p>We continually embrace new technologies to provide quicker, more efficient services, ensuring minimal wait times and high satisfaction.</p>
                    </div>
                </div>
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="500">
                    <div class="card">
                        <img src="https://www.researchgate.net/profile/Martha-Cahyandito/publication/254458708/figure/fig2/AS:650840901681152@1532183971877/Core-Subjects-of-Social-Responsibility-in-ISO-26000.png" class="img-fluid" alt="" style="height: 200px; object-fit: cover;">
                        <h3>Community and Social Responsibility</h3>
                        <p>We are committed to contributing to the UAE community by assisting individuals and businesses in accessing essential government services.</p>
                    </div>
                </div>
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="600">
                    <div class="card">
                        <img src="https://www.quotemaster.org/images/92/92bfaef7f75e8a87e83ea9c98b148317.gif" class="img-fluid" alt="" style="height: 200px; object-fit: cover;">
                        <h3>Sustainability and Growth</h3>
                        <p>We focus on sustainable business practices that support long-term growth for our company and our clients, ensuring that we continue to serve future generations effectively.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


      <section id="features" class="features section">
        <div class="container section-title" data-aos="fade-up">
            <h2>Our Services</h2>
            <p>Delivering Excellence Through Tailored Solutions <br></p>
        </div>
        <div class="container">
            <div class="row gy-5">
                <div class="col-xl-12 d-flex">
                    <div class="row align-self-center gy-4">
                        @foreach (json_decode($websiteSetup->our_services) as $service)
                            <div class="col-md-4" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
                                <div class="feature-box d-flex align-items-center">
                                    <i class="bi bi-check"></i>
                                    <h3>{{ $service }}</h3>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

   

    <section id="faq" class="faq section">
        <div class="container section-title" data-aos="fade-up">
            <h2>F.A.Q</h2>
            <p>Frequently Asked Questions</p>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="faq-container">
                        @foreach (json_decode($websiteSetup->faqs) as $faq)
                            <div class="faq-item {{ $loop->first ? 'faq-active' : '' }}">
                                <h3>{{ $faq->question }}</h3>
                                <div class="faq-content">
                                    <p>{{ $faq->answer }}</p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="faq-container">
                        @foreach (json_decode($websiteSetup->faqs) as $faq)
                            <div class="faq-item {{ $loop->first ? 'faq-active' : '' }}">
                                <h3>{{ $faq->question }}</h3>
                                <div class="faq-content">
                                    <p>{{ $faq->answer }}</p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    
    <section id="contact" class="contact section">
  <div class="container section-title" data-aos="fade-up">
    <h2>Contact</h2>
    <p>Contact Us</p>
  </div>
  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="row gy-4">
      <div class="col-lg-6">
        <div class="row gy-4">
          <div class="col-md-6">
            <div class="info-item" data-aos="fade" data-aos-delay="300">
              <i class="bi bi-telephone"></i>
              <h3>Call Us</h3>
              <p>{{ $company->phone }}</p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="info-item" data-aos="fade" data-aos-delay="500">
              <i class="bi bi-clock"></i>
              <h3>Open Hours</h3>
              <p>Monday - Saturday</p>
              <p>10:00AM - 10:00PM</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <form id="contactForms" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
          <div class="row gy-4">
            <div class="col-md-6">
              <input type="text" name="name" class="form-control" placeholder="Your Name" required="">
            </div>
            <div class="col-md-6">
              <input type="email" class="form-control" name="email" placeholder="Your Email" required="">
            </div>
            <div class="col-12">
              <input type="text" class="form-control" name="subject" placeholder="Subject" required="">
            </div>
            <div class="col-12">
              <textarea class="form-control" name="message" rows="6" placeholder="Message" required=""></textarea>
            </div>
            <div class="col-12 text-center">
              <div class="loading">Loading</div>
              <div class="error-message"></div>
              <div class="sent-message">Your message has been sent. Thank you!</div>
              <button type="submit">Send Message</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>




    </main>
    <footer id="footer" class="footer">
      <div class="container footer-top">
        <div class="row gy-4">
          <div class="col-lg-4 col-md-6 footer-about">
            <a href="#" class="d-flex align-items-center">
              <span class="sitename">{{ $company->company_name }}</span>
            </a>
            <div class="footer-contact pt-3">
              <p>{{ $company->address }}</p>
              <p class="mt-3">
                <strong>Phone:</strong>
                <span>{{ $company->phone }}</span>
              </p>
              <p>
                <strong>Email:</strong>
                <span>{{ $company->email }}</span>
              </p>
            </div>
          </div>
          <div class="col-lg-2 col-md-3 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li>
                <i class="bi bi-chevron-right"></i>
                <a href="#">Home</a>
              </li>
              <li>
                <i class="bi bi-chevron-right"></i>
                <a href="#">About us</a>
              </li>
              <li>
                <i class="bi bi-chevron-right"></i>
                <a href="#">Services</a>
              </li>
              <li>
                <i class="bi bi-chevron-right"></i>
                <a href="#">Contact</a>
              </li>
            </ul>
          </div>
          <div class="col-lg-2 col-md-3 footer-links">
              <h4>Our Services</h4>
              <ul>
                  @foreach (array_slice(json_decode($websiteSetup->our_services), 0, 3) as $service)
                      <li>
                          <i class="bi bi-chevron-right"></i>
                          <a href="#">{{ $service }}</a>
                      </li>
                  @endforeach
              </ul>
          </div>
        </div>
      </div>
    </footer>
    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center">
      <i class="bi bi-arrow-up-short"></i>
    </a>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function () {
    $("#contactForms").submit(function (e) {
      e.preventDefault();
      var formData = $(this).serialize();
      var $submitButton = $("button[type='submit']");
      $submitButton.prop("disabled", true).text("Sending..."); 
      $.ajax({
        url: '/customer-send-email', 
        type: 'GET',
        data: formData,
        success: function(response) {
          if(response.status == 'success') {
            $(".sent-message").show();
          } else {
            $(".error-message").text(response.message).show();
          }
          $submitButton.prop("disabled", false).text("Send Message");
        },
        error: function() {
          $(".error-message").text("An error occurred, please try again later.").show();
          $submitButton.prop("disabled", false).text("Send Message");
        }
      });
    });
  });
</script>
    <script src="{{ asset('build/website/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('build/website/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('build/website/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('build/website/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('build/website/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('build/website/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('build/website/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('build/website/assets/js/main.js') }}"></script>
  </body>
</html>