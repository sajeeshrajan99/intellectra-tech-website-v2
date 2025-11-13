<?php
require_once 'AnythingHelper.php';
if (!isset($_GET['job']) || empty($_GET['job'])) {
  header("Location: ../careers");
  exit();
} else {
  $checkToken = GenerateToken::UUIDV4();
  $job = htmlspecialchars($_GET['job']);
  $jobFile = "include/careers/{$job}.inc.php";

  if (!file_exists($jobFile)) {
    header("Location: ../careers");
    exit();
  }

  // Metadata per job
  $jobMeta = [
    'freelance-business-development-executive-uk' => [
      'form_type' => 'uk',
      'post' => 'Freelance Business Development Executive (UK – Remote)',
      'title' => 'Freelance Business Development Executive (UK – Remote) | Intellectra Tech Careers',
      'description' => 'Join Intellectra Tech as a Freelance Business Development Executive in the UK. Remote role with travel and commission-based pay.',
      'keywords' => 'UK freelance job, business development, sales job remote, commission sales UK',
      'ogimage' => 'https://www.intellectratech.com/assets/images/og-image.jpg',
    ],
    'freelance-content-creator-india' => [
      'form_type' => 'india',
      'post' => 'Freelance Content Creator (Social Media & Video Strategy)',
      'title' => 'Freelance Content Creator (Social Media & Video Strategy) | Intellectra Tech Careers',
      'description' => 'Apply now to join Intellectra Tech as a Freelance Content Creator in India. Create strategic social media content, write video scripts, and collaborate remotely with global brands.',
      'keywords' => 'freelance content creator India, social media content jobs, remote scriptwriting, video script jobs, content creation freelance, content writing remote India, social media freelancer',
      'ogimage' => 'https://www.intellectratech.com/assets/images/jobs/freelance-content-creator-india.jpg',
    ],
    'business-strategist-global-markets' => [
      'form_type' => 'india',
      'post' => 'Business Strategist – Global Markets (India, UK & UAE)',
      'title' => 'Business Strategist – Global Markets | Intellectra Tech Careers',
      'description' => 'Join Intellectra Tech as a Business Strategist for global markets expansion. Lead strategic planning across India, UK & UAE. Remote work, ₹2-3L salary, work with UK leadership team.',
      'keywords' => 'business strategist jobs India, global markets strategy, remote business development, international business jobs, strategy consultant India, business planning jobs, UK company jobs India',
      'ogimage' => 'https://www.intellectratech.com/assets/images/jobs/business-strategist-global-markets.jpg',
    ],
    'freelance-videographer-photographer-liverpool-uk' => [
      'form_type' => 'uk',
      'post' => 'Videographer & Photographer (UK)',
      'title' => 'Videographer & Photographer (UK) | Intellectra Tech Careers',
      'description' => 'We are hiring a creative Freelance Videographer & Photographer in the UK. Capture and edit high-quality visual content for tech-driven projects.',
      'keywords' => 'UK videographer job, freelance photography UK, creative jobs remote, tech videography UK, photographer vacancy UK',
      'ogimage' => 'https://www.intellectratech.com/assets/images/og-image.jpg',
    ],
    'digital-marketing-executive-specialist-india' => [
      'form_type' => 'india',
      'post' => 'Digital Marketing Executive/Specialist – India',
      'title' => 'Digital Marketing Executive/Specialist – India | Intellectra Tech Careers',
      'description' => 'Explore digital marketing opportunities at Intellectra Tech. Work remotely or hybrid from Kerala with flexible engagement.',
      'keywords' => 'digital marketing jobs India, Kerala marketing jobs, SEO SMM jobs',
      'ogimage' => 'https://www.intellectratech.com/assets/images/og-image.jpg',
    ],
    'ui-ux-designer-india' => [
      'form_type' => 'india',
      'post' => 'UI/UX Designer – India',
      'title' => 'UI/UX Designer – India | Intellectra Tech Careers',
      'description' => 'We’re hiring UI/UX designers! Join Intellectra Tech for remote or hybrid opportunities with global exposure.',
      'keywords' => 'UI designer India, UX jobs remote, Figma design jobs Kerala',
      'ogimage' => 'https://www.intellectratech.com/assets/images/og-image.jpg',
    ],
    'freelance-business-development-executive-india' => [
      'form_type' => 'india',
      'post' => 'Freelance Business Development Executive – India',
      'title' => 'Freelance Business Development Executive – India | Intellectra Tech Careers',
      'description' => 'Remote freelance business development opportunity in Kerala. Commission-based with flexible work structure.',
      'keywords' => 'freelance BDE India, sales jobs Kerala, commission-based job',
      'ogimage' => 'https://www.intellectratech.com/assets/images/og-image.jpg',
    ],
    'digital-marketing-head-india' => [
      'form_type' => 'india',
      'post' => 'Digital Marketing Head / Project Manager',
      'title' => 'Digital Marketing Head / Project Manager | Intellectra Tech Careers',
      'description' => 'Lead digital marketing and client projects with Intellectra Tech. Full-time remote position for experienced professionals in Kerala.',
      'keywords' => 'digital marketing head Kerala, project manager remote, marketing jobs India, digital marketing manager career',
      'ogimage' => 'https://www.intellectratech.com/assets/images/og-image.jpg',
    ],
  ];

  // Use default metadata if job not found in map
  $meta = $jobMeta[$job] ?? [
    'post' => 'Careers at Intellectra Tech',
    'title' => 'Careers at Intellectra Tech | Join Our Digital Team',
    'description' => 'Explore exciting career opportunities at Intellectra Tech across India and UK. Apply today!',
    'keywords' => 'careers, tech jobs, Intellectra Tech openings',
  ];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Basic Meta Tags -->
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />

  <title><?= $meta['title'] ?></title>
  <base href="https://www.intellectratech.com/">
  <!-- <base href="http://intellectra.localhost/"> -->
  <link rel="canonical" href="https://www.intellectratech.com/careers/<?= $job ?>" />
  <link rel="icon" href="assets/images/favicon.png" type="image/png">
  <meta name="title" content="<?= $meta['title'] ?>">
  <meta name="description" content="<?= $meta['description'] ?>">
  <meta name="keywords" content="<?= $meta['keywords'] ?>">
  <meta name="author" content="Intellectra Tech">
  <meta name="robots" content="index, follow">

  <!-- Open Graph -->
  <meta property="og:type" content="website">
  <meta property="og:title" content="<?= $meta['title'] ?>">
  <meta property="og:description" content="<?= $meta['description'] ?>">
  <meta property="og:image" content="<?= $meta['ogimage'] ?>">
  <meta property="og:url" content="https://www.intellectratech.com/careers/<?= $job ?>">
  <meta property="og:site_name" content="Intellectra Tech">

  <!-- Twitter -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="<?= $meta['title'] ?>">
  <meta name="twitter:description" content="<?= $meta['description'] ?>">
  <meta name="twitter:image" content="<?= $meta['ogimage'] ?>">
  <meta name="twitter:site" content="@intellectratech">

  <!-- CSS Files -->
  <!-- Plugins CSS -->
  <link rel="stylesheet" href="assets/css/plugins.css" />
  <!-- Main Style CSS -->
  <link rel="stylesheet" href="assets/css/style.css" />
  <link rel="stylesheet" href="assets/css/custom-style.css" />
  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-6BBD7F50RC"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-6BBD7F50RC');
  </script>
  <!-- Google Tag Manager -->
  <script>
    (function(w, d, s, l, i) {
      w[l] = w[l] || [];
      w[l].push({
        'gtm.start': new Date().getTime(),
        event: 'gtm.js'
      });
      var f = d.getElementsByTagName(s)[0],
        j = d.createElement(s),
        dl = l != 'dataLayer' ? '&l=' + l : '';
      j.async = true;
      j.src =
        'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
      f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-P86QP5BW');
  </script>
  <!-- End Google Tag Manager -->
  <script type="text/javascript">
    (function(c, l, a, r, i, t, y) {
      c[a] = c[a] || function() {
        (c[a].q = c[a].q || []).push(arguments)
      };
      t = l.createElement(r);
      t.async = 1;
      t.src = "https://www.clarity.ms/tag/" + i;
      y = l.getElementsByTagName(r)[0];
      y.parentNode.insertBefore(t, y);
    })(window, document, "clarity", "script", "s0gieywi94");
  </script>
  <script src="assets/js/jquery-3.7.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://www.google.com/recaptcha/api.js?render=6LcNVoIrAAAAAMJsxQH-TAyQjB-J3xXEg5MvOt8Y"></script>
</head>
<style>
  .social-icon {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 40px;
    background-color: rgb(31, 31, 31);
    border-radius: 50%;
    color: white;
    transition: all 0.3s ease;
    font-size: 16px;
  }

  .social-icon:hover {
    background-color: white;
    color: #000;
    /* or any icon color you prefer on hover */
  }

  .fixedLoader {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(255, 255, 255, 0.8);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 9999;
  }

  .highlight-box {
    background: linear-gradient(135deg, #e72f3d15, #764ba215);
    border-left: 4px solid #e72f3d;
    padding: 20px;
    border-radius: 8px;
    margin: 20px 0;
  }

  .highlight-box p {
    margin: 0;
    color: #2c3e50;
    font-weight: 500;
  }
</style>

<body>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P86QP5BW" height="0" width="0"
      style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->
  <!-- Custom Cursor -->

  <div class="cursor d-none d-lg-block"></div>

  <!-- Custom Cursor End -->

  <!-- Preloader -->

  <!---- <div class="preloader">
    <div class="spinner-wrap">
      <div class="preloader-logo">
        <img src="assets/images/preloader.svg" alt="" class="img-fluid" />
      </div>
      <div class="spinner"></div>
    </div>
  </div>-->

  <!-- Preloader End -->

  <!-- back to to button start-->
  <a href="#" id="scroll-top" class="back-to-top-btn"><i class="fa-solid fa-arrow-up"></i></a>
  <!-- back to to button end-->

  <!-- Mobile Menu -->
  <div class="quanto-menu-wrapper">
    <div class="quanto-menu-area text-center">
      <div class="quanto-menu-mobile-top">
        <div class="mobile-logo">
          <a href="../">
            <img src="./assets/images/intellectra-tech-logo-2.webp" alt="logo" loading="lazy" />
          </a>
        </div>
        <button class="quanto-menu-toggle mobile" aria-label="Toggle menu">
          <i class="ri-close-line"></i>
        </button>
      </div>
      <div class="quanto-mobile-menu">
        <ul>
          <li>
            <a href="../">Home</a>
          </li>
          <li>
            <a href="about">About Us</a>
          </li>
          <li class="menu-item-has-children">
            <a href="#">Services</a>
            <ul class="sub-menu">
              <li><a href="graphic-design">Graphic Design</a></li>
              <li><a href="web-development">Web Development</a></li>
              <li><a href="mobile-app-development">Mobile App Development</a></li>
              <li><a href="seo">SEO</a></li>
            </ul>
          </li>
          <li>
            <a href="careers">Careers</a>
          </li>
          <li>
            <a href="contact">Contact</a>
          </li>
        </ul>
      </div>
      <div class="quanto-mobile-menu-btn">
        <div class="sidebar-wrap">
          <h6>32A, Lawrence Road, </h6>
          <h6>Liverpool, L15 0EG</h6>
        </div>
        <div class="sidebar-wrap">
          <h6>UK: <a href="tel:+447342145338">+44 7342 145338 </a></h6>
          <h6>India: <a href="tel:+919497880332">+919497880332 </a></h6>
          <h6>
            <a href="mailto:enquiry@intellectratech.com">enquiry@intellectratech.com</a>
          </h6>
        </div>
        <div class="social-btn style3">
          <a href="https://www.facebook.com/profile.php?id=61576946785639">
            <span class="link-effect">
              <span class="effect-1"><i class="fab fa-facebook"></i></span>
              <span class="effect-1"><i class="fab fa-facebook"></i></span>
            </span>
          </a>
          <a href="https://www.instagram.com/intellectra_tech">
            <span class="link-effect">
              <span class="effect-1"><i class="fab fa-instagram"></i></span>
              <span class="effect-1"><i class="fab fa-instagram"></i></span>
            </span>
          </a>
          <a href="https://wa.me/447342145338">
            <span class="link-effect">
              <span class="effect-1"><i class="fab fa-whatsapp"></i></span>
              <span class="effect-1"><i class="fab fa-whatsapp"></i></span>
            </span>
          </a>
          <a href="https://www.linkedin.com/company/intellectra-tech/">
            <span class="link-effect">
              <span class="effect-1"><i class="fab fa-linkedin-in"></i></span>
              <span class="effect-1"><i class="fab fa-linkedin-in"></i></span>
            </span>
          </a>
          <!----<a href="https://youtube.com/">
            <span class="link-effect">
              <span class="effect-1"><i class="fab fa-youtube"></i></i></span>
              <span class="effect-1"><i class="fab fa-youtube"></i></i></span>
            </span>
          </a>-->
        </div>
      </div>
    </div>
  </div>
  <!-- End mobile menu -->

  <div class="has-smooth" id="has_smooth"></div>
  <div id="smooth-wrapper">
    <!-- Header section Start -->
    <header class="quanto-header main-header bg-color-white" id="sticky-menu">
      <div class="sticky-wrap">
        <div class="sticky-active">
          <div class="container custom-container">
            <div class="row gx-3 align-items-center justify-content-between">
              <div class="col-8 col-sm-auto">
                <div class="header-logo">
                  <a href="../">
                    <img src="./assets/images/intellectra-tech-logo-1.webp" alt="logo" />
                  </a>
                </div>
              </div>
              <div class="col text-end text-lg-center">
                <nav class="main-menu menu-style1 d-none d-lg-block">
                  <ul>
                    <li>
                      <a href="../">Home</a>
                    </li>
                    <li>
                      <a href="about">About Us</a>
                    </li>
                    <li class="menu-item-has-children">
                      <a href="#">Services</a>
                      <ul class="sub-menu">
                        <li><a href="graphic-design">Graphic Design</a></li>
                        <li><a href="web-development">Web Development</a></li>
                        <li><a href="mobile-app-development">Mobile App Development</a></li>
                        <li><a href="seo">SEO</a></li>
                      </ul>
                    </li>
                    <li>
                      <a href="careers">Careers</a>
                    </li>
                    <li>
                      <a href="contact">Contact</a>
                    </li>
                  </ul>
                </nav>
                <button class="menuBar-toggle quanto-menu-toggle d-inline-block d-lg-none">
                  <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40" fill="none">
                    <path d="M24.4444 26V28H0V26H24.4444ZM40 19V21H0V19H40ZM40 12V14H15.5556V12H40Z"
                      fill="currentColor" />
                  </svg>
                </button>
              </div>
              <div class="col-auto d-none d-lg-block">
                <a class="quanto-link-btn btn-pill" href="./contact">Get in touch
                  <span>
                    <i class="fa-solid fa-arrow-right arry1"></i>
                    <i class="fa-solid fa-arrow-right arry2"></i>
                  </span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>
    <div id="smooth-content">
      <!-- Header section End -->
      <?php
      include $jobFile;
      if ($meta['form_type'] === 'uk') {
        include 'include/careers/form-uk.inc.php';
      } else {
        include 'include/careers/form-india.inc.php';
      }
      ?>

      <!-- Footer section Start -->
      <footer class="footer-area bg-color-primary">
        <div class="marquee-container fade-anim">
          <div class="marquee">
            <a class="marquee-item-container" href="contact">
              <div class="marquee-item text-color-white">
                <h2 class="text-color-white">Let’s work together</h2>
                <svg xmlns="http://www.w3.org/2000/svg" width="150" height="150" viewBox="0 0 150 150" fill="none">
                  <path
                    d="M100.023 58.8388L46.232 112.63L37.3932 103.791L91.1844 50H43.7733V37.5H112.523V106.25H100.023V58.8388Z"
                    fill="white" />
                </svg>
              </div>
            </a>
          </div>
        </div>
        <div class="footer__center section-padding-top-bottom">
          <div class="container custom-container">

            <div class="row g-4 justify-content-between">
              <div class="col-sm-5 col-lg-4">
                <div class="footer-widgets quanto text-color-white fade-anim">
                  <a href="../" class="logo d-inline-block">
                    <img src="./assets/images/intellectra-tech-logo-2-white.webp" alt="Intellectra" />
                  </a>
                  <p>
                    We are the leading digital marketing company in the UK,
                    offering the most reliable and effective
                    services to drive the growth of your business..
                  </p>
                </div>
              </div>
              <div class="col-sm-5 col-lg-3">
                <div class="footer-widgets fade-anim">

                  <div class="widget-links on-laptop">
                    <h6 class="widget-title text-color-white">Links</h6>
                    <ul class="custom-ul">
                      <li class="inline-links">
                        <a href="../">Home</a> <span style="padding-left: 3px; padding-right: 3px;">|</span>
                        <a href="about">About Us</a>
                      </li>
                      <li><a href="graphic-design">Graphic Design</a></li>
                      <li><a href="web-development">Web Development</a></li>
                      <li><a href="mobile-app-development">Mobile App Development</a></li>
                      <li>
                        <a href="seo">SEO</a>
                        <span style="padding-left: 3px; padding-right: 3px;">|</span>
                        <a href="careers">Careers</a>
                        <span style="padding-left: 3px; padding-right: 3px;">|</span>
                        <a href="contact">Contact</a>
                      </li>
                    </ul>
                  </div>

                </div>
              </div>
              <div class="col-sm-5 col-lg-4">
                <div class="footer-widgets  text-color-white fade-anim">
                  <h6 class="widget-title text-color-white">Contact</h6>
                  <p class="address">
                    32A, Lawrence Road, Liverpool, L15 0EG
                  </p>
                  <div class="contacts">
                    <ul class="custom-ul">
                      <li>
                        <a class="email" href="mailto:enquiry@intellectratech.com">enquiry@intellectratech.com</a>
                      </li>
                      <li class="mt-2">
                        <a class="mobile" href="tel:+447342145338">+44 7342 145338</a>
                      </li>
                    </ul>

                  </div>
                  <div class="social-links mt-3">
                    <ul class="custom-ul">
                      <li>
                        <a href="https://www.facebook.com/profile.php?id=61576946785639" target="_blank"
                          rel="noopener noreferrer" aria-label="Visit our Facebook page">
                          <i class="fab fa-facebook-f"></i>
                        </a>
                      </li>
                      <li>
                        <a href="https://wa.me/447342145338" target="_blank" rel="noopener noreferrer"
                          aria-label="Chat with us on WhatsApp">
                          <i class="fab fa-whatsapp"></i>
                        </a>
                      </li>
                      <li>
                        <a href="https://www.instagram.com/intellectra_tech" target="_blank" rel="noopener noreferrer"
                          aria-label="Follow us on Instagram">
                          <i class="fab fa-instagram"></i>
                        </a>
                      </li>
                      <li>
                        <a href="https://www.linkedin.com/company/intellectra-tech/" target="_blank"
                          rel="noopener noreferrer" aria-label="Connect with us on LinkedIn">
                          <i class="fab fa-linkedin-in"></i>
                        </a>
                      </li>
                      <!----<li>
                        <a href="https://youtube.com" target="_blank" rel="noopener noreferrer" 
                          aria-label="Visit our YouTube channel">
                          <i class="fab fa-youtube"></i>
                        </a>
                      </li>-->
                    </ul>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="footer__bottom has-bodder">
          <div class="container custom-container p-xxl-0 overflow-hidden">
            <div class="row">
              <div class="col-12">
                <div class="footer__bottom-content row-padding-bottom">
                  <div class="copyright-text text-color-white">
                    All Rights Reserved — 2025 &copy; Intellectra Tech. &nbsp;
                    <div class="d-block"></div>
                    <a href="terms-and-conditions">Terms&nbsp;&&nbsp;Conditions</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="privacy-policy">Privacy&nbsp;Policy</a>
                  </div>
                  <a href="#header" class="scroll-to-top section-link">
                    Back to top
                    <i class="fas fa-angle-up"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </footer>
      <!-- Footer section End -->
    </div>
  </div>
  <!-- <div class="fixedLoader">
    <h4>Please wait</h4>
  </div> -->
  <!-- Jquery JS -->
  <!-- Bootstrap JS -->
  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <!-- MixItUp JS -->
  <script src="assets/js/jquery.mixitup.min.js"></script>
  <!-- Swiper Carousel JS -->
  <script src="assets/js/swiper-bundle.min.js"></script>
  <!-- Magnific Popup JS -->
  <script src="assets/js/jquery.magnific-popup.min.js"></script>
  <!-- Odometer JS -->
  <script src="assets/js/odometer.min.js"></script>
  <script src="assets/js/viewport.jquery.js"></script>

  <!-- gsap JS -->
  <script src="assets/js/gsap.js"></script>
  <script src="assets/js/gsap-scroll-smoother.js"></script>
  <script src="assets/js/gsap-scroll-to-plugin.js"></script>
  <script src="assets/js/gsap-scroll-trigger.js"></script>
  <script src="assets/js/gsap-split-text.js"></script>

  <!-- Menu JS -->
  <script src="assets/js/menu.js"></script>

  <!-- Main JS -->
  <script src="assets/js/main.js"></script>


</body>

</html>