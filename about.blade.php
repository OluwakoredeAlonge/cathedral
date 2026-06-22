<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>About — St. Patrick's Catholic Cathedral, Ado-Ekiti</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <script src="{{ asset('js/data.js') }}"></script>
</head>
<body>

<!-- Ticker -->
<div class="ticker-wrap" style="position:relative;z-index:1001;">
  <div id="ticker-text" class="ticker-content font-cinzel text-xs tracking-widest text-white opacity-90">
    &nbsp;&nbsp;&nbsp;✦ HOLY MASS: Weekdays 6:30am &amp; 7:00am &nbsp;|&nbsp; ✦ Saturdays 7:00am &amp; 6:00pm &nbsp;&nbsp;&nbsp;
  </div>
</div>

<!-- Navbar -->
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
      <a href="about.html"   class="nav-link active">ABOUT</a>
      <a href="masses.html"  class="nav-link">MASSES</a>
      <a href="events.html"  class="nav-link">EVENTS</a>
      <a href="blog.html"    class="nav-link">BLOG</a>
      <a href="gallery.html" class="nav-link">GALLERY</a>
      <a href="contact.html" class="nav-link">CONTACT</a>
    </div>
    <div class="flex items-center gap-4">
      <a href="contact.html" class="hidden md:inline-flex btn-gold text-xs">GIVE ONLINE</a>
      <button id="menu-btn" class="lg:hidden text-white focus:outline-none">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 6h16M4 12h16M4 18h16"/></svg>
      </button>
    </div>
  </div>
</nav>

<!-- Mobile Menu -->
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


<!-- ══════════════════════════════════════════════
     PAGE HERO
════════════════════════════════════════════════ -->
<section class="page-hero" style="padding-top:8.5rem;padding-bottom:5rem;">
  <div class="page-hero-bg" style="background-image:url('https://images.unsplash.com/photo-1548625149-720754952f87?w=1920&q=80');"></div>
  <div style="position:absolute;inset:0;background:linear-gradient(to bottom,rgba(15,5,3,0.7),rgba(15,5,3,0.9));"></div>
  <div class="relative z-10 max-w-3xl mx-auto px-6">
    <p class="font-cinzel text-xs tracking-[0.4em] mb-4 fade-up" style="color:var(--gold);">OUR STORY</p>
    <h1 class="font-cinzel font-black text-white mb-4 fade-up delay-1" style="font-size:clamp(2.2rem,5vw,4rem);">About the Cathedral</h1>
    <div class="ornament fade-up delay-2"><span class="ornament-icon">✦</span></div>
    <p class="font-cormorant text-xl text-gray-300 fade-up delay-3" style="font-size:1.2rem;">
      The mother church of the Diocese of Ekiti — a living witness to God's faithfulness across generations.
    </p>
  </div>
</section>


<!-- ══════════════════════════════════════════════
     HISTORY
════════════════════════════════════════════════ -->
<section class="section-mid py-20 px-6">
  <div class="max-w-6xl mx-auto grid md:grid-cols-2 gap-14 items-center">
    <div class="reveal">
      <p class="font-cinzel text-xs tracking-[0.3em] mb-3" style="color:var(--gold);">SINCE 1929</p>
      <h2 class="font-cinzel text-3xl md:text-4xl font-bold text-white mb-5">A Century of<br/><span class="gold-text">Faith &amp; Worship</span></h2>
      <div class="ornament justify-start"><span class="ornament-icon">✦</span></div>
      <div id="history-text-container"></div>
    </div>
    <div class="reveal relative">
      <div class="absolute -top-4 -right-4 w-full h-full border border-yellow-700 opacity-20 rounded-sm"></div>
      <img src="https://images.unsplash.com/photo-1583429780296-e8b9d8df0b19?w=700&q=80" alt="Cathedral exterior" class="w-full object-cover rounded-sm relative z-10" style="height:500px;">
      <div class="absolute bottom-0 left-0 right-0 z-20 p-5" style="background:linear-gradient(to top,rgba(15,5,3,0.9),transparent);">
        <p class="font-cinzel text-xs tracking-widest" style="color:var(--gold);">ST. PATRICK'S · ADO-EKITI</p>
      </div>
    </div>
  </div>
