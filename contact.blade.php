<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contact — St. Patrick's Catholic Cathedral, Ado-Ekiti</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.min.js"></script>
  <script src="{{ asset('js/data.js') }}"></script>
</head>
<body>

<div class="ticker-wrap" style="position:relative;z-index:1001;">
  <div id="ticker-text" class="ticker-content font-cinzel text-xs tracking-widest text-white opacity-90">
    &nbsp;&nbsp;&nbsp;✦ Parish Office Hours: Mon–Fri 8:00am – 4:00pm &nbsp;|&nbsp; ✦ Emergency Pastoral Care: (0812) 567-4455 &nbsp;&nbsp;&nbsp;
  </div>
</div>

<nav id="navbar" class="py-4 px-6 md:px-12">
  <div class="max-w-7xl mx-auto flex items-center justify-between">
    <a href="index.html" class="flex items-center gap-3 group">
      <div class="w-10 h-10 rounded-full border border-yellow-600 flex items-center justify-center text-yellow-500 text-lg font-bold font-cinzel group-hover:bg-yellow-600 group-hover:text-navy transition-all duration-300">✝</div>
      <div>
        <div class="font-cinzel text-sm font-bold tracking-widest text-white leading-tight">ST. PATRICK'S</div>
        <div class="font-cinzel text-xs tracking-widest" style="color:var(--gold);font-size:0.6rem;">CATHOLIC CATHEDRAL</div>
      </div>
    </a>
    <div class="hidden lg:flex items-center gap-8">
      <a href="index.html"   class="nav-link">HOME</a>
      <a href="about.html"   class="nav-link">ABOUT</a>
      <a href="masses.html"  class="nav-link">MASSES</a>
      <a href="events.html"  class="nav-link">EVENTS</a>
      <a href="blog.html"    class="nav-link">BLOG</a>
      <a href="gallery.html" class="nav-link">GALLERY</a>
      <a href="contact.html" class="nav-link active">CONTACT</a>
    </div>
    <div class="flex items-center gap-4">
      <a href="contact.html" class="hidden md:inline-flex btn-gold text-xs">GIVE ONLINE</a>
      <button id="menu-btn" class="lg:hidden text-white"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 6h16M4 12h16M4 18h16"/></svg></button>
    </div>
  </div>
</nav>
<div id="mobile-menu">
  <button id="close-menu" class="absolute top-6 right-6 text-white text-2xl">&times;</button>
  <a href="index.html"   class="mobile-nav-link">HOME</a>
  <a href="about.html"   class="mobile-nav-link">ABOUT</a>
  <a href="masses.html"  class="mobile-nav-link">MASSES</a>
  <a href="events.html"  class="mobile-nav-link">EVENTS</a>
  <a href="blog.html"    class="mobile-nav-link">BLOG</a>
  <a href="gallery.html" class="mobile-nav-link">GALLERY</a>
  <a href="contact.html" class="mobile-nav-link">CONTACT</a>
</div>

<!-- Page Hero -->
<section class="page-hero" style="padding-top:8.5rem;padding-bottom:5rem;">
  <div class="page-hero-bg" style="background-image:url('https://images.unsplash.com/photo-1583429780296-e8b9d8df0b19?w=1920&q=80');"></div>
  <div style="position:absolute;inset:0;background:linear-gradient(to bottom,rgba(15,5,3,0.65),rgba(15,5,3,0.92));"></div>
  <div class="relative z-10 max-w-3xl mx-auto px-6">
    <p class="font-cinzel text-xs tracking-[0.4em] mb-4 fade-up" style="color:var(--gold);">WE'D LOVE TO HEAR FROM YOU</p>
    <h1 class="font-cinzel font-black text-white mb-4 fade-up delay-1" style="font-size:clamp(2.2rem,5vw,4rem);">Get in Touch</h1>
    <div class="ornament fade-up delay-2"><span class="ornament-icon">✦</span></div>
    <p class="font-cormorant text-xl text-gray-300 fade-up delay-3" style="font-size:1.2rem;">Whether it's a sacrament request, general enquiry, or just saying hello — our doors are always open.</p>
  </div>
</section>


