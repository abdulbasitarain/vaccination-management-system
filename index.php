<?php include './header.php';
?>
<link rel="stylesheet" href="css/index.css">

<!-- style -->

<style>
  .icons-container {
    padding: 20px;
  }
   @media screen and (max-width:992px) {
    .icons-container {
      grid-template-columns: auto auto;
    }
  }
</style>

<!-- Bnr Header -->
<!-- Page Loader -->
<div id="loader">
<div class="position-center-center">
  <img width="90%" src="images/logoo.png" alt="Preloader">
</div>
</div>

<section class="main-banner">
  <div class="tp-banner-container">
    <div class="tp-banner">
      <ul>
        <!-- SLIDE  -->
        <li data-transition="random" data-slotamount="7" data-masterspeed="300" data-saveperformance="off" > 
          <!-- MAIN IMAGE --> 
          <img src="images/slide1.jpg"  alt="slider"  data-bgposition=" center center" data-bgfit="cover" data-bgrepeat="no-repeat"> 
          
          <!-- LAYER NR. 1 -->
          <div class="tp-caption sfl tp-resizeme" 
              data-x="center" data-hoffset="0" 
              data-y="center" data-voffset="-120" 
              data-speed="800" 
              data-start="800" 
              data-easing="Power3.easeInOut" 
              data-splitin="chars" 
              data-splitout="none" 
              data-elementdelay="0.03" 
              data-endelementdelay="0.4" 
              data-endspeed="300"
              style="z-index: 5; font-size:50px; font-weight:500; color:black;  max-width: auto; max-height: auto; white-space: nowrap;">Vaccination Management System</div>
          
          <!-- LAYER NR. 2 -->
          <div class="tp-caption sfr tp-resizeme" 
              data-x="center" data-hoffset="0" 
              data-y="center" data-voffset="-60" 
              data-speed="800" 
              data-start="1000" 
              data-easing="Power3.easeInOut" 
              data-splitin="chars" 
              data-splitout="none" 
              data-elementdelay="0.03" 
              data-endelementdelay="0.1" 
              data-endspeed="300" 
              style="z-index: 6; font-size:40px; color:gray; font-weight:500; white-space: nowrap;">We care about your health</div>
          
          <!-- LAYER NR. 3 -->
          <div class="tp-caption sfb tp-resizeme" 
              data-x="center" data-hoffset="0" 
              data-y="center" data-voffset="0" 
              data-speed="800" 
              data-start="1200" 
              data-easing="Power3.easeInOut" 
              data-splitin="none" 
              data-splitout="none" 
              data-elementdelay="0.1" 
              data-endelementdelay="0.1" 
              data-endspeed="300" 
              style="z-index: 7;  font-size:22px; color:gray; font-weight:500; max-width: auto; max-height: auto; white-space: nowrap;">Best Vaccination Services in your town</div>
          
          <!-- LAYER NR. 4 -->
          <div class="tp-caption lfb tp-resizeme scroll" 
              data-x="center" data-hoffset="0" 
              data-y="center" data-voffset="120"
              data-speed="800" 
              data-start="1300"
              data-easing="Power3.easeInOut" 
              data-elementdelay="0.1" 
              data-endelementdelay="0.1" 
              data-endspeed="300" 
              data-scrolloffset="0"
              style="z-index: 8;"><a href="childappointment.php" class="btn">Book Now</a> </div>
        </li>
        
        <!-- SLIDE  -->
        <li data-transition="random" data-slotamount="7" data-masterspeed="2
        00"  data-saveperformance="off" > 
          <!-- MAIN IMAGE --> 
          <img src="images/slide2.jpg"  alt="slider"  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat"> 
          
          <!-- LAYER NR. 1 -->
          <div class="tp-caption sfl tp-resizeme" 
              data-x="left" data-hoffset="400" 
              data-y="center" data-voffset="-100" 
              data-speed="800" 
              data-start="800" 
              data-easing="Power3.easeInOut" 
              data-splitin="chars" 
              data-splitout="none" 
              data-elementdelay="0.03" 
              data-endelementdelay="0.4" 
              data-endspeed="300"
              style="z-index: 5; font-size:40px; font-weight:500; color:#000;  max-width: auto; max-height: auto; white-space: nowrap;">Best Vacccination Centre </div>
          
          <!-- LAYER NR. 2 -->
          <div class="tp-caption sfr tp-resizeme" 
              data-x="left" data-hoffset="400" 
              data-y="center" data-voffset="-40" 
              data-speed="800" 
              data-start="800" 
              data-easing="Power3.easeInOut" 
              data-splitin="chars" 
              data-splitout="none" 
              data-elementdelay="0.03" 
              data-endelementdelay="0.4" 
              data-endspeed="300"
              style="z-index: 5; font-size:55px; font-weight:500; color:#000;  max-width: auto; max-height: auto; white-space: nowrap;">Care And Cure</div>
          
          <!-- LAYER NR. 3 -->
          <div class="tp-caption sfb tp-resizeme" 
              data-x="center" data-hoffset="0" 
              data-y="center" data-voffset="30" 
              data-speed="800" 
              data-start="1400" 
              data-easing="Power3.easeInOut" 
              data-splitin="none" 
              data-splitout="none" 
              data-elementdelay="0.1" 
              data-endelementdelay="0.1" 
              data-endspeed="300" 
              style="z-index: 7; font-size:16px; color:#000; text-align:center; font-weight:500; line-height:26px; max-width: auto; max-height: auto; white-space: nowrap;">Improved diagnostic performance and heightened satisfaction of patients <br> and physicians delight.</div>
          
          <!-- LAYER NR. 4 -->
          <div class="tp-caption lfb tp-resizeme scroll" 
              data-x="center" data-hoffset="0" 
              data-y="center" data-voffset="140"
              data-speed="800" 
              data-start="1600"
              data-easing="Power3.easeInOut" 
              data-elementdelay="0.1" 
              data-endelementde lay="0.1" 
              data-endspeed="300" 
              data-scrolloffset="0"
              style="z-index: 8;"><a href="contact.php" class="btn">CONTACT NOW</a> </div>
        </li>
        
        <!-- SLIDE  -->
        <li data-transition="random" data-slotamount="7" data-masterspeed="300"  data-saveperformance="off" > 
          <!-- MAIN IMAGE --> 
          <img src="images/slide3.jpg"  alt="slider"  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat"> 
          
          <!-- LAYER NR. 2 -->
          <div class="tp-caption sfb tp-resizeme" 
              data-x="center" data-hoffset="0" 
              data-y="center" data-voffset="-80" 
              data-speed="800" 
              data-start="800" 
              data-easing="Power3.easeInOut" 
              data-elementdelay="0.1" 
              data-endelementdelay="0.1" 
              data-endspeed="300" 
              data-scrolloffset="0"
              style="z-index: 6; font-size:40px; color:#000; font-weight:500; white-space: nowrap;"> Welcome To Our Research Center </div>
          
          <!-- LAYER NR. 3 -->
          <div class="tp-caption sfb tp-resizeme text-center" 
              data-x="center" data-hoffset="0" 
              data-y="center" data-voffset="-10" 
              data-speed="800" 
              data-start="1000" 
              data-easing="Power3.easeInOut" 
              data-elementdelay="0.1" 
              data-endelementdelay="0.1" 
              data-endspeed="300" 
              data-scrolloffset="0"
              style="z-index: 7; font-size:20px; font-weight:500; line-height:26px; color:#000; max-width: auto; max-height: auto; white-space: nowrap;">We work in a friendly and efficient using the latest <br>
            technologies and sharing our expertise.</div>
        </li>
      </ul>
    </div>
  </div>
