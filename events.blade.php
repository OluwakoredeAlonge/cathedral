<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Events — St. Patrick's Catholic Cathedral, Ado-Ekiti</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <script src="{{ asset('js/data.js') }}"></script>
</head>
<body>

<div class="ticker-wrap" style="position:relative;z-index:1001;">
  <div id="ticker-text" class="ticker-content font-cinzel text-xs tracking-widest text-white opacity-90">
    &nbsp;&nbsp;&nbsp;✦ Corpus Christi Procession — June 22, 2026 &nbsp;|&nbsp; ✦ Diocesan Youth Rally — July 5, 2026 &nbsp;&nbsp;&nbsp;
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
      <a href="events.html"  class="nav-link active">EVENTS</a>
      <a href="blog.html"    class="nav-link">BLOG</a>
      <a href="gallery.html" class="nav-link">GALLERY</a>
      <a href="contact.html" class="nav-link">CONTACT</a>
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
  <div class="page-hero-bg" style="background-image:url('https://images.unsplash.com/photo-1543207093-7bf3a6bfcfd2?w=1920&q=80');"></div>
  <div style="position:absolute;inset:0;background:linear-gradient(to bottom,rgba(15,5,3,0.65),rgba(15,5,3,0.92));"></div>
  <div class="relative z-10 max-w-3xl mx-auto px-6">
    <p class="font-cinzel text-xs tracking-[0.4em] mb-4 fade-up" style="color:var(--gold);">PARISH LIFE</p>
    <h1 class="font-cinzel font-black text-white mb-4 fade-up delay-1" style="font-size:clamp(2.2rem,5vw,4rem);">Events &amp; News</h1>
    <div class="ornament fade-up delay-2"><span class="ornament-icon">✦</span></div>
    <p class="font-cormorant text-xl text-gray-300 fade-up delay-3" style="font-size:1.2rem;">Celebrating the liturgical year together — join us for every feast, festival and gathering.</p>
  </div>
</section>


<!-- ══════ FEATURED EVENT ══════ -->
<section class="section-mid py-20 px-6">
  <div class="max-w-6xl mx-auto reveal" id="featured-event-container"></div>
</section>


<!-- ══════ UPCOMING EVENTS GRID ══════ -->
<section class="section-dark py-20 px-6">
  <div class="max-w-6xl mx-auto">
    <div class="text-center mb-14 reveal">
      <p class="font-cinzel text-xs tracking-[0.3em] mb-3" style="color:var(--gold);">COMING UP</p>
      <h2 class="font-cinzel text-3xl md:text-4xl font-bold text-white">Upcoming Events</h2>
      <div class="ornament"><span class="ornament-icon">✦</span></div>
    </div>

    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 reveal" id="events-grid"></div>
  </div>
</section>


<!-- ══════ LITURGICAL CALENDAR ══════ -->
<section class="section-mid py-20 px-6">
  <div class="max-w-5xl mx-auto">
    <div class="text-center mb-14 reveal">
      <p class="font-cinzel text-xs tracking-[0.3em] mb-3" style="color:var(--gold);">THE CHURCH YEAR</p>
      <h2 class="font-cinzel text-3xl md:text-4xl font-bold text-white">Liturgical Calendar 2026</h2>
      <div class="ornament"><span class="ornament-icon">✦</span></div>
    </div>
    <div class="grid sm:grid-cols-2 gap-4 reveal" id="liturgical-grid"></div>
  </div>
</section>