<!-- ══════ CONTACT DETAILS + FORM ══════ -->
<section class="section-mid py-20 px-6">
  <div class="max-w-6xl mx-auto grid lg:grid-cols-5 gap-14">

    <!-- Left: Details -->
    <div class="lg:col-span-2 reveal">
      <p class="font-cinzel text-xs tracking-[0.3em] mb-3" style="color:var(--gold);">REACH US</p>
      <h2 class="font-cinzel text-2xl md:text-3xl font-bold text-white mb-6">Parish Office</h2>
      <div class="ornament justify-start"><span class="ornament-icon">✦</span></div>

      <div class="space-y-6 mt-2" id="contact-details-list"></div>

      <!-- Social -->
      <div class="mt-8">
        <div class="font-cinzel text-xs tracking-[0.25em] mb-4" style="color:var(--gold);">FOLLOW US</div>
        <div class="flex gap-3" id="contact-social-links"></div>
      </div>
    </div>

    <!-- Right: Form -->
    <div class="lg:col-span-3 reveal">
      <p class="font-cinzel text-xs tracking-[0.3em] mb-3" style="color:var(--gold);">SEND A MESSAGE</p>
      <h2 class="font-cinzel text-2xl md:text-3xl font-bold text-white mb-6">How Can We Help?</h2>
      <div class="ornament justify-start"><span class="ornament-icon">✦</span></div>

      <form id="contact-form" class="space-y-5 mt-2" onsubmit="handleSubmit(event)">
        <div class="grid sm:grid-cols-2 gap-5">
          <div>
            <label class="font-cinzel text-xs tracking-wider block mb-2" style="color:var(--gold);">FULL NAME *</label>
            <input type="text" required placeholder="Your full name" class="form-field rounded-sm" />
          </div>
          <div>
            <label class="font-cinzel text-xs tracking-wider block mb-2" style="color:var(--gold);">EMAIL ADDRESS *</label>
            <input type="email" required placeholder="your@email.com" class="form-field rounded-sm" />
          </div>
        </div>
        <div class="grid sm:grid-cols-2 gap-5">
          <div>
            <label class="font-cinzel text-xs tracking-wider block mb-2" style="color:var(--gold);">PHONE NUMBER</label>
            <input type="tel" placeholder="+234 000 000 0000" class="form-field rounded-sm" />
          </div>
          <div>
            <label class="font-cinzel text-xs tracking-wider block mb-2" style="color:var(--gold);">SUBJECT *</label>
            <select required class="form-field rounded-sm" style="background:rgba(30,11,6,0.6);">
              <option value="" style="background:#1e0b06;">Select a subject…</option>
              <option value="general" style="background:#1e0b06;">General Enquiry</option>
              <option value="baptism" style="background:#1e0b06;">Baptism Request</option>
              <option value="marriage" style="background:#1e0b06;">Marriage Preparation</option>
              <option value="confession" style="background:#1e0b06;">Confession / Spiritual Direction</option>
              <option value="anointing" style="background:#1e0b06;">Anointing of the Sick</option>
              <option value="donation" style="background:#1e0b06;">Donation / Giving</option>
              <option value="other" style="background:#1e0b06;">Other</option>
            </select>
          </div>
        </div>
        <div>
          <label class="font-cinzel text-xs tracking-wider block mb-2" style="color:var(--gold);">YOUR MESSAGE *</label>
          <textarea required rows="6" placeholder="Write your message here…" class="form-field rounded-sm resize-none"></textarea>
        </div>
        <div class="flex items-start gap-3">
          <input type="checkbox" id="consent" required class="mt-1 accent-yellow-600" />
          <label for="consent" class="text-gray-400 text-xs leading-relaxed">I consent to St. Patrick's Catholic Cathedral storing and processing my personal information in accordance with their privacy policy, solely for the purpose of responding to my enquiry.</label>
        </div>
        <button type="submit" class="btn-gold w-full justify-center text-sm py-4">
          <i class="fas fa-paper-plane mr-2"></i> SEND MESSAGE
        </button>
      </form>

      <!-- Success message (hidden by default) -->
      <div id="form-success" class="hidden mt-6 p-6 rounded-sm text-center" style="background:rgba(26,92,58,0.3);border:1px solid rgba(46,160,67,0.4);">
        <div class="text-3xl mb-3">✝</div>
        <h4 class="font-cinzel font-bold text-white mb-2">Message Received!</h4>
        <p class="text-gray-300 text-sm">Thank you for reaching out. A member of our team will get back to you within 2 working days. God bless you.</p>
      </div>
    </div>

  </div>