</section>

  <!-- home section starts  -->

  <section class="home" id="home sections">

      <div class="image wow fadeInLeft" data-wow-delay="0.2s">
          <img src="images/svgs/home-img.svg" alt="Doctor Svg">
      </div>

      <div class="content wow fadeInRight" data-wow-delay="0.2s">
      <h3>Want to be a vaccinated person?</h3>
      <p>Instantly book an appoinment with just one click...</p>
      <div class="cta-btn">
        <a href="childappointment.php" id="btn" class="btn btn-primary btn-lg">Book an appoinment</a>
      </div>
      </div>
  </section>

  <!-- home section ends -->
  <!-- icons section starts  -->

  <div class="container-fluid px-5 py-5 Body-3-counter-bg">
      <div class="row g-3 ">
            <div class="col-lg-3 col-md-6">
                <div class="counter-box colored-1">
                <i class="fa-solid fa-syringe fa-2xl" style=" color: #ffffff; margin-bottom:20px;"></i>                
                <span class="counter">1000</span>
                    <p>Total Vaccinated Childs</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="counter-box colored-2">
                <i class="fa-solid fa-hospital fa-2xl" style="color: #ffffff; margin-bottom:20px;"></i>                    
                <span class="counter">08</span>
                    <p>Total Hospitals</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="counter-box colored-3">
                <i class="fa-solid fa-user-lock fa-2xl" style="color: #ffffff; margin-bottom:20px;"></i>                    
                <span class="counter">1</span>
                    <p>Total Admin</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="counter-box colored-4">
                <i class="fa-solid fa-syringe fa-2xl" style="color: #ffffff; margin-bottom:20px;"></i>                
                    <span class="counter">10</span>
                    <p>Total Available Vaccines</p>
                </div>
            </div>
      </div>
  </div>

  <!-- icons section ends -->

