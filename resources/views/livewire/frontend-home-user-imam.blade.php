<div class="container" id="main">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.2/css/all.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <style>

  body {
    margin: 0 auto;
    margin-top: 60px;
    max-width: 90%;
    background-color: #efe3eb;
  }

  .center-block {
    display: block;
    margin: 0 auto;
  }

  .caption {
    text-align: center;
  }

  .center-button {
    text-align:center;
  }

  .jumbotron {
    background-color: #E0D3AD;
  }

  .jumbotron h1{
    color: #337AB7;
  }

   .jumbotron p {
    font-size: 1.7rem;
  }

  .jumbotron, img#image, blockquote, #img-caption {
    width: 85%;
    margin-left: auto;
    margin-right: auto;
  }

  @media (min-width: 1200px) {
    .container {
      width: 90%;
    }
  }

  img.github-logo {
  position: fixed;
  bottom: 0;
  right: 0;
  margin: 20px;
    width: 40px;
}

 button {
    margin: 15px 0 !important;
  }

iframe.center-block {
    margin-top: 30px;
    margin-bottom: 20px;
  }
  /*-----------------------------------------------------
# Services
-----------------------------------------------------*/
.services {
    padding-bottom: 30px;
    text-align: center;
    padding: 50px 0px;
}
.services .section-title h2 {
    color: #444;
    font-size: 42px;
}
.services .section-title p {
    text-align: center;
    font-style: italic;
    margin-bottom: 40px;
    color: #666;
}
.services .service-box {
    margin-bottom: 30px;
    padding: 15px;
    text-align: center;
    box-shadow: 0px 0 5px #bdbdbd;
    float: left;
    position: relative;
    z-index: 1;
    overflow: hidden;
}
.services .service-box::after {
    content: '';
    position: absolute;
    width: 100%;
    height: 100%;
    background: #f1f1f1;
    left: 0px;
    top: -500px;
    z-index: -1;
    transition: 1s;
}
.services .service-box:hover::after {
    top: 0px;
}
.services i {
    display: flex;
    justify-content: center;
}
.services i {
    width: 70px;
    height: 70px;
    margin-bottom: 30px;
    background: #ffffff;
    border-radius: 100%;
    transition: 0.5s;
    color: #28a745;
    font-size: 35px;
    overflow: hidden;
    padding-top: 18px;
    box-shadow: 0px 0 5px #bdbdbd;
    margin: 10px auto 15px;
}
.services h4 {
    font-weight: 600;
    margin-bottom: 15px;
    font-size: 18px;
    position: relative;
}
.services h4 a {
    color: #444;
    text-decoration: none;
}
.services h4 a:hover {
    color: #28a745;
}
.services p {
    line-height: 24px;
    font-size: 14px;
}
    </style>

    <center>
    @if(Session::has('approve_message'))
         <p class="alert alert-info text-center text-info">{{ Session::get('approve_message') }}</p>
      @endif
    <section class="services">
      <div class="container">
         <div class="section-title">
            <h2>Our Services</h2>
         </div>
         <div class="row">
            <div class="col-lg-4 col-md-6" data-aos="fade-up">
               <div class="service-box" style="height: 280px;">
               <i class="fas fa-quran"></i>
                  <h4><a href="">Quaran</a></h4>
                  <p>ٱلْحَمْدُ لِلَّهِ ٱلَّذِى خَلَقَ ٱلسَّمَـٰوَٰتِ وَٱلْأَرْضَ وَجَعَلَ ٱلظُّلُمَـٰتِ وَٱلنُّورَ ثُمَّ ٱلَّذِينَ كَفَرُوا۟ بِرَبِّهِمْ يَعْدِلُونَ</p>
               </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up">
               <div class="service-box" style="height: 280px;">
               <i class="fas fa-star-and-crescent"></i>
                  <h4><a href="">Hadis</a></h4>
                  <p>হযরত (সাঃ ) বলেন, বরকতের দিক থেকে মর্যাদাপূর্ণ বিবাহ হচ্ছে, যে বিবাহে মোহর অল্প হয় | (আল হাদিস )</p>
               </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up">
               <div class="service-box" style="height: 280px;">
               <i class="fas fa-blog"></i>
                  <h4><a href="">Post</a></h4>
                  <p>What exactly is a blog?
A blog (a truncation of "weblog") is a discussion or informational website published on the World Wide Web.</p>
               </div>
            </div>
            <div class="col-lg-2 col-md-3"></div>

            <div class="col-lg-4 col-md-6" data-aos="fade-up">
               <div class="service-box" style="height: 280px;">
               <i class="fas fa-book-open"></i>
                  <h4><a href="">Quiz</a></h4>
                  <p>Volleyball is a team sport in which two teams of six players are separated by a net. Each team tries to score points by grounding</p>
               </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up">
               <div class="service-box" style="height: 280px;">
               <i class="fas fa-search-location"></i>
                  <h4><a href="">Mosque</a></h4>
                  <p>Find Mosques (Masjids), Prayer rooms & places in Dhaka, Bangladesh. Guide to Mosques, Prayer rooms and Musallahs near your location.</p>
               </div>
            </div>
            <div class="col-lg-2 col-md-2"></div>
         </div>
      </div>
   </section>
    <div class="jumbotron" id="tribute-info" style="background-color: #c7ebd1;">


   <!-- End Services Section -->
    <iframe width="80%" height="315" class="center-block" src="https://www.youtube.com/embed/1qBZtXx-VpY?" frameborder="0" allowfullscreen></iframe>

    <p> <strong>Al-Masjid an-Nabawī</strong> (Arabic: ٱلْمَسْجِدُ ٱلنَّبَويّ‎, lit. 'Prophet's Mosque'‎) is a mosque established and originally built by the Islamic prophet Muhammad ﷺ, situated in the city of Medina in Saudi Arabia. Al-Masjid an-Nabawi was the third mosque built in the history of Islam and is now one of the largest mosques in the world. It is the second-holiest site in Islam, after Masjid al-Haram in Makkah. It is always open, regardless of date or time.</p>

    <p>The site was originally adjacent to the Prophet's ﷺ house; he settled there after his Hijra (emigration) to Medina in 622 CE. He shared in the heavy work of construction. The original mosque was an open-air building. The mosque served as a community center, a court, and a religious school. There was a raised platform for the people who taught the Quran. Subsequent Islamic rulers greatly expanded and decorated it. In 1909, it became the first place in the Arabian Peninsula to be provided with electrical lights.The mosque is under the control of the Custodian of the Two Holy Mosques. The mosque is located in what was traditionally the center of Medina, with many hotels and old markets nearby. It is a major pilgrimage site. Many pilgrims who perform the Hajj go on to Medina to visit the mosque due to its connections to the life of the prophet Muhammad ﷺ.</p>
    <br>

  </div>







</div>
    </center>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