</section>


<!-- ══════ MAP ══════ -->
<section class="section-dark py-16 px-6">
  <div class="max-w-6xl mx-auto">
    <div class="text-center mb-10 reveal">
      <p class="font-cinzel text-xs tracking-[0.3em] mb-3" style="color:var(--gold);">HOW TO FIND US</p>
      <h2 class="font-cinzel text-2xl md:text-3xl font-bold text-white">Visit the Cathedral</h2>
    </div>
    <div class="reveal map-container rounded-sm overflow-hidden" style="border:1px solid rgba(201,164,120,0.2);">
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.8!2d5.2230!3d7.6277!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1040c0a2b2c4e5a7%3A0x1234567890abcdef!2sSt.%20Patrick's%20Catholic%20Cathedral%2C%20Ado-Ekiti!5e0!3m2!1sen!2sng!4v1234567890"
        allowfullscreen=""
        loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"
        title="St. Patrick's Cathedral location"
      ></iframe>
    </div>
    <div class="mt-6 grid sm:grid-cols-3 gap-4 reveal">
      <div class="mass-card rounded-sm text-center">
        <i class="fas fa-car mb-2 text-lg" style="color:var(--gold);"></i>
        <div class="font-cinzel text-xs tracking-wider text-white mb-1">BY CAR</div>
        <p class="text-gray-400 text-xs">Ample parking available on Ikere Road and Cathedral grounds. Follow signs from Fajuyi Roundabout.</p>
      </div>
      <div class="mass-card rounded-sm text-center">
        <i class="fas fa-bus mb-2 text-lg" style="color:var(--gold);"></i>
        <div class="font-cinzel text-xs tracking-wider text-white mb-1">BY BUS / KEKE</div>
        <p class="text-gray-400 text-xs">Ask for "Catholic Cathedral" or "Bishop's House" on Ikere Road from any major motor park in Ado-Ekiti.</p>
      </div>
      <div class="mass-card rounded-sm text-center">
        <i class="fas fa-walking mb-2 text-lg" style="color:var(--gold);"></i>
        <div class="font-cinzel text-xs tracking-wider text-white mb-1">ON FOOT</div>
        <p class="text-gray-400 text-xs">A 10-minute walk from Ado-Ekiti Town Centre along Ikere Road, opposite the State Secretariat.</p>
      </div>
    </div>
  </div>
</section>