</section>


<!-- ══════════════════════════════════════════════
     TIMELINE
════════════════════════════════════════════════ -->
<section class="section-dark py-20 px-6">
  <div class="max-w-3xl mx-auto">
    <div class="text-center mb-14 reveal">
      <p class="font-cinzel text-xs tracking-[0.3em] mb-3" style="color:var(--gold);">KEY MILESTONES</p>
      <h2 class="font-cinzel text-3xl md:text-4xl font-bold text-white">Our Timeline</h2>
      <div class="ornament"><span class="ornament-icon">✦</span></div>
    </div>
    <div class="space-y-10 reveal" id="timeline-container">
      <!-- Populated from CathedralDB.get('milestones') -->
    </div>
  </div>
</section>


<!-- ══════════════════════════════════════════════
     BISHOP PROFILE
════════════════════════════════════════════════ -->
<section class="parallax-strip py-24 px-6" style="background-image:url('https://images.unsplash.com/photo-1519677100203-a0e668c92439?w=1920&q=80');">
  <div style="position:absolute;inset:0;background:rgba(15,5,3,0.9);"></div>
  <div id="bishop-section" class="relative max-w-5xl mx-auto reveal"></div>
</section>


<!-- ══════════════════════════════════════════════
     PARISH GROUPS
════════════════════════════════════════════════ -->
<section class="section-mid py-20 px-6">
  <div class="max-w-6xl mx-auto">
    <div class="text-center mb-14 reveal">
      <p class="font-cinzel text-xs tracking-[0.3em] mb-3" style="color:var(--gold);">GET INVOLVED</p>
      <h2 class="font-cinzel text-3xl md:text-4xl font-bold text-white">Parish Societies &amp; Groups</h2>
      <div class="ornament"><span class="ornament-icon">✦</span></div>
    </div>
    <div id="societies-grid" class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 reveal"></div>
  </div>
</section>


<!-- Scripture quote -->
<section class="section-mid py-20 px-6 reveal">
  <div class="max-w-6xl mx-auto flex justify-center">
    <div class="w-full max-w-2xl text-center px-8 md:px-14 py-14 relative overflow-hidden" style="background:linear-gradient(150deg,#3d1809 0%,#1a0a04 60%,#2e1008 100%);border:1px solid rgba(201,164,120,0.22);border-radius:18px;box-shadow:0 28px 70px rgba(0,0,0,0.6),inset 0 1px 0 rgba(201,164,120,0.1);">
      <div class="absolute top-0 left-0 w-36 h-36 opacity-10 pointer-events-none" style="background:radial-gradient(circle at 0 0,var(--gold),transparent);border-radius:0 0 100% 0;"></div>
      <div class="absolute bottom-0 right-0 w-36 h-36 opacity-10 pointer-events-none" style="background:radial-gradient(circle at 100% 100%,var(--gold),transparent);border-radius:100% 0 0 0;"></div>
      <div class="text-5xl mb-6 relative z-10">✝️</div>
      <p class="scripture-quote text-white mb-6 relative z-10">You are a chosen race, a royal priesthood, a holy nation, God's own people.</p>
      <div class="ornament relative z-10"><span class="ornament-icon">✦</span></div>
      <p class="font-cinzel text-xs tracking-[0.3em] mt-5 relative z-10" style="color:var(--gold-light);">— 1 PETER 2:9</p>
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
      <p class="text-gray-500 text-sm leading-relaxed mb-5 max-w-xs">The Cathedral Church of the Diocese of Ekiti, Nigeria — serving the faithful since 1929.</p>
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

