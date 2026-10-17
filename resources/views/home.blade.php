<!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <title>StudiPath Indonesia | Overseas Education Consultancy</title>
    <meta name="description" content="One partner, one clear path, from counselling to departure. StudiPath Indonesia supports students with study pathways, Pearson Edexcel exam prep and full-cycle admissions.">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="images/logofix.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;700;800;900&family=Plus+Jakarta+Sans:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    </head>
    <body>

    <header>
      <div class="wrap nav">
        <!-- <a href="#home" class="logo" aria-label="StudiPath home"><img class="logo-img" src="images/logofix.png" alt="StudiPath" width="400" height="454"></a> -->
        <a href="#home" class="logo" aria-label="StudiPath home">
          <img class="logo-img" src="images/logofix.png" alt="" width="400" height="454">
          <span class="brand">STUDI<b>PATH</b></span>
        </a>
        <nav aria-label="Main">
          <ul id="menu">
            <li><a href="#meetyourconsultant">Meet StudiPath Indonesia</a></li>
            <li><a href="#why">Why Us</a></li>
            <li><a href="#journey">Student Journey</a></li>
            <li><a href="#support">Your Future</a></li>
            <li><a href="#destinations">Explore your Destinations</a></li>
          </ul>
        </nav>
        <a class="btn sm" href="https://wa.me/6281235422626" target="_blank" rel="noopener">Reach Us</a>
        <button class="burger" aria-label="Open menu" aria-expanded="false" aria-controls="menu"><span></span><span></span><span></span></button>
      </div>
    </header>

    <main>
      <section class="hero" id="home">
        <svg class="squiggle" viewBox="0 0 1400 1200" preserveAspectRatio="xMidYMid slice" aria-hidden="true">
          <path d="M-60 260 C 200 120, 330 420, 520 330 C 700 240, 640 60, 820 120 C 1000 180, 760 560, 640 760 C 560 900, 900 880, 1000 600 C 1080 380, 1180 300, 1260 420 C 1340 540, 1240 760, 1100 860 C 960 960, 700 940, 520 1040 C 340 1140, 200 1000, 120 1100 C 60 1160, 100 1240, 160 1290"/>
        </svg>

        <div class="hero-top">
          <div class="wrap">
            <!-- <div class="tag rise">StudiPath INDONESIA</div> -->
            <h1 class="rise">
                Your Education Consultant for a Pathway to
                <span class="fly">Global Education<svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M21 3 3 10.5l6.5 2.5L12 20l2.5-5.5L21 3Zm-3.6 4.4-6.2 5.1-1.7-.7 7.9-4.4Z"/></svg></span>
            </h1>
            <p class="rise">We guide students, parents  and school through every step, from first consultation to departure, <b>we guide every step.</b></p>
            <div class="cta rise">
              <a class="btn" href="https://wa.me/6281235422626" target="_blank" rel="noopener">Start a conversation</a>
              <a class="btn ghost" href="#journey">See the journey</a>
            </div>
          </div>
          <div class="scroll" aria-hidden="true"></div>
        </div>

        <div class="wrap about-in" id="meetyourconsultant">
          <h2 class="rv">Meet StudiPath Indonesia</h2>
          <div class="rv d1">
            <p class="intro"><b>StudiPath Indonesia</b> is an overseas education consultancy for students. We understand the challenges that come with preparing to study abroad, and we're here to make that journey clearer.</p>
            <p>Founded in 2024, we support students with international study pathways, Pearson Edexcel exam preparation, and full-cycle admission services.</p>
            <p>As one trusted partner, we guide students through every stage: counselling, applications, visa processing, and pre-departure guidance, turning study-abroad goals into a clear, actionable path.</p>
          </div>
          <div class="facts rv d2"><span>Founded 2024</span><span>Pearson Edexcel</span><span>Full-cycle admissions</span></div>
        </div>
      </section>

      <section id="why">
        <div class="wrap">
          <h2 class="rv">Why choose StudiPath</h2>
          <div class="cards">
            <article class="card rv"><span class="n">01</span><h3>Personalised Consultation</h3><p>One-on-one counselling tailored to each student's goals, strengths, and unique study pathway.</p></article>
            <article class="card rv d1"><span class="n">02</span><h3>End to End Support</h3><p>A single dedicated partner for your entire overseas study journey. We manage every step from initial inquiry to pre-departure preparation, minimising hassle for students, families and schools.</p></article>
            <article class="card rv d2"><span class="n">03</span><h3>Pearson &amp; Pathway Specialist</h3><p>Specialised in Pearson Edexcel curriculum and international university pathways.</p></article>
            <article class="card rv d3"><span class="n">04</span><h3>Experienced Academic Mentors</h3><p>Mentors with deep knowledge of international curricula and global university admissions.</p></article>
          </div>
        </div>
      </section>

      <section class="journey" id="journey">
        <div class="wrap">
          <h2 class="rv">One student, One journey.</h2>
          <p class="lead rv d1" style="margin-top:18px"><b>We handle all of it.</b></p>
          <div class="steps" id="steps">
            <div class="prog" id="prog"></div>
            <div class="step"><div class="dot">1</div><div class="box"><h3>Approach</h3><p>First contact with StudiPath, from school, parents or student.</p></div></div>
            <div class="step"><div class="dot">2</div><div class="box"><h3>Consultation</h3><p>1-on-1 counselling to discuss study goals, target countries, and preferred majors.</p></div></div>
            <div class="step"><div class="dot">3</div><div class="box"><h3>Application</h3><p>We prepare all documents and manage university applications.</p></div></div>
            <div class="step"><div class="dot">4</div><div class="box"><h3>Visa</h3><p>Full support for your visa application process.</p></div></div>
            <div class="step"><div class="dot">5</div><div class="box"><h3>Ready to Study</h3><p>Pre-departure guidance before you depart for campus.</p></div></div>
          </div>
        </div>
      </section>

      <section class="support" id="support">
        <div class="wrap">
          <h2 class="rv">How we can support your future</h2>
          <p class="lead rv d1" style="margin-top:18px">StudiPath acts as your dedicated education partner for international pathway guidance.</p>
          <div class="cards">
            <article class="card rv">
              <div class="ico" aria-hidden="true">
                <svg viewBox="0 0 24 24"><path d="M21 15a2 2 0 0 1-2 2H8l-5 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/><path d="M8 8h8M8 12h5"/></svg>
              </div>
              <div><h3>Student Consultation</h3><p>Personalised overseas study counselling to help students explore international study options.</p></div>
            </article>
            <article class="card rv d1">
              <div class="ico" aria-hidden="true">
                <svg viewBox="0 0 24 24"><path d="M14 3H7a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8z"/><path d="M14 3v5h5"/><path d="m9 14.5 2 2 4-4.5"/></svg>
              </div>
              <div><h3>Application &amp; Visa Support</h3><p>One trusted partner to assist students through the full university application and visa process.</p></div>
            </article>
            <article class="card rv d2">
              <div class="ico" aria-hidden="true">
                <svg viewBox="0 0 24 24"><path d="M2 5h6a4 4 0 0 1 4 4v11a3 3 0 0 0-3-3H2z"/><path d="M22 5h-6a4 4 0 0 0-4 4v11a3 3 0 0 1 3-3h7z"/></svg>
              </div>
              <div><h3>Academic Preparation</h3><p>Pearson Edexcel exam preparation, subject tutoring, and tailored exam strategy training.</p></div>
            </article>
            <article class="card rv d3">
              <div class="ico" aria-hidden="true">
                <svg viewBox="0 0 24 24"><circle cx="9" cy="8" r="3.5"/><path d="M2.5 20c0-3.6 2.9-6 6.5-6s6.5 2.4 6.5 6"/><circle cx="17.5" cy="9" r="2.5"/><path d="M17 14.2c2.7.1 4.5 1.9 4.5 4.8"/></svg>
              </div>
              <div><h3>Parent Consultation</h3><p>Regular progress updates and guidance sessions for parents throughout their child's overseas study journey.</p></div>
            </article>
          </div>
        </div>
      </section>

      <section class="dest" id="destinations">
        <div class="wrap">
          <h2 class="rv">Where your path can lead</h2>
          <p class="lead rv d1" style="margin-top:18px">Choose a destination. We take care of the rest.</p>
        </div>

        <figure class="unilogos rv">
            <figcaption><span class="pdot"></span>Our partner universities</figcaption>
            <div class="scrollx">
                <img src="{{ asset('images/univ.png') }}" alt="Logos of partner universities in Australia, the United Kingdom, Malaysia, Canada, the United States, Japan and Singapore" width="1920" height="693" loading="lazy">
            </div>
            <p class="swipe">Swipe to see more →</p>
        </figure>

        <div class="dest-rows">
          <div class="marquee" id="mq1" aria-label="Study destinations"></div>
          <div class="marquee rev" id="mq2" aria-hidden="true"></div>
        </div>

        <div class="wrap"><div class="more rv">And many more.....</div></div>
      </section>

      {{-- <section class="unis" id="universities">
        <div class="wrap">
          <h2 class="rv">Top-ranked partner universities in every destination</h2>
          <p class="lead rv d1" style="margin-top:18px">Source: QS World University Rankings 2027</p>
          <div style="text-align:center">
            <p class="ulegend rv d2">
              <span class="rk t"><svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="m12 2 2.9 6.3 6.9.8-5.1 4.7 1.4 6.8L12 17.1 5.9 20.6l1.4-6.8L2.2 9.1l6.9-.8z"/></svg>Top 100</span>
              <span>Ranked in the world's <b>top 100</b></span>
            </p>
          </div>

          <div class="ucols">
            <article class="ucard rv">
              <div class="uh"><img src="https://flagcdn.com/w80/au.png" width="36" height="27" alt="" loading="lazy"><h3>Australia</h3><span class="cnt">5 Universities</span></div>
              <ul>
                <li><span>UNSW Sydney</span><span class="rk t">#19</span></li>
                <li><span>The University of Queensland</span><span class="rk t">#40</span></li>
                <li><span>The University of Western Australia</span><span class="rk t">#77</span></li>
                <li><span>Adelaide University</span><span class="rk t">#79</span></li>
                <li><span>University of Technology Sydney</span><span class="rk t">#87</span></li>
              </ul>
            </article>

            <article class="ucard rv d1">
              <div class="uh"><img src="https://flagcdn.com/w80/gb.png" width="36" height="27" alt="" loading="lazy"><h3>United Kingdom</h3></div>
              <ul><li><span>University of Plymouth</span><span class="rk">#691</span></li></ul>
            </article>

            <article class="ucard rv">
              <div class="uh"><img src="https://flagcdn.com/w80/nz.png" width="36" height="27" alt="" loading="lazy"><h3>New Zealand</h3></div>
              <ul><li><span>University of Canterbury</span><span class="rk">#257</span></li></ul>
            </article>

            <article class="ucard rv d1">
              <div class="uh"><img src="https://flagcdn.com/w80/my.png" width="36" height="27" alt="" loading="lazy"><h3>Malaysia</h3></div>
              <ul><li><span>UCSI University</span><span class="rk">#282</span></li></ul>
            </article>

            <article class="ucard rv">
              <div class="uh"><img src="https://flagcdn.com/w80/ca.png" width="36" height="27" alt="" loading="lazy"><h3>Canada</h3></div>
              <ul><li><span>University of Manitoba</span><span class="rk">#560</span></li></ul>
            </article>

            <article class="ucard rv d1">
              <div class="uh"><img src="https://flagcdn.com/w80/us.png" width="36" height="27" alt="" loading="lazy"><h3>United States</h3></div>
              <ul><li><span>University of Connecticut</span><span class="rk">#534*</span></li></ul>
            </article>

            <article class="ucard rv">
              <div class="uh"><img src="https://flagcdn.com/w80/jp.png" width="36" height="27" alt="" loading="lazy"><h3>Japan</h3></div>
              <ul><li><span>Shibaura Institute of Technology</span><span class="rk n"></span></li></ul>
            </article>

            <article class="ucard rv d1">
              <div class="uh"><img src="https://flagcdn.com/w80/sg.png" width="36" height="27" alt="" loading="lazy"><h3>Singapore</h3><span class="cnt">2 Universities</span></div>
              <ul>
                <li><span>Kaplan Singapore</span><span class="rk n"></span></li>
                <li><span>Curtin Singapore</span><span class="rk n"></span></li>
              </ul>
            </article>
          </div>

          <p class="qsnote rv">*QS World University Rankings 2026.</p>
        </div>
      </section> --}}

      <section class="cta-sec" id="contact">
        <div class="wrap">
          <div class="box rv">
            <div class="orb" aria-hidden="true"></div>
            <svg class="plane" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M21 3 3 10.5l6.5 2.5L12 20l2.5-5.5L21 3Zm-3.6 4.4-6.2 5.1-1.7-.7 7.9-4.4Z"/></svg>

            <h2>Reach us <span class="hl">now.</span></h2>
            <p class="cta-brand"><span class="dot"></span>StudiPath Indonesia.</p>
            <p class="cta-lead">Let's start your students' <mark>journey</mark> together.</p>

            <a class="btn big" href="#book">Book a free consultation</a>
            <p class="or">Or reach us on</p>
            <div class="row">
              <a class="soc wapp" href="https://wa.me/6281235422626" target="_blank" rel="noopener">
                <span class="si"><svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 2a10 10 0 0 0-8.6 15L2 22l5.2-1.4A10 10 0 1 0 12 2Zm5.2 14.2c-.2.6-1.3 1.2-1.8 1.2-.5.1-1 .2-3.3-.7-2.800-1.200-4.600-4-4.700-4.200-.1-.2-1.100-1.500-1.100-2.800s.7-2 1-2.300c.2-.3.500-.3.700-.3h.5c.2 0 .4 0 .6.500l.9 2.100c.1.200.1.400 0 .5l-.4.600c-.2.200-.3.300-.1.600.2.300.8 1.300 1.700 2.100 1.100 1 2.100 1.300 2.400 1.400.3.100.5.100.7-.1l1-1.200c.2-.3.400-.2.700-.1l2 1c.3.100.5.200.5.300.1.200.1.700-.1 1.300Z"/></svg></span>
                WhatsApp
              </a>
              <a class="soc ig" href="https://instagram.com/studi.path" target="_blank" rel="noopener">
                <span class="si"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true"><rect x="3" y="3" width="18" height="18" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.5" cy="6.5" r="1" fill="currentColor" stroke="none"/></svg></span>
                Instagram
              </a>
              <a class="soc th" href="https://www.threads.com/@studi.path" target="_blank" rel="noopener">
                <span class="si"><svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12.186 24h-.007c-3.581-.024-6.334-1.205-8.184-3.509C2.35 18.44 1.5 15.586 1.472 12.01v-.017c.03-3.579.879-6.43 2.525-8.482C5.845 1.205 8.6.024 12.18 0h.014c2.746.02 5.043.725 6.826 2.098 1.677 1.29 2.858 3.13 3.509 5.467l-2.04.569c-1.104-3.96-3.898-5.984-8.304-6.015-2.91.022-5.11.936-6.54 2.717C4.307 6.504 3.616 8.914 3.589 12c.027 3.086.718 5.496 2.057 7.164 1.43 1.783 3.631 2.698 6.54 2.717 2.623-.02 4.358-.631 5.8-2.045 1.647-1.613 1.618-3.593 1.09-4.798-.31-.71-.873-1.3-1.634-1.75-.192 1.352-.622 2.446-1.284 3.272-.886 1.102-2.14 1.704-3.73 1.79-1.202.065-2.361-.218-3.259-.801-1.063-.689-1.685-1.74-1.752-2.964-.065-1.19.408-2.285 1.33-3.082.88-.76 2.119-1.207 3.583-1.291a13.853 13.853 0 0 1 3.02.142c-.126-.742-.375-1.332-.75-1.757-.513-.586-1.308-.883-2.359-.89h-.029c-.844 0-1.992.232-2.721 1.32L7.734 7.847c.98-1.454 2.568-2.256 4.478-2.256h.044c3.194.02 5.097 1.975 5.287 5.388.108.046.216.094.321.142 1.49.7 2.58 1.761 3.154 3.07.797 1.82.871 4.79-1.548 7.158-1.85 1.81-4.094 2.628-7.277 2.65Zm1.003-11.69c-.242 0-.487.007-.739.021-1.836.103-2.98.946-2.916 2.143.067 1.256 1.452 1.839 2.784 1.767 1.224-.065 2.818-.543 3.086-3.71a10.5 10.5 0 0 0-2.215-.221z"/></svg></span>
                Threads
              </a>
              <a class="soc em" href="mailto:admin@studipath.id">
                <span class="si"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="5" width="18" height="14" rx="3"/><path d="m4 8 8 6 8-6"/></svg></span>
                Email
              </a>
            </div>
          </div>
        </div>
      </section>

      <section class="book" id="book">
        <div class="wrap">
          <h2 class="rv">Book your free consultation</h2>
          <p class="lead rv d1" style="margin-top:18px">Chat with our team about Pearson Edexcel, your plans to study abroad, and academic development. We'll help map out the best next steps for you.</p>
          <div class="grid">
            <aside class="binfo rv">
              <div class="bi">
                <div class="bh">
                  <span class="bico"><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/></svg></span>
                  <h3>Operational Hours</h3>
                </div>
                <ul class="hrs">
                  <li><span>Mon – Fri</span><b>09.00 – 16.00</b></li>
                  <li><span>Sat</span><b>09.00 – 12.00</b></li>
                </ul>
                <p>Consultations outside work hours are available by appointment.</p>
              </div>

              <div class="bi">
                <div class="bh">
                  <span class="bico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 21s-7-6.2-7-11a7 7 0 0 1 14 0c0 4.8-7 11-7 11z"/><circle cx="12" cy="10" r="2.5"/></svg></span>
                  <h3>Our Address</h3>
                </div>
                <p>Jl. Raya Darmo Permai III No.8, Pradahkendal, Kec. Dukuhpakis, Surabaya, Jawa Timur 60226</p>
                <div class="modes">
                  <span><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M3 21h18M5 21V7l7-4 7 4v14M9 21v-6h6v6"/></svg>Face to face</span>
                  <span><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="2" y="6" width="14" height="12" rx="3"/><path d="m16 10 6-3v10l-6-3"/></svg>Zoom meeting</span>
                </div>
                <a class="maplink" href="https://www.google.com/maps/search/?api=1&query=Jl.+Raya+Darmo+Permai+III+No.8+Surabaya" target="_blank" rel="noopener">Open in Google Maps →</a>
              </div>
              <!-- <div><h3>Fee</h3><p>Free</p></div> -->
            </aside>

            <form class="fcard rv d1" id="bookForm" data-action="{{ route('booking.store') }}">
                <div id="fields"></div>
                <input type="text" name="website" tabindex="-1" autocomplete="off" aria-hidden="true" style="position:absolute;left:-9999px">
                <button class="btn" type="submit">Book Consultation</button>
                <p class="note" id="bookStatus">Your details will be sent to our team and we'll contact you to confirm your schedule.</p>
            </form>

            <div class="fcard done" id="bookDone" hidden>
                <div class="ok"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="m5 12.5 4.5 4.5L19 7.5"/></svg></div>
                <h3>Thank you! Your booking has been received.</h3>
                <p>Our team will contact you via WhatsApp or email to confirm your consultation schedule.</p>
                <div class="dbtn">
                    <button type="button" class="btn" id="again">Book another</button>
                    <a class="btn ghost" href="#home">Back to top</a>
                </div>
            </div>
          </div>
        </div>
      </section>
    </main>

    <footer>
      <div class="wrap">
        <div class="ft">
          <div class="ft-brand">
            <a href="#home" class="logo foot-logo" aria-label="StudiPath home">
              <img class="logo-img" src="images/logofix.png" alt="StudiPath" width="400" height="454">
              <span class="brand">STUDI<b>PATH</b></span>
            </a>
            <p>One partner, one clear path, from counselling to departure.</p>
            <div class="ft-social">
              <a class="fs fs-wa" href="https://wa.me/6281235422626" target="_blank" rel="noopener" aria-label="WhatsApp">
                <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 2a10 10 0 0 0-8.6 15L2 22l5.2-1.4A10 10 0 1 0 12 2Zm5.2 14.2c-.2.6-1.3 1.2-1.8 1.2-.5.1-1 .2-3.3-.7-2.8-1.2-4.6-4-4.7-4.2-.1-.2-1.1-1.5-1.1-2.8s.7-2 1-2.3c.2-.3.5-.3.7-.3h.5c.2 0 .4 0 .6.5l.9 2.1c.1.2.1.4 0 .5l-.4.6c-.2.2-.3.3-.1.6.2.3.8 1.3 1.7 2.1 1.1 1 2.1 1.3 2.4 1.4.3.1.5.1.7-.1l1-1.2c.2-.3.4-.2.7-.1l2 1c.3.1.5.2.5.3.1.2.1.7-.1 1.3Z"/></svg>
              </a>
              <a class="fs fs-ig" href="https://instagram.com/studi.path" target="_blank" rel="noopener" aria-label="Instagram">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true"><rect x="3" y="3" width="18" height="18" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.5" cy="6.5" r="1" fill="currentColor" stroke="none"/></svg>
              </a>
              <a class="fs fs-th" href="https://www.threads.com/@studi.path" target="_blank" rel="noopener" aria-label="Threads">
                <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12.186 24h-.007c-3.581-.024-6.334-1.205-8.184-3.509C2.35 18.44 1.5 15.586 1.472 12.01v-.017c.03-3.579.879-6.43 2.525-8.482C5.845 1.205 8.6.024 12.18 0h.014c2.746.02 5.043.725 6.826 2.098 1.677 1.29 2.858 3.13 3.509 5.467l-2.04.569c-1.104-3.96-3.898-5.984-8.304-6.015-2.91.022-5.11.936-6.54 2.717C4.307 6.504 3.616 8.914 3.589 12c.027 3.086.718 5.496 2.057 7.164 1.43 1.783 3.631 2.698 6.54 2.717 2.623-.02 4.358-.631 5.8-2.045 1.647-1.613 1.618-3.593 1.09-4.798-.31-.71-.873-1.3-1.634-1.75-.192 1.352-.622 2.446-1.284 3.272-.886 1.102-2.14 1.704-3.73 1.79-1.202.065-2.361-.218-3.259-.801-1.063-.689-1.685-1.74-1.752-2.964-.065-1.19.408-2.285 1.33-3.082.88-.76 2.119-1.207 3.583-1.291a13.853 13.853 0 0 1 3.02.142c-.126-.742-.375-1.332-.75-1.757-.513-.586-1.308-.883-2.359-.89h-.029c-.844 0-1.992.232-2.721 1.32L7.734 7.847c.98-1.454 2.568-2.256 4.478-2.256h.044c3.194.02 5.097 1.975 5.287 5.388.108.046.216.094.321.142 1.49.7 2.58 1.761 3.154 3.07.797 1.82.871 4.79-1.548 7.158-1.85 1.81-4.094 2.628-7.277 2.65Zm1.003-11.69c-.242 0-.487.007-.739.021-1.836.103-2.98.946-2.916 2.143.067 1.256 1.452 1.839 2.784 1.767 1.224-.065 2.818-.543 3.086-3.71a10.5 10.5 0 0 0-2.215-.221z"/></svg>
              </a>
              <a class="fs fs-em" href="mailto:admin@studipath.id" aria-label="Email">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="5" width="18" height="14" rx="3"/><path d="m4 8 8 6 8-6"/></svg>
              </a>
            </div>
          </div>

          <div class="ft-col">
            <h4>Explore</h4>
            <ul>
              <li><a href="#meetyourconsultant">Meet StudiPath Indonesia</a></li>
              <li><a href="#why">Why Us</a></li>
              <li><a href="#journey">Student Journey</a></li>
              <li><a href="#support">Your Future</a></li>
              <li><a href="#destinations">Explore Your Destinations</a></li>
            </ul>
          </div>

          <div class="ft-col">
            <h4>Get in touch</h4>
            <ul>
              <li><a href="https://wa.me/6281235422626" target="_blank" rel="noopener">Chat on WhatsApp</a></li>
              <li><a href="https://wa.me/6281235422626" target="_blank" rel="noopener">0812-3542-2626</a></li>
              <li><a href="https://instagram.com/studi.path" target="_blank" rel="noopener">Instagram @studi.path</a></li>
              <li><a href="https://www.threads.com/@studi.path" target="_blank" rel="noopener">Threads @studi.path</a></li>
              <li><a href="mailto:admin@studipath.id">admin@studipath.id</a></li>
            </ul>
          </div>

          <div class="ft-col">
            <h4>Visit us</h4>
            <address>
              <!-- GANTI dengan alamat asli StudiPath -->
              Jl. Raya Darmo Permai III No.8, Pradahkalikendal<br>
              Dukuhpakis, Surabaya<br>
              Jawa Timur 60226
            </address>
          </div>
        </div>

        <div class="ft-bottom">
          <span>© <span id="yr">2026</span> StudiPath Indonesia. All rights reserved.</span>
          <span>From counselling to departure.</span>
        </div>
      </div>
    </footer>

    <a class="wa" href="https://wa.me/6281235422626" target="_blank" rel="noopener" aria-label="Chat on WhatsApp">
      <svg width="30" height="30" viewBox="0 0 24 24" fill="#fff" aria-hidden="true"><path d="M12 2a10 10 0 0 0-8.6 15L2 22l5.2-1.4A10 10 0 1 0 12 2Zm5.2 14.2c-.2.6-1.300 1.200-1.800 1.200-.5.100-1 .2-3.300-.7-2.800-1.200-4.600-4-4.700-4.200-.1-.2-1.100-1.500-1.100-2.800s.7-2 1-2.300c.2-.3.500-.3.700-.3h.5c.2 0 .4 0 .6.500l.9 2.100c.1.200.1.400 0 .5l-.4.600c-.2.200-.3.300-.1.600.2.300.8 1.300 1.700 2.100 1.100 1 2.100 1.300 2.400 1.400.3.100.5.100.7-.1l1-1.200c.2-.3.400-.2.700-.1l2 1c.3.100.5.200.5.300.1.200.1.700-.1 1.300Z"/></svg>
    </a>

    <button class="totop" id="toTop" type="button" aria-label="Back to top">
        <svg class="ring" viewBox="0 0 48 48" aria-hidden="true"><circle class="trk" cx="24" cy="24" r="21"/><circle class="bar" id="toTopBar" cx="24" cy="24" r="21"/></svg>
        <svg class="arw" viewBox="0 0 24 24" aria-hidden="true"><path d="M12 19V5M5 12l7-7 7 7"/></svg>
    </button>

    <script src="{{ asset('js/app.js') }}?v={{ filemtime(public_path('js/app.js')) }}" defer></script>

  </body>
</html>