<!-- ══════ GIVING ══════ -->
<section class="section-mid py-20 px-6 reveal">
  <div class="max-w-6xl mx-auto flex justify-center">
    <div class="w-full max-w-4xl relative overflow-hidden" style="background:linear-gradient(150deg,#3d1809 0%,#1a0a04 60%,#2e1008 100%);border:1px solid rgba(201,164,120,0.22);border-radius:18px;box-shadow:0 28px 70px rgba(0,0,0,0.6),inset 0 1px 0 rgba(201,164,120,0.1);">
      <div class="absolute top-0 left-0 w-48 h-48 opacity-10 pointer-events-none" style="background:radial-gradient(circle at 0 0,var(--gold),transparent);border-radius:0 0 100% 0;"></div>
      <div class="absolute bottom-0 right-0 w-48 h-48 opacity-10 pointer-events-none" style="background:radial-gradient(circle at 100% 100%,var(--gold),transparent);border-radius:100% 0 0 0;"></div>
      <div class="px-8 md:px-14 py-14 relative z-10">
        <div class="text-center mb-10">
          <div class="text-5xl mb-5">🙏</div>
          <p class="font-cinzel text-xs tracking-[0.3em] mb-3" style="color:var(--gold-light);">SUPPORT THE CATHEDRAL</p>
          <h2 class="font-cinzel text-3xl md:text-4xl font-bold text-white mb-4">Give to God's Work</h2>
          <div class="ornament"><span class="ornament-icon">✦</span></div>
          <p class="text-gray-300 text-sm leading-relaxed max-w-xl mx-auto mt-4">Your generous offerings sustain our ministry, maintain the Cathedral, and enable us to serve the poor and vulnerable of Ado-Ekiti.</p>
        </div>
        <div class="grid sm:grid-cols-3 gap-5 mb-10">
          <div class="p-6 text-center" style="background:rgba(255,255,255,0.05);border:1px solid rgba(201,164,120,0.18);border-radius:12px;">
            <div class="w-12 h-12 mx-auto mb-4 flex items-center justify-center" style="background:rgba(201,164,120,0.1);border:1px solid rgba(201,164,120,0.25);border-radius:50%;">
              <i data-lucide="landmark" style="color:var(--gold);width:20px;height:20px;"></i>
            </div>
            <div class="font-cinzel font-bold text-white mb-2">Bank Transfer</div>
            <p class="text-gray-400 text-xs leading-relaxed">Diocese of Ekiti<br/>Account: 0123456789<br/>First Bank Nigeria PLC</p>
          </div>
          <div class="p-6 text-center" style="background:rgba(255,255,255,0.05);border:1px solid rgba(201,164,120,0.18);border-radius:12px;">
            <div class="w-12 h-12 mx-auto mb-4 flex items-center justify-center text-2xl" style="background:rgba(201,164,120,0.1);border:1px solid rgba(201,164,120,0.25);border-radius:50%;">🧺</div>
            <div class="font-cinzel font-bold text-white mb-2">Sunday Offertory</div>
            <p class="text-gray-400 text-xs leading-relaxed">Drop your offering in the collection basket at any Sunday Mass or at the Parish Office.</p>
          </div>
          <div class="p-6 text-center" style="background:rgba(255,255,255,0.05);border:1px solid rgba(201,164,120,0.18);border-radius:12px;">
            <div class="w-12 h-12 mx-auto mb-4 flex items-center justify-center" style="background:rgba(201,164,120,0.1);border:1px solid rgba(201,164,120,0.25);border-radius:50%;">
              <i data-lucide="hard-hat" style="color:var(--gold);width:20px;height:20px;"></i>
            </div>
            <div class="font-cinzel font-bold text-white mb-2">Building Fund</div>
            <p class="text-gray-400 text-xs leading-relaxed">Dedicated envelopes for the Cathedral Renovation Fund are available at the entrance.</p>
          </div>
        </div>
        <div class="text-center pt-6" style="border-top:1px solid rgba(201,164,120,0.12);">
          <p class="font-cormorant italic text-gray-300 text-lg">"Each of you should give what you have decided in your heart to give, not reluctantly or under compulsion, for God loves a cheerful giver."</p>
          <p class="font-cinzel text-xs tracking-wider mt-3" style="color:var(--gold-light);">— 2 CORINTHIANS 9:7</p>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- Footer -->
