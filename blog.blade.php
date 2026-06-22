<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" /><meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Blog — St. Patrick's Catholic Cathedral, Ado-Ekiti</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.min.js"></script>
  <script src="{{ asset('js/data.js') }}"></script>
</head>
<body>

<!-- Ticker -->
<div class="ticker-wrap" style="position:relative;z-index:1001;">
  <div class="ticker-content font-cinzel text-xs tracking-widest text-white opacity-90" id="ticker-text"></div>
</div>

<!-- Navbar -->
<nav id="navbar" class="py-4 px-6 md:px-12">
  <div class="max-w-7xl mx-auto flex items-center justify-between">
    <a href="index.html" class="flex items-center gap-3 group">
      <div class="w-10 h-10 rounded-full border border-yellow-600 flex items-center justify-center text-yellow-500 text-lg font-bold font-cinzel group-hover:bg-yellow-600 group-hover:text-navy transition-all duration-300">✝</div>
      <div>
        <div class="font-cinzel text-sm font-bold tracking-widest text-white leading-tight" id="nav-site-name">ST. PATRICK'S</div>
        <div class="font-cinzel text-xs tracking-widest" style="color:var(--gold);font-size:0.6rem;">CATHOLIC CATHEDRAL</div>
      </div>
    </a>
    <div class="hidden lg:flex items-center gap-8">
      <a href="index.html"   class="nav-link">HOME</a>
      <a href="about.html"   class="nav-link">ABOUT</a>
      <a href="masses.html"  class="nav-link">MASSES</a>
      <a href="events.html"  class="nav-link">EVENTS</a>
      <a href="blog.html"    class="nav-link active">BLOG</a>
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
  <div class="page-hero-bg" style="background-image:url('https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=1920&q=80');"></div>
  <div style="position:absolute;inset:0;background:linear-gradient(to bottom,rgba(15,5,3,0.65),rgba(15,5,3,0.92));"></div>
  <div class="relative z-10 max-w-3xl mx-auto px-6">
    <p class="font-cinzel text-xs tracking-[0.4em] mb-4 fade-up" style="color:var(--gold);">WORDS OF FAITH</p>
    <h1 class="font-cinzel font-black text-white mb-4 fade-up delay-1" style="font-size:clamp(2.2rem,5vw,4rem);">Cathedral Blog</h1>
    <div class="ornament fade-up delay-2"><span class="ornament-icon">✦</span></div>
    <p class="font-cormorant text-xl text-gray-300 fade-up delay-3" style="font-size:1.2rem;">Pastoral letters, parish news, reflections and faith formation — straight from the heart of our community.</p>
  </div>
</section>


<!-- ══════ FEATURED POST ══════ -->
<section class="section-mid py-16 px-6" id="featured-section" style="display:none;">
  <div class="max-w-6xl mx-auto reveal">
    <p class="font-cinzel text-xs tracking-[0.3em] mb-6" style="color:var(--gold);">FEATURED ARTICLE</p>
    <div id="featured-post" class="relative overflow-hidden rounded-sm" style="border:1px solid rgba(201,164,120,0.25);"></div>
  </div>
</section>


<!-- ══════ ALL POSTS ══════ -->
<section class="section-dark py-16 px-6">
  <div class="max-w-6xl mx-auto">

    <!-- Filter / Search bar -->
    <div class="flex flex-wrap gap-4 items-center justify-between mb-10 reveal">
      <div class="flex flex-wrap gap-2" id="cat-filters">
        <button class="filter-pill active" data-cat="" onclick="filterPosts(this,'')">All</button>
      </div>
      <div class="flex items-center gap-3">
        <div style="position:relative;">
          <i class="fas fa-search" style="position:absolute;left:10px;top:50%;transform:translateY(-50%);color:var(--text-dim);font-size:12px;"></i>
          <input type="text" id="blog-search" placeholder="Search articles…" oninput="renderPosts()"
            style="background:rgba(30,11,6,0.7);border:1px solid rgba(201,164,120,0.2);color:#e2e8f0;padding:8px 12px 8px 30px;border-radius:4px;outline:none;font-family:'Raleway',sans-serif;font-size:13px;width:220px;">
        </div>
        <select id="blog-sort" onchange="renderPosts()"
          style="background:rgba(30,11,6,0.7);border:1px solid rgba(201,164,120,0.2);color:#e2e8f0;padding:8px 12px;border-radius:4px;outline:none;font-family:'Raleway',sans-serif;font-size:12px;">
          <option value="newest">Newest First</option>
          <option value="oldest">Oldest First</option>
          <option value="popular">Most Popular</option>
        </select>
      </div>
    </div>

    <!-- Posts grid -->
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 reveal" id="posts-grid"></div>

    <!-- Empty state -->
    <div id="posts-empty" style="display:none;" class="text-center py-20">
      <div style="font-size:3rem;margin-bottom:12px;">✝</div>
      <p class="font-cinzel text-white text-lg">No articles found</p>
      <p class="text-gray-500 text-sm mt-2">Try a different search or category.</p>
    </div>

    <!-- Load more -->
    <div class="text-center mt-12" id="load-more-wrap" style="display:none;">
      <button onclick="loadMore()" class="btn-outline font-cinzel text-xs tracking-widest px-8 py-3" style="border:1px solid rgba(201,164,120,0.4);color:var(--gold-light);">
        LOAD MORE ARTICLES <i class="fas fa-arrow-down ml-2"></i>
      </button>
    </div>
  </div>