<!-- Quote -->
<section class="section-mid py-20 px-6 reveal">
  <div class="max-w-6xl mx-auto flex justify-center">
    <div class="w-full max-w-2xl text-center px-8 md:px-14 py-14 relative overflow-hidden" style="background:linear-gradient(150deg,#3d1809 0%,#1a0a04 60%,#2e1008 100%);border:1px solid rgba(201,164,120,0.22);border-radius:18px;box-shadow:0 28px 70px rgba(0,0,0,0.6),inset 0 1px 0 rgba(201,164,120,0.1);">
      <div class="absolute top-0 left-0 w-36 h-36 opacity-10 pointer-events-none" style="background:radial-gradient(circle at 0 0,var(--gold),transparent);border-radius:0 0 100% 0;"></div>
      <div class="absolute bottom-0 right-0 w-36 h-36 opacity-10 pointer-events-none" style="background:radial-gradient(circle at 100% 100%,var(--gold),transparent);border-radius:100% 0 0 0;"></div>
      <div class="text-5xl mb-6 relative z-10">🕊️</div>
      <p class="scripture-quote text-white mb-6 relative z-10">Come to me, all you who are weary and burdened, and I will give you rest.</p>
      <div class="ornament relative z-10"><span class="ornament-icon">✦</span></div>
      <p class="font-cinzel text-xs tracking-[0.3em] mt-5 relative z-10" style="color:var(--gold-light);">— MATTHEW 11:28</p>
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
(function renderEventsPage() {
  const TAG_COLORS = {
    gold:   { bg:'var(--gold)',                      color:'var(--navy)' },
    green:  { bg:'rgba(26,92,58,0.4)',               color:'#6ee7a0' },
    blue:   { bg:'rgba(30,64,175,0.4)',              color:'#93c5fd' },
    purple: { bg:'rgba(109,40,217,0.4)',             color:'#c4b5fd' },
    orange: { bg:'rgba(154,52,18,0.4)',              color:'#fed7aa' },
    amber:  { bg:'rgba(133,77,14,0.5)',              color:'#fde68a' },
  };
  const MONTHS = ['JAN','FEB','MAR','APR','MAY','JUN','JUL','AUG','SEP','OCT','NOV','DEC'];

  function fmtDate(d) {
    const dt = new Date(d + 'T00:00:00');
    return { day: dt.getDate(), mon: MONTHS[dt.getMonth()] };
  }
  function fmtLong(d) {
    const dt = new Date(d + 'T00:00:00');
    return dt.toLocaleDateString('en-GB',{day:'numeric',month:'long',year:'numeric'});
  }

  /* Ticker */
  const ticker = document.getElementById('ticker-text');
  if (ticker) { const t = CathedralDB.buildTickerText(); if(t) ticker.textContent = t; }

  const events = CathedralDB.get('events').filter(e => e.published);
  const featured = events.find(e => e.featured) || events[0];

  /* Featured event */
  const featEl = document.getElementById('featured-event-container');
  if (featEl && featured) {
    const d = fmtLong(featured.date);
    featEl.innerHTML = `
      <div class="relative overflow-hidden rounded-sm" style="border:1px solid rgba(201,164,120,0.25);">
        <img src="${featured.image}" alt="${featured.title}" class="w-full object-cover" style="height:420px;">
        <div style="position:absolute;inset:0;background:linear-gradient(to right,rgba(15,5,3,0.95) 40%,rgba(15,5,3,0.4) 100%);"></div>
        <div class="absolute inset-0 flex items-center px-10 md:px-16">
          <div class="max-w-lg">
            <div class="inline-block px-3 py-1 font-cinzel text-xs tracking-widest mb-4 font-bold" style="background:var(--gold);color:var(--navy);">FEATURED EVENT</div>
            <h2 class="font-cinzel text-3xl md:text-4xl font-bold text-white mb-3">${featured.title}</h2>
            <div class="flex flex-wrap gap-4 mb-4">
              <span class="flex items-center gap-2 text-sm" style="color:var(--gold-light);"><i class="fas fa-calendar-alt text-xs"></i> ${d}</span>
              <span class="flex items-center gap-2 text-sm" style="color:var(--gold-light);"><i class="fas fa-clock text-xs"></i> ${featured.time}</span>
              <span class="flex items-center gap-2 text-sm" style="color:var(--gold-light);"><i class="fas fa-map-marker-alt text-xs"></i> ${featured.location}</span>
            </div>
            <p class="text-gray-300 text-sm leading-relaxed mb-6">${featured.description}</p>
            <a href="contact.html" class="btn-gold">REGISTER ATTENDANCE</a>
          </div>
        </div>
      </div>`;
  }

  /* Events grid — exclude the featured one */
  const gridEl = document.getElementById('events-grid');
  if (gridEl) {
    const rest = events.filter(e => !e.featured || e.id !== (featured && featured.id));
    if (!rest.length) {
      gridEl.innerHTML = '<p class="text-gray-500 col-span-3 text-center py-10">No upcoming events at this time.</p>';
    } else {
      gridEl.innerHTML = rest.map(e => {
        const tc = TAG_COLORS[e.tagColor] || TAG_COLORS.gold;
        const { day, mon } = fmtDate(e.date);
        return `
        <div class="card-glass rounded-sm overflow-hidden">
          <div class="relative">
            <img src="${e.image}" alt="${e.title}" class="w-full object-cover" style="height:180px;">
            <div class="absolute top-0 left-0 w-16 text-center py-2 font-cinzel font-bold" style="background:var(--gold);color:var(--navy);">
              <div class="text-xl leading-none">${day}</div>
              <div class="text-xs">${mon}</div>
            </div>
          </div>
          <div class="p-5">
            <div class="inline-block px-2 py-0.5 text-xs font-cinzel tracking-wider mb-3 rounded-sm" style="background:${tc.bg};color:${tc.color};">${e.tag}</div>
            <h4 class="font-cinzel font-bold text-white mb-2">${e.title}</h4>
            <p class="text-gray-400 text-sm mb-3">${e.description}</p>
            <div class="flex items-center gap-3 text-xs" style="color:var(--gold-light);">
              <span><i class="fas fa-clock mr-1"></i>${e.time}</span>
              <span><i class="fas fa-map-marker-alt mr-1"></i>${e.location}</span>
            </div>
          </div>
        </div>`;
      }).join('');
    }
  }

  /* Liturgical calendar */
  const litEl = document.getElementById('liturgical-grid');
  if (litEl) {
    const dates = (CathedralDB.get('liturgicalDates') || []).sort((a,b) => (a.order||0)-(b.order||0));
    litEl.innerHTML = dates.map(d => `
      <div class="mass-card rounded-sm flex items-start gap-4">
        <div class="font-cinzel text-center min-w-[4rem] pt-1" style="color:var(--gold);">
          <div class="text-xs tracking-wider font-bold leading-snug">${d.date}</div>
        </div>
        <div>
          <div class="font-cinzel font-bold text-white text-sm">${d.feast}</div>
          <div class="text-gray-400 text-xs mt-1">${d.note}</div>
        </div>
      </div>`).join('') || '<p class="text-gray-500">No dates listed.</p>';
  }
})();
</script>
</body>
</html>