<div id="lightbox"><img id="lightbox-img" src="" alt=""/></div>
<script src="{{ asset('js/main.js') }}"></script>
<script>
(function renderAboutPage() {
  const s = CathedralDB.get('settings');

  /* Ticker */
  const ticker = document.getElementById('ticker-text');
  if (ticker) ticker.textContent = CathedralDB.buildTickerText() || ticker.textContent;

  /* History paragraphs */
  const histEl = document.getElementById('history-text-container');
  if (histEl) {
    const p1 = s.churchHistoryP1 || '';
    const p2 = s.churchHistoryP2 || '';
    const p3 = s.churchHistoryP3 || '';
    histEl.innerHTML = [p1,p2,p3].filter(Boolean).map((p,i) =>
      `<p class="text-gray-300 leading-relaxed ${i < 2 ? 'mb-4' : ''}">${p}</p>`
    ).join('');
  }

  /* Bishop section */
  const bishopEl = document.getElementById('bishop-section');
  if (bishopEl) {
    bishopEl.innerHTML = `
      <div class="grid md:grid-cols-5 gap-10 items-center">
        <div class="md:col-span-2">
          <div class="relative inline-block">
            <div class="absolute -inset-3 border border-yellow-700 opacity-30"></div>
            <img src="${s.bishopImage || ''}" alt="${s.bishopName || 'Bishop'}" class="relative z-10 w-full object-cover" style="height:380px;object-fit:cover;">
          </div>
        </div>
        <div class="md:col-span-3">
          <p class="font-cinzel text-xs tracking-[0.3em] mb-3" style="color:var(--gold);">SHEPHERD OF THE FLOCK</p>
          <h2 class="font-cinzel text-3xl md:text-4xl font-bold text-white mb-2">${s.bishopName || ''}</h2>
          <p class="font-cinzel text-sm tracking-widest mb-5" style="color:var(--gold-light);">${s.bishopTitle || ''}</p>
          <div class="ornament justify-start"><span class="ornament-icon">✦</span></div>
          ${s.bishopBio1 ? `<p class="text-gray-300 leading-relaxed mb-4">${s.bishopBio1}</p>` : ''}
          ${s.bishopBio2 ? `<p class="text-gray-300 leading-relaxed mb-6">${s.bishopBio2}</p>` : ''}
          <div class="grid grid-cols-2 gap-4">
            <div class="mass-card rounded-sm">
              <div class="font-cinzel text-xs tracking-wider mb-1" style="color:var(--gold);">ORDAINED BISHOP</div>
              <div class="text-white text-sm font-semibold">${s.bishopSince || ''}</div>
            </div>
            <div class="mass-card rounded-sm">
              <div class="font-cinzel text-xs tracking-wider mb-1" style="color:var(--gold);">DIOCESE</div>
              <div class="text-white text-sm font-semibold">${s.diocese || 'Ekiti, Nigeria'}</div>
            </div>
          </div>
        </div>
      </div>`;
  }

  /* Parish Societies */
  const societiesEl = document.getElementById('societies-grid');
  if (societiesEl) {
    const societies = (CathedralDB.get('societies') || [])
      .filter(s => s.active !== false)
      .sort((a,b) => (a.order||0) - (b.order||0));
    societiesEl.innerHTML = societies.map(s => `
      <div class="card-glass p-6 rounded-sm">
        <div class="text-3xl mb-3">${s.emoji || '✝️'}</div>
        <h4 class="font-cinzel font-bold text-white mb-2">${s.name}</h4>
        <p class="text-gray-400 text-sm">${s.description}</p>
      </div>`).join('') || '<p class="text-gray-500 col-span-3">No societies listed.</p>';
  }

  /* Timeline */
  const tlEl = document.getElementById('timeline-container');
  if (tlEl) {
    const milestones = (CathedralDB.get('milestones') || [])
      .slice().sort((a,b) => (a.order||0) - (b.order||0));
    tlEl.innerHTML = milestones.map(m => `
      <div class="timeline-item">
        <div class="font-cinzel font-bold text-sm mb-1" style="color:var(--gold);">${m.year}</div>
        <h4 class="font-cinzel font-bold text-white mb-1">${m.title}</h4>
        <p class="text-gray-400 text-sm">${m.description}</p>
      </div>`).join('') || '<p class="text-gray-500">No milestones yet.</p>';
  }
})();
</script>
</body>
</html>
