<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Gallery — St. Patrick's Catholic Cathedral, Ado-Ekiti</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <script src="{{ asset('js/data.js') }}"></script>
</head>
<body>

<div class="ticker-wrap" style="position:relative;z-index:1001;">
  <div id="ticker-text" class="ticker-content font-cinzel text-xs tracking-widest text-white opacity-90">
    &nbsp;&nbsp;&nbsp;✦ Moments of Grace — A visual journey through parish life at St. Patrick's &nbsp;&nbsp;&nbsp;
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
      <a href="gallery.html" class="nav-link active">GALLERY</a>
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
  <div class="page-hero-bg" style="background-image:url('https://images.unsplash.com/photo-1507692049790-de58290a4334?w=1920&q=80');"></div>
  <div style="position:absolute;inset:0;background:linear-gradient(to bottom,rgba(15,5,3,0.6),rgba(15,5,3,0.92));"></div>
  <div class="relative z-10 max-w-3xl mx-auto px-6">
    <p class="font-cinzel text-xs tracking-[0.4em] mb-4 fade-up" style="color:var(--gold);">MOMENTS OF GRACE</p>
    <h1 class="font-cinzel font-black text-white mb-4 fade-up delay-1" style="font-size:clamp(2.2rem,5vw,4rem);">Cathedral Gallery</h1>
    <div class="ornament fade-up delay-2"><span class="ornament-icon">✦</span></div>
    <p class="font-cormorant text-xl text-gray-300 fade-up delay-3" style="font-size:1.2rem;">A visual testament to the beauty of worship, community, and the living faith at St. Patrick's.</p>
  </div>
</section>


<!-- ══════ FILTER TABS ══════ -->
<section class="section-mid py-10 px-6">
  <div class="max-w-6xl mx-auto">
    <div class="flex flex-wrap gap-3 justify-center reveal" id="filter-tabs">
      <button class="filter-btn active font-cinzel text-xs tracking-widest px-5 py-2 border transition-all duration-300" data-filter="all" style="border-color:var(--gold);color:var(--gold);background:rgba(201,164,120,0.1);">ALL</button>
      <button class="filter-btn font-cinzel text-xs tracking-widest px-5 py-2 border transition-all duration-300" data-filter="liturgy" style="border-color:rgba(201,164,120,0.3);color:rgba(248,243,232,0.6);">LITURGY</button>
      <button class="filter-btn font-cinzel text-xs tracking-widest px-5 py-2 border transition-all duration-300" data-filter="community" style="border-color:rgba(201,164,120,0.3);color:rgba(248,243,232,0.6);">COMMUNITY</button>
      <button class="filter-btn font-cinzel text-xs tracking-widest px-5 py-2 border transition-all duration-300" data-filter="youth" style="border-color:rgba(201,164,120,0.3);color:rgba(248,243,232,0.6);">YOUTH</button>
      <button class="filter-btn font-cinzel text-xs tracking-widest px-5 py-2 border transition-all duration-300" data-filter="architecture" style="border-color:rgba(201,164,120,0.3);color:rgba(248,243,232,0.6);">ARCHITECTURE</button>
    </div>
  </div>
</section>


<!-- ══════ MASONRY GALLERY ══════ -->
<section class="section-dark pb-20 px-6">
  <div class="max-w-6xl mx-auto">

    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3 reveal" id="gallery-grid"></div>
  </div>
</section>


<!-- ══════ CTA ══════ -->
<section class="section-mid py-16 px-6">
  <div class="max-w-2xl mx-auto text-center reveal">
    <p class="font-cinzel text-xs tracking-[0.3em] mb-3" style="color:var(--gold);">SHARE YOUR MOMENTS</p>
    <h2 class="font-cinzel text-2xl md:text-3xl font-bold text-white mb-4">Be Part of Our Story</h2>
    <p class="text-gray-400 text-sm mb-8">Have photos from parish events, sacraments, or community activities? We'd love to feature them. Submit your photos to our media team.</p>
    <a href="mailto:photos@catholicdioceseofekiti.org" class="btn-gold">SUBMIT PHOTOS</a>
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

<!-- Lightbox -->
<div id="lightbox"><img id="lightbox-img" src="" alt=""/></div>

<script src="{{ asset('js/main.js') }}"></script>
<script>
(function renderGalleryPage() {
  /* Ticker */
  const ticker = document.getElementById('ticker-text');
  if (ticker) { const t = CathedralDB.buildTickerText(); if(t) ticker.textContent = t; }

  /* Gallery grid */
  const grid = document.getElementById('gallery-grid');
  const items = CathedralDB.get('gallery') || [];

  function spanClasses(span) {
    if (span === '2x2') return { cls: 'col-span-2 row-span-2', h: '420px' };
    if (span === '2x1') return { cls: 'col-span-2',            h: '280px' };
    return                      { cls: '',                      h: '220px' };
  }

  if (grid) {
    grid.innerHTML = items.map(item => {
      const { cls, h } = spanClasses(item.span);
      return `
      <div class="gallery-item ${cls} rounded-sm" style="height:${h};" data-category="${item.category}">
        <img src="${item.image}" alt="${item.title}" loading="lazy">
        <div class="gallery-overlay"><span class="font-cinzel text-xs tracking-wider text-white">${item.title}</span></div>
      </div>`;
    }).join('') || '<p class="text-gray-500 col-span-4 text-center py-10">No gallery items yet.</p>';
  }

  /* Filter buttons */
  const filterBtns = document.querySelectorAll('.filter-btn');
  function applyFilter(filter) {
    const galleryItems = document.querySelectorAll('#gallery-grid .gallery-item');
    galleryItems.forEach(item => {
      const show = filter === 'all' || item.dataset.category === filter;
      item.style.display = show ? 'block' : 'none';
      if (show) { item.style.opacity = '0'; setTimeout(() => { item.style.transition = 'opacity 0.4s'; item.style.opacity = '1'; }, 10); }
    });
  }

  filterBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      filterBtns.forEach(b => { b.classList.remove('active'); b.style.background='transparent'; b.style.color='rgba(248,243,232,0.6)'; b.style.borderColor='rgba(201,164,120,0.3)'; });
      btn.classList.add('active'); btn.style.background='rgba(201,164,120,0.1)'; btn.style.color='var(--gold)'; btn.style.borderColor='var(--gold)';
      applyFilter(btn.dataset.filter);
    });
  });
})();
</script>
</body>
</html>