<footer class="py-16 px-6">
  <div class="max-w-6xl mx-auto grid md:grid-cols-4 gap-10">
    <div class="md:col-span-2">
      <div class="flex items-center gap-3 mb-4">
        <div class="w-10 h-10 border border-yellow-700 rounded-full flex items-center justify-center font-cinzel font-bold text-yellow-600 text-lg">✝</div>
        <div>
          <div class="font-cinzel font-bold text-white text-sm tracking-widest">ST. PATRICK'S CATHOLIC CATHEDRAL</div>
          <div class="font-cinzel text-xs tracking-widest mt-0.5" style="color:var(--gold);font-size:0.6rem;">ADO-EKITI · DIOCESE OF EKITI</div>
        </div>
      </div>
      <p class="text-gray-500 text-sm leading-relaxed mb-5 max-w-xs">The Cathedral Church of the Diocese of Ekiti — serving the faithful since 1929.</p>
      <div class="flex gap-4">
        <a href="#" class="w-8 h-8 border border-yellow-800 rounded-sm flex items-center justify-center text-yellow-600 hover:bg-yellow-600 hover:text-navy transition-all text-sm"><i class="fab fa-facebook-f"></i></a>
        <a href="#" class="w-8 h-8 border border-yellow-800 rounded-sm flex items-center justify-center text-yellow-600 hover:bg-yellow-600 hover:text-navy transition-all text-sm"><i class="fab fa-youtube"></i></a>
        <a href="#" class="w-8 h-8 border border-yellow-800 rounded-sm flex items-center justify-center text-yellow-600 hover:bg-yellow-600 hover:text-navy transition-all text-sm"><i class="fab fa-instagram"></i></a>
        <a href="#" class="w-8 h-8 border border-yellow-800 rounded-sm flex items-center justify-center text-yellow-600 hover:bg-yellow-600 hover:text-navy transition-all text-sm"><i class="fab fa-whatsapp"></i></a>
      </div>
    </div>
    <div>
      <div class="font-cinzel text-xs tracking-[0.25em] mb-5" style="color:var(--gold);">QUICK LINKS</div>
      <ul class="space-y-3">
        <li><a href="index.html"   class="text-gray-500 hover:text-yellow-500 text-sm transition-colors flex items-center gap-2"><span style="color:var(--gold);">›</span> Home</a></li>
        <li><a href="about.html"   class="text-gray-500 hover:text-yellow-500 text-sm transition-colors flex items-center gap-2"><span style="color:var(--gold);">›</span> About</a></li>
        <li><a href="masses.html"  class="text-gray-500 hover:text-yellow-500 text-sm transition-colors flex items-center gap-2"><span style="color:var(--gold);">›</span> Mass Times</a></li>
        <li><a href="events.html"  class="text-gray-500 hover:text-yellow-500 text-sm transition-colors flex items-center gap-2"><span style="color:var(--gold);">›</span> Events</a></li>
        <li><a href="blog.html"    class="text-gray-500 hover:text-yellow-500 text-sm transition-colors flex items-center gap-2"><span style="color:var(--gold);">›</span> Blog</a></li>
        <li><a href="gallery.html" class="text-gray-500 hover:text-yellow-500 text-sm transition-colors flex items-center gap-2"><span style="color:var(--gold);">›</span> Gallery</a></li>
        <li><a href="contact.html" class="text-gray-500 hover:text-yellow-500 text-sm transition-colors flex items-center gap-2"><span style="color:var(--gold);">›</span> Contact</a></li>
      </ul>
    </div>
    <div>
      <div class="font-cinzel text-xs tracking-[0.25em] mb-5" style="color:var(--gold);">FIND US</div>
      <ul class="space-y-4 text-sm text-gray-500">
        <li class="flex gap-3"><i class="fas fa-map-marker-alt mt-1" style="color:var(--gold);min-width:14px;"></i>Pope John Paul II Pastoral Centre, Ikere Road, Ado-Ekiti</li>
        <li class="flex gap-3"><i class="fas fa-phone mt-1" style="color:var(--gold);min-width:14px;"></i>(0812) 567-4455</li>
        <li class="flex gap-3"><i class="fas fa-envelope mt-1" style="color:var(--gold);min-width:14px;"></i>info@catholicdioceseofekiti.org</li>
      </ul>
    </div>
  </div>
  <div class="max-w-6xl mx-auto mt-12 pt-6 flex flex-col md:flex-row justify-between items-center gap-3" style="border-top:1px solid rgba(201,164,120,0.1);">
    <p class="text-gray-600 text-xs">&copy; 2026 St. Patrick's Catholic Cathedral, Ado-Ekiti. All rights reserved.</p>
    <p class="text-gray-600 text-xs font-cinzel tracking-wider">DIOCESE OF EKITI · ECCLESIASTICAL PROVINCE OF IBADAN</p>
  </div>
</footer>

<script src="{{ asset('js/main.js') }}"></script>
<script>
function handleSubmit(e) {
  e.preventDefault();
  document.getElementById('contact-form').classList.add('hidden');
  document.getElementById('form-success').classList.remove('hidden');
}