</section>


<!-- ══════ NEWSLETTER ══════ -->
<section class="section-mid py-20 px-6 reveal">
  <div class="max-w-6xl mx-auto flex justify-center">
    <div class="w-full max-w-xl text-center px-8 md:px-14 py-14 relative overflow-hidden" style="background:linear-gradient(150deg,#3d1809 0%,#1a0a04 60%,#2e1008 100%);border:1px solid rgba(201,164,120,0.22);border-radius:18px;box-shadow:0 28px 70px rgba(0,0,0,0.6),inset 0 1px 0 rgba(201,164,120,0.1);">
      <div class="absolute top-0 left-0 w-36 h-36 opacity-10 pointer-events-none" style="background:radial-gradient(circle at 0 0,var(--gold),transparent);border-radius:0 0 100% 0;"></div>
      <div class="absolute bottom-0 right-0 w-36 h-36 opacity-10 pointer-events-none" style="background:radial-gradient(circle at 100% 100%,var(--gold),transparent);border-radius:100% 0 0 0;"></div>
      <div class="relative z-10">
        <div class="w-14 h-14 mx-auto mb-6 flex items-center justify-center" style="background:rgba(201,164,120,0.1);border:1px solid rgba(201,164,120,0.3);border-radius:50%;">
          <i data-lucide="mail" style="color:var(--gold);width:24px;height:24px;"></i>
        </div>
        <p class="font-cinzel text-xs tracking-[0.3em] mb-3" style="color:var(--gold-light);">STAY CONNECTED</p>
        <h2 class="font-cinzel text-2xl md:text-3xl font-bold text-white mb-3">Parish Newsletter</h2>
        <div class="ornament"><span class="ornament-icon">✦</span></div>
        <p class="text-gray-300 text-sm mb-8 mt-2">Receive pastoral letters, upcoming events and parish news directly in your inbox.</p>
        <form onsubmit="subscribeNewsletter(event)" class="flex gap-3 max-w-md mx-auto">
          <input type="email" required placeholder="your@email.com" id="nl-email"
            style="flex:1;background:rgba(255,255,255,0.08);border:1px solid rgba(201,164,120,0.25);color:#fff;padding:10px 14px;border-radius:8px;outline:none;font-family:'Raleway',sans-serif;font-size:13px;">
          <button type="submit" class="btn-gold font-cinzel text-xs tracking-widest px-5 py-2">SUBSCRIBE</button>
        </form>
        <p id="nl-thanks" style="display:none;" class="text-green-300 text-sm mt-4">✅ Thank you! You're now subscribed.</p>
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
      <div class="flex gap-4" id="footer-socials"></div>
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
      <ul class="space-y-4 text-sm text-gray-500" id="footer-contact"></ul>
    </div>
  </div>
  <div class="max-w-6xl mx-auto mt-12 pt-6 flex flex-col md:flex-row justify-between items-center gap-3" style="border-top:1px solid rgba(201,164,120,0.1);">
    <p class="text-gray-600 text-xs">&copy; 2026 St. Patrick's Catholic Cathedral, Ado-Ekiti. All rights reserved.</p>
    <p class="text-gray-600 text-xs font-cinzel tracking-wider" id="footer-diocese"></p>
  </div>
</footer>