<!-- Content -->
<div id="content"> 
  
  <!-- Intro -->
  <section style="padding-top: 50px">
    <div class="container">
      <div class="intro-main">
        <div class="row"> 
          
          <!-- Intro Detail -->
          <div class="col-md-12">
            <div class="text-sec">
              <h5>Health Check Ups</h5>
              <p>Besides providing world class clinical lab services, Labaid Diagnostic Centre houses a pool of doctors of different medical specialty to serve the ailing patients as outpatients. They are all reputed and respected in their medical specialty for outstanding clinical management</p>
              <ul class="row">
                <li class="col-sm-6">
                  <h6> <i class="fa fa-check-circle"></i> EMERGENCY CASE</h6>
                  <p>Excepteur sint occaecat cupidatat non roident, 
                    sunt in culpa qui officia deserunt mollit </p>
                </li>
                <li class="col-sm-6">
                  <h6> <i class="fa fa-check-circle"></i> QUALIFIED DOCTORS</h6>
                  <p>Excepteur sint occaecat cupidatat non roident, 
                    sunt in culpa qui officia deserunt mollit </p>
                </li>
                <li class="col-sm-6">
                  <h6> <i class="fa fa-check-circle"></i> ONLINE APPOINTMENT</h6>
                  <p>Excepteur sint occaecat cupidatat non roident, 
                    sunt in culpa qui officia deserunt mollit </p>
                </li>
                <li class="col-sm-6">
                  <h6> <i class="fa fa-check-circle"></i> FREE MEDICAL COUNSELING</h6>
                  <p>Excepteur sint occaecat cupidatat non roident, 
                    sunt in culpa qui officia deserunt mollit </p>
                </li>
              </ul>
            </div>
          </div>
        </div></div></div></section></div>

           <!-- *****************************FAQ********************************* -->
           
  <div class="main">
           <div class="accordion">
    <div class="image-box">
      <img src="./images/character.avif" alt="">
    </div>
    <div class="accordion-text">
      <div class="title">FAQ</div>
    <ul class="faq-text">
      <li>
        <div class="question-arrow">
          <span class="question">What is vaccination?</span>
          <i class="bx bxs-chevron-down arrow"></i>
        </div>
        <p>Vaccination is a simple, safe, and effective way of protecting you against harmful diseases, before you come into contact with them. It uses your body’s natural defenses to build resistance to specific infections and makes your immune system stronger.</p>
        <span class="line"></span>
      </li>
      <li>
        <div class="question-arrow">
          <span class="question">Are vaccines safe?</span>
          <i class="bx bxs-chevron-down arrow"></i>
        </div>
        <p>Vaccination is safe and side effects from a vaccine are usually minor and temporary, such as a sore arm or mild fever. More serious side effects are possible, but extremely rare.</p>
        <span class="line"></span>
      </li>
      <li>
        <div class="question-arrow">
          <span class="question">Are there side effects from vaccines?</span>
          <i class="bx bxs-chevron-down arrow"></i>
        </div>
        <p>Like any medicine, vaccines can cause mild side effects, such as a low-grade fever, or pain or redness at the injection site. Mild reactions go away within a few days on their own. <br>Severe or long-lasting side effects are extremely rare. Vaccines are continually monitored for safety, to detect rare adverse events.</p>
        <span class="line"></span>
      </li>
      <li>
        <div class="question-arrow">
          <span class="question">How does a vaccine work?</span>
          <i class="bx bxs-chevron-down arrow"></i>
        </div>
        <p>Vaccines reduce risks of getting a disease by working with your body’s natural defenses to build protection. When you get a vaccine, your immune system responds. <br>The vaccine is therefore a safe and clever way to produce an immune response in the body, without causing illness.</p>
        <span class="line"></span>
      </li>
      <li>
        <div class="question-arrow">
          <span class="question">When should I get vaccinated (or vaccinate my child)?</span>
          <i class="bx bxs-chevron-down arrow"></i>
        </div>
        <p>Vaccines protect us throughout life and at different ages, from birth to childhood, as teenagers and into old age. In most countries you will be given a vaccination card that tells you what vaccines you or your child have had and when the next vaccines or booster doses are due. It is important to make sure that all these vaccines are up to date. <br>If we delay vaccination, we are at risk of getting seriously sick. If we wait until we think we may be exposed to a serious illness – like during a disease outbreak – there may not be enough time for the vaccine to work and to receive all the recommended doses.</p>
        <span class="line"></span>
      </li>
    </ul>
    </div>
  </div>

  </div>
  <script>
    let li = document.querySelectorAll(".faq-text li");
    for (var i = 0; i < li.length; i++) {
      li[i].addEventListener("click", (e)=>{
        let clickedLi;
        if(e.target.classList.contains("question-arrow")){
          clickedLi = e.target.parentElement;
        }else{
          clickedLi = e.target.parentElement.parentElement;
        }
       clickedLi.classList.toggle("showAnswer");
      });
    }
  </script>
           <!-- *****************************FAQ********************************* -->


<!-- Footer -->
<?php include 'footer.php';?>