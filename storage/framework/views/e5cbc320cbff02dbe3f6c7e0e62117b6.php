<!doctype html>
<html lang="en">
  <head>
    <title>Pixature - Learn. Design. Grow.</title>
    <meta charset="UTF-8">
    <meta name="description" content="Master the hidden creative power with our 30-day Design Sprint. Transform your design career today.">
    <meta name="keywords" content="design, creative, course, sprint, learn design">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <?php echo app('Illuminate\Foundation\Vite')(['resources/static-import/style.css', 'resources/css/landing.css', 'resources/js/landing.js']); ?>
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
        background-image: url('<?php echo e(asset('images/background.jpg')); ?>') !important;
        background-size: cover !important;
        background-position: center top !important;
        background-repeat: no-repeat !important;
        min-width: 1920px !important;
        overflow-x: hidden !important;
      }
      .hero {
        background-image: url('<?php echo e(asset('images/ellipse_1.png')); ?>') !important;
      }
      .stucked-imagery {
        background-image: url('<?php echo e(asset('images/rectangle_4.jpg')); ?>') !important;
        background-attachment: scroll !important;
      }
      .design-sprint {
        background-image: url('<?php echo e(asset('images/rectangle_4_copy.jpg')); ?>') !important;
      }
      .rectangle-5-copy-2-holder {
        background-image: url('<?php echo e(asset('images/rectangle_5_copy_2.png')); ?>') !important;
      }
      .rectangle-5-copy-holder {
        background-image: url('<?php echo e(asset('images/rectangle_5_copy.png')); ?>') !important;
      }
      .rectangle-5-holder {
        background-image: url('<?php echo e(asset('images/rectangle_5.png')); ?>') !important;
      }
      .col-2 {
        background-image: url('<?php echo e(asset('images/rectangle_4_copy_7.jpg')); ?>') !important;
      }
    </style>
    <div class="global_container_">
      <div class="color-fill-1-holder">
        <div class="hero">
          <div class="l-constrained">
            <img class="ellipse-1-copy parallax-img" src="<?php echo e(asset('images/ellipse_1_copy.png')); ?>" alt="" width="1339" height="1053">
            <img class="layer-1 parallax-img" src="<?php echo e(asset('images/layer_1.jpg')); ?>" alt="" width="1383" height="1053">
            <img class="layer-1-copy parallax-img" src="<?php echo e(asset('images/layer_1_copy.jpg')); ?>" alt="" width="959" height="1053">
            <img class="logo-white fade-in" src="<?php echo e(asset('images/logo_white.png')); ?>" alt="Pixature Logo" width="155" height="110">
            <p class="learn fade-in">Learn.</p>
            <p class="text slide-left">Create Like<br>a Pro</p>
            <p class="text-2 slide-right">Design Your<br>Way Forward</p>
            <p class="design fade-in">Design.</p>
            <p class="grow fade-in">Grow.</p>
          </div>
        </div>
        <div class="enroll-now-bar slide-up">
          <div class="l-constrained-3 group">
            <p class="text-3">Get Yourself Enrolled for the next batch</p>
            <div class="rectangle-2-holder enroll-button">
              <img class="text-4" src="<?php echo e(asset('images/enroll_now.png')); ?>" alt="Enroll Now ↗" width="157" height="21" title="Enroll Now ↗">
            </div>
          </div>
        </div>
        <div class="stucked-imagery">
          <div class="l-constrained-2 group">
            <div class="col-3">
              <img class="text-5" src="<?php echo e(asset('images/lack_in_new_ideas.png')); ?>" alt="Lack in New Ideas" width="118" height="63" title="Lack in New Ideas">
              <img class="text-6" src="<?php echo e(asset('images/creative_block.png')); ?>" alt="Creative Block" width="107" height="64" title="Creative Block">
              <img class="text-7" src="<?php echo e(asset('images/boring_routines.png')); ?>" alt="Boring Routines" width="110" height="62" title="Boring Routines">
            </div>
            <div class="col-4">
              <div class="row-5 group">
                <div class="col-6">
                  <img class="text-8 fade-in" src="<?php echo e(asset('images/are_you_feeling.png')); ?>" alt="Are you feeling" width="329" height="59" title="Are you feeling">
                  <img class="stucked scale-in" src="<?php echo e(asset('images/stucked.png')); ?>" alt="Stucked" width="619" height="162" title="Stucked">
                  <img class="text-9 fade-in" src="<?php echo e(asset('images/in_creative_path.png')); ?>" alt="in creative path?" width="361" height="63" title="in creative path?">
                </div>
                <div class="col-7">
                  <img class="text-10" src="<?php echo e(asset('images/lost_of_inpsiration.png')); ?>" alt="Lost of Inpsiration" width="126" height="63" title="Lost of Inpsiration">
                  <img class="text-11" src="<?php echo e(asset('images/fear_of_exploration.png')); ?>" alt="Fear of Exploration" width="116" height="57" title="Fear of Exploration">
                </div>
              </div>
              <img class="text-12" src="<?php echo e(asset('images/afraid_of_ai_trends.png')); ?>" alt="Afraid of Ai &amp; Trends" width="116" height="52" title="Afraid of Ai &amp; Trends">
              <img class="text-13" src="<?php echo e(asset('images/cluttered_mindset.png')); ?>" alt="Cluttered Mindset" width="114" height="69" title="Cluttered Mindset">
            </div>
          </div>
        </div>
        <div class="design-sprint">
          <div class="l-constrained-4">
            <p class="text-14 fade-in">We've been there. And so we built</p>
            <img class="text-15 slide-up" src="<?php echo e(asset('images/30_days.png')); ?>" alt="30 Days" width="254" height="79" title="30 Days">
            <img class="design-2 scale-in" src="<?php echo e(asset('images/design_2.png')); ?>" alt="Design" width="1121" height="406" title="Design">
            <img class="sprint scale-in" src="<?php echo e(asset('images/sprint.png')); ?>" alt="Sprint" width="689" height="280" title="Sprint">
          </div>
        </div>
        <div class="mastering">
          <div class="l-constrained-5 group">
            <div class="col-5">
              <p class="text-16 slide-left">Mastering<br>The Hidden<br>Creative Power</p>
              <div class="rectangle-2-copy-holder enroll-button">
                <img class="text-17" src="<?php echo e(asset('images/enroll_now_2.png')); ?>" alt="Enroll Now ↗" width="275" height="35" title="Enroll Now ↗">
              </div>
            </div>
            <div class="rectangle-5-copy-2-holder slide-right">
              <img class="text-20" src="<?php echo e(asset('images/recordings_available.png')); ?>" alt="Recordings Available" width="47" height="464" title="Recordings Available">
            </div>
            <div class="rectangle-5-copy-holder slide-right">
              <img class="text-19" src="<?php echo e(asset('images/career_freelance_guidance.png')); ?>" alt="Career / Freelance Guidance" width="96" height="413" title="Career / Freelance Guidance">
            </div>
            <div class="rectangle-5-holder slide-right">
              Live Practical
              <br>Sessions
            </div>
          </div>
        </div>
        <div class="video">
          <div class="l-constrained-6">
            <img class="text-21 fade-in" src="<?php echo e(asset('images/1000_students_got_gaurant.png')); ?>" alt="1000+ Students Got gauranteed growth in their career" width="1084" height="245" title="1000+ Students Got gauranteed growth in their career">
            <div class="rectangle-6-holder scale-in">
              <img class="text-22" src="<?php echo e(asset('images/video_mockup.png')); ?>" alt="(Video Mockup)" width="358" height="63" title="(Video Mockup)">
            </div>
          </div>
        </div>
        <div class="before-after">
          <div class="col">
            <div class="l-constrained-7">
              <p class="text-23 fade-in">Only 1 month of Sprint get you there</p>
              <img class="ellipse-2-copy scale-in" src="<?php echo e(asset('images/ellipse_2_copy.png')); ?>" alt="" width="606" height="662">
            </div>
          </div>
          <img class="ellipse-2" src="<?php echo e(asset('images/ellipse_2.png')); ?>" alt="" width="630" height="662">
          <div class="row group slide-up">
            <img class="triangle-1" src="<?php echo e(asset('images/triangle_1.png')); ?>" alt="" width="73" height="84">
            <p class="text-24">Before / After<br>image placeholder (Sliders)</p>
            <img class="triangle-1-copy" src="<?php echo e(asset('images/triangle_1_copy.png')); ?>" alt="" width="74" height="84">
          </div>
        </div>
        <div class="cta">
          <div class="col-2">
            <div class="l-constrained-8">
              <img class="text-25 fade-in" src="<?php echo e(asset('images/your_design_career_starts.png')); ?>" alt="Your design career starts here Lets Create Togther" width="1091" height="210" title="Your design career starts here Lets Create Togther">
              <div class="rectangle-4-copy-8-holder cta-button">
                Book your seat now
              </div>
            </div>
          </div>
          <img class="text-27 fade-in" src="<?php echo e(asset('images/social_links_and_rest_all.png')); ?>" alt="Social Links and rest all details" width="1283" height="87" title="Social Links and rest all details">
        </div>
      </div>
    </div>
  </body>
</html>

<?php /**PATH E:\Softwares DEV- Chiki\Pixature web\resources\views/landing.blade.php ENDPATH**/ ?>