(function renderContactPage() {
  const s = CathedralDB.get('settings');

  /* Ticker */
  const ticker = document.getElementById('ticker-text');
  if (ticker) { const t = CathedralDB.buildTickerText(); if(t) ticker.textContent = t; }

  /* Contact details */
  const detailsEl = document.getElementById('contact-details-list');
  if (detailsEl) {
    detailsEl.innerHTML = `
      <div class="flex gap-4 items-start">
        <div class="w-10 h-10 border flex-shrink-0 flex items-center justify-center rounded-sm" style="border-color:rgba(201,164,120,0.4);color:var(--gold);"><i class="fas fa-map-marker-alt text-sm"></i></div>
        <div>
          <div class="font-cinzel text-xs tracking-wider mb-1" style="color:var(--gold);">ADDRESS</div>
          <p class="text-gray-300 text-sm leading-relaxed">${(s.address || '').replace(/, /g, ',<br/>')}<br/>${s.poBox || ''}</p>
        </div>
      </div>
      <div class="flex gap-4 items-start">
        <div class="w-10 h-10 border flex-shrink-0 flex items-center justify-center rounded-sm" style="border-color:rgba(201,164,120,0.4);color:var(--gold);"><i class="fas fa-phone text-sm"></i></div>
        <div>
          <div class="font-cinzel text-xs tracking-wider mb-1" style="color:var(--gold);">TELEPHONE</div>
          <p class="text-gray-300 text-sm">${s.phone || ''}</p>
          <p class="text-gray-500 text-xs mt-1">Emergency pastoral line — 24/7</p>
        </div>
      </div>
      <div class="flex gap-4 items-start">
        <div class="w-10 h-10 border flex-shrink-0 flex items-center justify-center rounded-sm" style="border-color:rgba(201,164,120,0.4);color:var(--gold);"><i class="fas fa-envelope text-sm"></i></div>
        <div>
          <div class="font-cinzel text-xs tracking-wider mb-1" style="color:var(--gold);">EMAIL</div>
          <p class="text-gray-300 text-sm">${s.email || ''}</p>
          <p class="text-gray-500 text-xs mt-1">We respond within 2 working days</p>
        </div>
      </div>
      <div class="flex gap-4 items-start">
        <div class="w-10 h-10 border flex-shrink-0 flex items-center justify-center rounded-sm" style="border-color:rgba(201,164,120,0.4);color:var(--gold);"><i class="fas fa-clock text-sm"></i></div>
        <div>
          <div class="font-cinzel text-xs tracking-wider mb-1" style="color:var(--gold);">OFFICE HOURS</div>
          <div class="text-gray-300 text-sm space-y-1">
            <div class="flex justify-between gap-6"><span>Monday – Friday</span><span style="color:var(--gold-light);">${(s.officeHoursMF||'').replace(/Monday – Friday · /,'')}</span></div>
            <div class="flex justify-between gap-6"><span>Saturday</span><span style="color:var(--gold-light);">${(s.officeHoursSat||'').replace(/Saturday · /,'')}</span></div>
            <div class="flex justify-between gap-6"><span>Sunday</span><span style="color:var(--gold-light);">${(s.officeHoursSun||'').replace(/Sunday · /,'')}</span></div>
          </div>
        </div>
      </div>
      <div class="flex gap-4 items-start">
        <div class="w-10 h-10 border flex-shrink-0 flex items-center justify-center rounded-sm" style="border-color:rgba(201,164,120,0.4);color:var(--gold);"><i class="fas fa-globe text-sm"></i></div>
        <div>
          <div class="font-cinzel text-xs tracking-wider mb-1" style="color:var(--gold);">DIOCESE WEBSITE</div>
          <p class="text-gray-300 text-sm">${s.website || ''}</p>
        </div>
      </div>`;
  }

  /* Social links */
  const socialEl = document.getElementById('contact-social-links');
  if (socialEl) {
    const socials = [
      { key:'facebook', icon:'fa-facebook-f' },
      { key:'youtube',  icon:'fa-youtube' },
      { key:'instagram',icon:'fa-instagram' },
      { key:'whatsapp', icon:'fa-whatsapp' },
      { key:'twitter',  icon:'fa-twitter' },
    ];
    const cls = 'w-9 h-9 border border-yellow-800 flex items-center justify-center text-yellow-600 hover:bg-yellow-600 hover:text-navy transition-all text-sm rounded-sm';
    socialEl.innerHTML = socials.map(soc =>
      `<a href="${s[soc.key] || '#'}" class="${cls}"><i class="fab ${soc.icon}"></i></a>`
    ).join('');
  }
})();
</script>
<script>lucide.createIcons();</script>
</body>
</html>
