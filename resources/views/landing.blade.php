<!doctype html>
<html lang="en">
  <head>
    <title>Pixature - Learn. Design. Grow.</title>
    <meta charset="UTF-8">
    <meta name="description" content="Master the hidden creative power with our 30-day Design Sprint. Transform your design career today.">
    <meta name="keywords" content="design, creative, course, sprint, learn design">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    @vite(['resources/static-import/style.css', 'resources/css/landing.css', 'resources/js/landing.js'])
    <!--[if IE 6]>
	<style type="text/css">
		* html .group {
			height: 1%;
		}
	</style>
  <![endif]-->
    <!--[if IE 7]>
	<style type="text/css">
		*:first-child+html .group {
			min-height: 1px;
		}
	</style>
  <![endif]-->
    <!--[if lt IE 9]>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
  <![endif]-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Geist+Mono:100,200,300,regular,500,600,700,800,900&amp;subset=cyrillic,latin,latin-ext">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic&amp;subset=devanagari,latin,latin-ext">
  </head>
  <body>
    <style>
      /* Fix background images for production builds */
      .global_container_ {
        background-image: url('{{ asset('images/background.jpg') }}') !important;
        background-size: cover !important;
        background-position: center top !important;
        background-repeat: no-repeat !important;
        min-width: 1920px !important;
        overflow-x: hidden !important;
      }
      .hero {
        background-image: url('{{ asset('images/ellipse_1.png') }}') !important;
      }
      .stucked-imagery {
        background-image: url('{{ asset('images/rectangle_4.jpg') }}') !important;
        background-attachment: scroll !important;
      }
      .design-sprint {
        background-image: url('{{ asset('images/rectangle_4_copy.jpg') }}') !important;
      }
      .rectangle-5-copy-2-holder {
        background-image: url('{{ asset('images/rectangle_5_copy_2.png') }}') !important;
      }
      .rectangle-5-copy-holder {
        background-image: url('{{ asset('images/rectangle_5_copy.png') }}') !important;
      }
      .rectangle-5-holder {
        background-image: url('{{ asset('images/rectangle_5.png') }}') !important;
      }
      .col-2 {
        background-image: url('{{ asset('images/rectangle_4_copy_7.jpg') }}') !important;
      }
      /* Top Navigation Bar - Modern Right Center Position */
      .top-nav {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        padding: 20px 80px;
        z-index: 10000;
        display: flex;
        justify-content: space-between;
        align-items: center;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        background: transparent;
        backdrop-filter: blur(0px);
      }
      .top-nav.scrolled {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        padding: 15px 80px;
      }
      .top-nav .nav-logo {
        opacity: 0;
        transform: translateX(-20px);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        pointer-events: none;
        height: 0;
        overflow: hidden;
        display: flex;
        align-items: center;
      }
      .top-nav.scrolled .nav-logo {
        opacity: 1;
        transform: translateX(0);
        pointer-events: auto;
        height: auto;
      }
      .top-nav .nav-logo img {
        height: 45px;
        width: auto;
        display: block;
        transition: all 0.3s ease;
        opacity: 1;
        filter: none;
      }
      .top-nav.scrolled .nav-logo img {
        filter: brightness(0) saturate(100%);
        opacity: 0.85;
      }
      .top-nav .nav-logo:hover img {
        transform: scale(1.05);
      }
      .top-nav .nav-links {
        display: flex;
        gap: 16px;
        align-items: center;
      }
      .top-nav .nav-link {
        color: white;
        text-decoration: none;
        font-weight: 600;
        font-size: 14px;
        letter-spacing: 0.5px;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.4);
        position: relative;
        padding: 12px 28px;
        border-radius: 50px;
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        border: 1.5px solid rgba(255, 255, 255, 0.2);
        overflow: hidden;
        display: inline-block;
      }
      .top-nav .nav-link::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s ease;
      }
      .top-nav .nav-link:hover::before {
        left: 100%;
      }
      .top-nav.scrolled .nav-link {
        color: #333;
        text-shadow: none;
        background: rgba(255, 255, 255, 0.9);
        border: 1.5px solid rgba(243, 112, 77, 0.2);
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
      }
      .top-nav .nav-link:hover {
        color: white;
        transform: translateY(-3px) scale(1.05);
        background: rgba(243, 112, 77, 0.9);
        border-color: rgba(243, 112, 77, 0.5);
        box-shadow: 0 8px 24px rgba(243, 112, 77, 0.4);
      }
      .top-nav.scrolled .nav-link:hover {
        color: white;
        background: linear-gradient(135deg, #f3704d 0%, #df6646 100%);
        border-color: #f3704d;
        box-shadow: 0 8px 24px rgba(243, 112, 77, 0.35);
      }
      .top-nav .btn-login {
        color: white;
        text-decoration: none;
        font-weight: 600;
        font-size: 14px;
        letter-spacing: 0.5px;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.4);
        padding: 12px 28px;
        border-radius: 50px;
        background: linear-gradient(135deg, rgba(243, 112, 77, 0.9) 0%, rgba(223, 102, 70, 0.9) 100%);
        border: 1.5px solid rgba(243, 112, 77, 0.5);
        box-shadow: 0 4px 16px rgba(243, 112, 77, 0.3);
        position: relative;
        overflow: hidden;
        display: inline-block;
      }
      .top-nav .btn-login::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.2);
        transform: translate(-50%, -50%);
        transition: width 0.6s ease, height 0.6s ease;
      }
      .top-nav .btn-login:hover::before {
        width: 300px;
        height: 300px;
      }
      .top-nav .btn-login span {
        position: relative;
        z-index: 1;
      }
      .top-nav.scrolled .btn-login {
        color: white;
        text-shadow: none;
        background: linear-gradient(135deg, #f3704d 0%, #df6646 100%);
        border: 1.5px solid rgba(243, 112, 77, 0.3);
        box-shadow: 0 4px 16px rgba(243, 112, 77, 0.25);
      }
      .top-nav .btn-login:hover {
        color: white;
        transform: translateY(-3px) scale(1.05);
        box-shadow: 0 10px 32px rgba(243, 112, 77, 0.5);
        border-color: rgba(243, 112, 77, 0.8);
      }
      .top-nav.scrolled .btn-login:hover {
        box-shadow: 0 10px 32px rgba(243, 112, 77, 0.45);
      }
      @media (max-width: 768px) {
        .top-nav {
          padding: 15px 30px;
        }
        .top-nav.scrolled {
          padding: 12px 30px;
        }
        .top-nav .nav-logo img {
          height: 35px;
        }
        .top-nav .nav-links {
          gap: 12px;
        }
        .top-nav .nav-link,
        .top-nav .btn-login {
          font-size: 13px;
          padding: 10px 20px;
          letter-spacing: 0.3px;
        }
        .top-nav .nav-link:hover,
        .top-nav .btn-login:hover {
          transform: translateY(-2px) scale(1.03);
        }
      }
    </style>
    <!-- Top Navigation Bar - Modern Design -->
    <nav class="top-nav">
      <a href="/" class="nav-logo">
        <img src="{{ asset('images/logo_white.png') }}" alt="Pixature Logo">
      </a>
      <div class="nav-links">
        <a href="{{ route('enroll') }}" class="nav-link">Enroll Now</a>
        <a href="{{ route('admin.login') }}" class="btn-login"><span>Admin Login</span></a>
      </div>
    </nav>
    <div class="global_container_">
      <div class="color-fill-1-holder">
        <div class="hero">
          <div class="l-constrained">
            <img class="ellipse-1-copy parallax-img" src="{{ asset('images/ellipse_1_copy.png') }}" alt="" width="1339" height="1053">
            <img class="layer-1 parallax-img" src="{{ asset('images/layer_1.jpg') }}" alt="" width="1383" height="1053">
            <img class="layer-1-copy parallax-img" src="{{ asset('images/layer_1_copy.jpg') }}" alt="" width="959" height="1053">
            @php
                $hero = $sections['hero'] ?? null;
                $heroFields = $hero ? (is_array($hero->text_fields) ? $hero->text_fields : (is_string($hero->text_fields) ? json_decode($hero->text_fields, true) : [])) : [];
                $taglineLeft = $heroFields['tagline_left'] ?? 'Create Like a Pro';
                $taglineRight = $heroFields['tagline_right'] ?? 'Design Your Way Forward';
                $mainHeadline = $heroFields['main_headline'] ?? "Learn.\nDesign.\nGrow.";
                // Convert literal \n strings to actual newlines, then split
                $mainHeadline = str_replace('\\n', "\n", $mainHeadline);
                $headlineParts = array_filter(array_map('trim', explode("\n", $mainHeadline)));
                $headlineParts = array_values($headlineParts); // Re-index array
            @endphp
            @if($hero && $hero->image_path)
                <img class="logo-white fade-in" src="{{ \Illuminate\Support\Facades\Storage::url($hero->image_path) }}" alt="Pixature Logo" width="155" height="110">
            @else
                <img class="logo-white fade-in" src="{{ asset('images/logo_white.png') }}" alt="Pixature Logo" width="155" height="110">
            @endif
            @if(count($headlineParts) >= 3)
                <p class="learn fade-in">{{ $headlineParts[0] }}</p>
                <p class="design fade-in">{{ $headlineParts[1] }}</p>
                <p class="grow fade-in">{{ $headlineParts[2] }}</p>
            @elseif(count($headlineParts) == 2)
                <p class="learn fade-in">{{ $headlineParts[0] }}</p>
                <p class="design fade-in">{{ $headlineParts[1] }}</p>
            @elseif(count($headlineParts) == 1)
                <p class="learn fade-in">{{ $headlineParts[0] }}</p>
            @else
                <p class="learn fade-in">Learn.</p>
                <p class="design fade-in">Design.</p>
                <p class="grow fade-in">Grow.</p>
            @endif
            <p class="text slide-left">{!! str_replace(['\n', "\n"], '<br>', $taglineLeft) !!}</p>
            <p class="text-2 slide-right">{!! str_replace(['\n', "\n"], '<br>', $taglineRight) !!}</p>
          </div>
        </div>
        <div class="enroll-now-bar slide-up">
          <div class="l-constrained-3 group">
            @php
                $enrollBar = $sections['cta_bar'] ?? null;
                $enrollText = $enrollBar && is_array($enrollBar->text_fields) ? ($enrollBar->text_fields['cta_text'] ?? $enrollBar->content ?? 'Get Yourself Enrolled for the next batch') : 'Get Yourself Enrolled for the next batch';
            @endphp
            <p class="text-3">{{ $enrollText }}</p>
            <a href="{{ route('enroll') }}" class="rectangle-2-holder enroll-button">
              <img class="text-4" src="{{ asset('images/enroll_now.png') }}" alt="Enroll Now ↗" width="157" height="21" title="Enroll Now ↗">
            </a>
          </div>
        </div>
        <div class="stucked-imagery">
          <div class="l-constrained-2 group">
            <div class="col-3">
              <img class="text-5" src="{{ asset('images/lack_in_new_ideas.png') }}" alt="Lack in New Ideas" width="118" height="63" title="Lack in New Ideas">
              <img class="text-6" src="{{ asset('images/creative_block.png') }}" alt="Creative Block" width="107" height="64" title="Creative Block">
              <img class="text-7" src="{{ asset('images/boring_routines.png') }}" alt="Boring Routines" width="110" height="62" title="Boring Routines">
            </div>
            <div class="col-4">
              <div class="row-5 group">
                <div class="col-6">
                  <img class="text-8 fade-in" src="{{ asset('images/are_you_feeling.png') }}" alt="Are you feeling" width="329" height="59" title="Are you feeling">
                  <img class="stucked scale-in" src="{{ asset('images/stucked.png') }}" alt="Stucked" width="619" height="162" title="Stucked">
                  <img class="text-9 fade-in" src="{{ asset('images/in_creative_path.png') }}" alt="in creative path?" width="361" height="63" title="in creative path?">
                </div>
                <div class="col-7">
                  <img class="text-10" src="{{ asset('images/lost_of_inpsiration.png') }}" alt="Lost of Inpsiration" width="126" height="63" title="Lost of Inpsiration">
                  <img class="text-11" src="{{ asset('images/fear_of_exploration.png') }}" alt="Fear of Exploration" width="116" height="57" title="Fear of Exploration">
                </div>
              </div>
              <img class="text-12" src="{{ asset('images/afraid_of_ai_trends.png') }}" alt="Afraid of Ai &amp; Trends" width="116" height="52" title="Afraid of Ai &amp; Trends">
              <img class="text-13" src="{{ asset('images/cluttered_mindset.png') }}" alt="Cluttered Mindset" width="114" height="69" title="Cluttered Mindset">
            </div>
          </div>
        </div>
        <div class="design-sprint">
          <div class="l-constrained-4">
            <p class="text-14 fade-in">We've been there. And so we built</p>
            <img class="text-15 slide-up" src="{{ asset('images/30_days.png') }}" alt="30 Days" width="254" height="79" title="30 Days">
            <img class="design-2 scale-in" src="{{ asset('images/design_2.png') }}" alt="Design" width="1121" height="406" title="Design">
            <img class="sprint scale-in" src="{{ asset('images/sprint.png') }}" alt="Sprint" width="689" height="280" title="Sprint">
          </div>
        </div>
        <div class="mastering">
          <div class="l-constrained-5 group">
            <div class="col-5">
              @php
                $mastering = $sections['design_sprint'] ?? null;
                $masteringText = $mastering && is_array($mastering->text_fields) ? ($mastering->text_fields['description'] ?? 'Mastering<br>The Hidden<br>Creative Power') : 'Mastering<br>The Hidden<br>Creative Power';
              @endphp
              <p class="text-16 slide-left">{!! str_replace('\n', '<br>', $masteringText) !!}</p>
              <a href="{{ route('enroll') }}" class="rectangle-2-copy-holder enroll-button">
                <img class="text-17" src="{{ asset('images/enroll_now_2.png') }}" alt="Enroll Now ↗" width="275" height="35" title="Enroll Now ↗">
              </a>
            </div>
            <div class="rectangle-5-copy-2-holder slide-right">
              <img class="text-20" src="{{ asset('images/recordings_available.png') }}" alt="Recordings Available" width="47" height="464" title="Recordings Available">
            </div>
            <div class="rectangle-5-copy-holder slide-right">
              <img class="text-19" src="{{ asset('images/career_freelance_guidance.png') }}" alt="Career / Freelance Guidance" width="96" height="413" title="Career / Freelance Guidance">
            </div>
            <div class="rectangle-5-holder slide-right">
              Live Practical
              <br>Sessions
            </div>
          </div>
        </div>
        <div class="video">
          <div class="l-constrained-6">
            <div class="student-counter-wrapper fade-in">
              <div class="student-counter-container">
                <div class="student-counter" id="studentCounter">0</div>
                <div class="student-counter-text">Students Got guaranteed growth in their career</div>
              </div>
            </div>
            <div class="rectangle-6-holder scale-in">
              <img class="text-22" src="{{ asset('images/video_mockup.png') }}" alt="(Video Mockup)" width="358" height="63" title="(Video Mockup)">
            </div>
          </div>
        </div>
        <div class="before-after">
          <div class="col">
            <div class="l-constrained-7">
              <img class="ellipse-2-copy scale-in" src="{{ asset('images/ellipse_2_copy.png') }}" alt="" width="606" height="662">
            </div>
          </div>
          <img class="ellipse-2" src="{{ asset('images/ellipse_2.png') }}" alt="" width="630" height="662">
          <div class="before-after-slider-wrapper slide-up">
            @php
                $beforeAfter = $sections['before_after'] ?? null;
                $beforeAfterText = $beforeAfter && is_array($beforeAfter->text_fields) ? ($beforeAfter->text_fields['heading'] ?? $beforeAfter->content ?? 'Only 1 month of Sprint get you there') : 'Only 1 month of Sprint get you there';
            @endphp
            <p class="text-23 fade-in">{{ $beforeAfterText }}</p>
            <div class="before-after-slider" id="beforeAfterSlider">
              <!-- Demo Images - Replace these with your actual before/after images -->
              <div class="slider-slide active">
                <div class="slider-image-placeholder" style="background: linear-gradient(135deg, #f3704d 0%, #df6646 100%);">
                  <span>Sample 1</span>
                </div>
              </div>
              <div class="slider-slide">
                <div class="slider-image-placeholder" style="background: linear-gradient(135deg, #df6646 0%, #f3704d 100%);">
                  <span>Sample 2</span>
                </div>
              </div>
              <div class="slider-slide">
                <div class="slider-image-placeholder" style="background: linear-gradient(135deg, #f3704d 0%, #df6646 100%);">
                  <span>Sample 3</span>
                </div>
              </div>
              <div class="slider-slide">
                <div class="slider-image-placeholder" style="background: linear-gradient(135deg, #df6646 0%, #f3704d 100%);">
                  <span>Sample 4</span>
                </div>
              </div>
            </div>
            <button class="slider-arrow slider-arrow-left" id="sliderPrev" aria-label="Previous slide">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M15 18L9 12L15 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </button>
            <button class="slider-arrow slider-arrow-right" id="sliderNext" aria-label="Next slide">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M9 18L15 12L9 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </button>
            <div class="slider-dots" id="sliderDots"></div>
          </div>
        </div>
        <div class="cta">
          <div class="col-2">
            <div class="l-constrained-8">
              <img class="text-25 fade-in" src="{{ asset('images/your_design_career_starts.png') }}" alt="Your design career starts here Lets Create Togther" width="1091" height="210" title="Your design career starts here Lets Create Togther">
              <div class="rectangle-4-copy-8-holder cta-button">
                Book your seat now
              </div>
            </div>
          </div>
          <img class="text-27 fade-in" src="{{ asset('images/social_links_and_rest_all.png') }}" alt="Social Links and rest all details" width="1283" height="87" title="Social Links and rest all details">
        </div>
      </div>
    </div>
  </body>
</html>