<div id="lightbox"><img id="lightbox-img" src="" alt=""/></div>
<script src="{{ asset('js/main.js') }}"></script>
<script>
  let currentCat = '';
  let visibleCount = 6;
  const PER_PAGE = 6;

  /* ── Boot ── */
  window.addEventListener('DOMContentLoaded', () => {
    loadSettings();
    buildCategoryFilters();
    renderFeatured();
    renderPosts();
  });

  function loadSettings() {
    const s = CathedralDB.get('settings');
    document.getElementById('ticker-text').textContent = CathedralDB.buildTickerText();
    document.getElementById('footer-diocese').textContent = `${s.diocese || 'Diocese of Ekiti'} · ${s.province || 'Ecclesiastical Province of Ibadan'}`;
    document.getElementById('footer-contact').innerHTML = `
      <li class="flex gap-3"><i class="fas fa-map-marker-alt mt-1" style="color:var(--gold);min-width:14px;"></i>${s.address || 'Ikere Road, Ado-Ekiti'}</li>
      <li class="flex gap-3"><i class="fas fa-phone mt-1" style="color:var(--gold);min-width:14px;"></i>${s.phone || '(0812) 567-4455'}</li>
      <li class="flex gap-3"><i class="fas fa-envelope mt-1" style="color:var(--gold);min-width:14px;"></i>${s.email || 'info@catholicdioceseofekiti.org'}</li>`;
    const socials = [
      { icon:'fab fa-facebook-f', link: s.facebook||'#' },
      { icon:'fab fa-youtube',    link: s.youtube||'#' },
      { icon:'fab fa-instagram',  link: s.instagram||'#' },
      { icon:'fab fa-whatsapp',   link: s.whatsapp||'#' },
    ];
    document.getElementById('footer-socials').innerHTML = socials.map(s =>
      `<a href="${s.link}" class="w-8 h-8 border border-yellow-800 rounded-sm flex items-center justify-center text-yellow-600 hover:bg-yellow-600 transition-all text-sm"><i class="${s.icon}"></i></a>`
    ).join('');
  }

  function buildCategoryFilters() {
    const posts = CathedralDB.getPublishedPosts();
    const cats  = [...new Set(posts.map(p => p.category).filter(Boolean))];
    const wrap  = document.getElementById('cat-filters');
    cats.forEach(c => {
      const btn = document.createElement('button');
      btn.className = 'filter-pill';
      btn.dataset.cat = c;
      btn.textContent = c;
      btn.onclick = () => filterPosts(btn, c);
      wrap.appendChild(btn);
    });
  }

  function filterPosts(btn, cat) {
    document.querySelectorAll('.filter-pill').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');
    currentCat = cat;
    visibleCount = PER_PAGE;
    renderPosts();
  }

  function renderFeatured() {
    const featured = CathedralDB.getPublishedPosts().find(p => p.featured);
    if (!featured) return;
    document.getElementById('featured-section').style.display = 'block';
    document.getElementById('featured-post').innerHTML = `
      <img src="${featured.image}" alt="${featured.title}" style="width:100%;height:380px;object-fit:cover;">
      <div style="position:absolute;inset:0;background:linear-gradient(to right,rgba(15,5,3,0.96) 40%,rgba(15,5,3,0.3) 100%);"></div>
      <div class="absolute inset-0 flex items-center px-10 md:px-14">
        <div style="max-width:500px;">
          <div class="inline-block px-3 py-1 font-cinzel text-xs tracking-widest mb-3 font-bold" style="background:var(--gold);color:var(--navy);">FEATURED</div>
          <div class="font-cinzel text-xs tracking-widest mb-2" style="color:var(--gold-light);">${featured.category}</div>
          <h2 class="font-cinzel text-2xl md:text-3xl font-bold text-white mb-3">${featured.title}</h2>
          <p class="text-gray-300 text-sm leading-relaxed mb-4">${featured.excerpt || ''}</p>
          <div class="flex items-center gap-4 mb-5" style="color:var(--gold-light);font-size:12px;">
            <span><i class="fas fa-user mr-1"></i>${featured.author}</span>
            <span><i class="fas fa-calendar mr-1"></i>${formatDate(featured.date)}</span>
            <span><i class="fas fa-eye mr-1"></i>${(featured.views||0).toLocaleString()} views</span>
          </div>
          <a href="blog-post.html?slug=${featured.slug}" class="btn-gold font-cinzel text-xs tracking-widest px-6 py-3">READ ARTICLE <i class="fas fa-arrow-right ml-2"></i></a>
        </div>
      </div>`;
  }

  function renderPosts() {
    const q    = document.getElementById('blog-search').value.toLowerCase();
    const sort = document.getElementById('blog-sort').value;
    let posts  = CathedralDB.getPublishedPosts().filter(p =>
      (!currentCat || p.category === currentCat) &&
      (!q || p.title.toLowerCase().includes(q) || (p.excerpt||'').toLowerCase().includes(q) || (p.tags||[]).some(t => t.toLowerCase().includes(q)))
    );
    if (sort === 'oldest')  posts.sort((a,b) => new Date(a.date) - new Date(b.date));
    if (sort === 'popular') posts.sort((a,b) => (b.views||0) - (a.views||0));

    const grid  = document.getElementById('posts-grid');
    const empty = document.getElementById('posts-empty');
    const lmBtn = document.getElementById('load-more-wrap');

    if (!posts.length) { grid.innerHTML = ''; empty.style.display = 'block'; lmBtn.style.display = 'none'; return; }
    empty.style.display = 'none';
    const visible = posts.slice(0, visibleCount);
    lmBtn.style.display = visibleCount < posts.length ? 'block' : 'none';

    grid.innerHTML = visible.map(p => `
      <article class="card-glass rounded-sm overflow-hidden flex flex-col">
        <a href="blog-post.html?slug=${p.slug}" class="block relative overflow-hidden" style="height:200px;">
          ${p.image
            ? `<img src="${p.image}" alt="${p.title}" class="w-full h-full object-cover transition-transform duration-500 hover:scale-105">`
            : `<div class="w-full h-full flex items-center justify-center text-4xl" style="background:var(--navy-mid);">✝</div>`}
          <div class="absolute top-3 left-3"><span class="font-cinzel text-xs font-bold px-2 py-1 rounded-sm" style="background:var(--gold);color:var(--navy);">${p.category}</span></div>
        </a>
        <div class="p-5 flex flex-col flex-1">
          <div class="flex items-center gap-3 mb-2 text-xs" style="color:var(--gold-light);">
            <span><i class="fas fa-calendar mr-1"></i>${formatDate(p.date)}</span>
            <span><i class="fas fa-eye mr-1"></i>${(p.views||0).toLocaleString()}</span>
          </div>
          <h3 class="font-cinzel font-bold text-white mb-2 leading-snug" style="font-size:0.95rem;">
            <a href="blog-post.html?slug=${p.slug}" class="hover:text-yellow-400 transition-colors">${p.title}</a>
          </h3>
          <p class="text-gray-400 text-sm leading-relaxed flex-1 mb-4">${(p.excerpt||'').slice(0,120)}${(p.excerpt||'').length>120?'…':''}</p>
          <div class="flex items-center justify-between mt-auto pt-3" style="border-top:1px solid rgba(201,164,120,0.12);">
            <span class="text-xs text-gray-500"><i class="fas fa-user mr-1"></i>${p.author||'Parish'}</span>
            <a href="blog-post.html?slug=${p.slug}" class="font-cinzel text-xs tracking-wider" style="color:var(--gold);">READ <i class="fas fa-arrow-right ml-1"></i></a>
          </div>
        </div>
      </article>`).join('');
  }

  function loadMore() {
    visibleCount += PER_PAGE;
    renderPosts();
  }

  function subscribeNewsletter(e) {
    e.preventDefault();
    document.getElementById('nl-email').value = '';
    document.getElementById('nl-thanks').style.display = 'block';
    setTimeout(() => document.getElementById('nl-thanks').style.display = 'none', 5000);
  }

  function formatDate(str) {
    if (!str) return '';
    return new Date(str).toLocaleDateString('en-GB', { day:'numeric', month:'long', year:'numeric' });
  }
</script>
<style>
  .filter-pill {
    font-family:'Cinzel',serif; font-size:10px; letter-spacing:0.12em;
    padding:5px 14px; border:1px solid rgba(201,164,120,0.25); color:rgba(248,243,232,0.6);
    background:transparent; cursor:pointer; border-radius:2px; transition:all .2s;
  }
  .filter-pill:hover  { border-color:var(--gold); color:var(--gold-light); }
  .filter-pill.active { background:rgba(201,164,120,0.12); border-color:var(--gold); color:var(--gold-light); }
</style>
<script>document.addEventListener('DOMContentLoaded', () => lucide.createIcons());</script>
</body>
</html>
