<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" /><meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Settings — Cathedral CMS</title>
  <link rel="stylesheet" href="{{ asset('admin/css/admin.css') }}" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <script src="{{ asset('js/data.js') }}"></script>
</head>
<body>
<div class="admin-layout">
  <aside class="sidebar"></aside>
  <div class="main-area">
    <header class="top-header">
      <div class="page-title"><h1>Site Settings</h1><p>Configure contact info, bishop's message, hero content and social links</p></div>
      <div class="header-actions">
        <button class="btn btn-outline" onclick="resetSettings()"><i class="fas fa-rotate-left"></i> Reset Defaults</button>
        <button class="btn btn-gold" onclick="saveSettings()"><i class="fas fa-save"></i> Save All Changes</button>
      </div>
    </header>

    <div class="page-content">
      <div class="breadcrumb"><a href="index.html">Dashboard</a><span>/</span><span>Settings</span></div>

      <!-- Tab nav -->
      <div class="panel" style="margin-bottom:0;border-bottom:none;border-radius:10px 10px 0 0;">
        <div class="tabs" id="settings-tabs" style="padding:0 18px;">
          <button class="tab-btn active" onclick="showTab('general',this)">General</button>
          <button class="tab-btn" onclick="showTab('contact',this)">Contact</button>
          <button class="tab-btn" onclick="showTab('bishop',this)">Bishop's Profile</button>
          <button class="tab-btn" onclick="showTab('hero',this)">Hero Section</button>
          <button class="tab-btn" onclick="showTab('social',this)">Social Media</button>
          <button class="tab-btn" onclick="showTab('stats',this)">Statistics</button>
        </div>
      </div>

      <div class="panel" style="border-radius:0 0 10px 10px;">
        <div class="panel-body">

          <!-- General -->
          <div id="tab-general" class="stab">
            <h3 style="font-size:14px;font-weight:700;margin-bottom:16px;color:var(--gold);">General Information</h3>
            <div class="form-row form-row-2">
              <div class="form-group"><label class="form-label">Site / Church Name</label><input id="s-siteName" class="form-control" /></div>
              <div class="form-group"><label class="form-label">Diocese</label><input id="s-diocese" class="form-control" /></div>
              <div class="form-group"><label class="form-label">Tagline</label><input id="s-tagline" class="form-control" /></div>
              <div class="form-group"><label class="form-label">Ecclesiastical Province</label><input id="s-province" class="form-control" /></div>
              <div class="form-group"><label class="form-label">Year Founded</label><input id="s-founded" class="form-control" type="number" /></div>
            </div>
            <div class="form-group">
              <label class="form-label">Welcome Section Title</label>
              <input id="s-welcomeTitle" class="form-control" placeholder="e.g. A Community of Faith, Hope & Love" />
            </div>
            <div class="form-group">
              <label class="form-label">Welcome Section Text</label>
              <textarea id="s-welcomeText" class="form-control" rows="4"></textarea>
            </div>
          </div>

          <!-- Contact -->
          <div id="tab-contact" class="stab" style="display:none;">
            <h3 style="font-size:14px;font-weight:700;margin-bottom:16px;color:var(--gold);">Contact Information</h3>
            <div class="form-row form-row-2">
              <div class="form-group"><label class="form-label">Street Address</label><input id="s-address" class="form-control" /></div>
              <div class="form-group"><label class="form-label">P.O. Box</label><input id="s-poBox" class="form-control" /></div>
              <div class="form-group"><label class="form-label">Phone Number</label><input id="s-phone" class="form-control" type="tel" /></div>
              <div class="form-group"><label class="form-label">Email Address</label><input id="s-email" class="form-control" type="email" /></div>
              <div class="form-group"><label class="form-label">Website URL</label><input id="s-website" class="form-control" /></div>
            </div>
            <div style="background:var(--surface2);border:1px solid var(--border);border-radius:7px;padding:14px;margin-top:8px;">
              <div style="font-size:12px;font-weight:600;color:var(--gold);margin-bottom:8px;"><i class="fas fa-info-circle"></i> Preview</div>
              <div style="font-size:12px;color:var(--text-muted);line-height:2;" id="contact-preview"></div>
            </div>
          </div>

          <!-- Bishop -->
          <div id="tab-bishop" class="stab" style="display:none;">
            <h3 style="font-size:14px;font-weight:700;margin-bottom:16px;color:var(--gold);">Bishop's Profile &amp; Message</h3>
            <div class="form-row form-row-2">
              <div class="form-group"><label class="form-label">Bishop's Full Name</label><input id="s-bishopName" class="form-control" /></div>
              <div class="form-group"><label class="form-label">Title / Credentials</label><input id="s-bishopTitle" class="form-control" placeholder="e.g. DD · Bishop of Ekiti" /></div>
              <div class="form-group"><label class="form-label">Installed Since</label><input id="s-bishopSince" class="form-control" placeholder="e.g. April 17, 2010" /></div>
            </div>
            <div class="form-group">
              <label class="form-label">Bishop's Photo URL</label>
              <input id="s-bishopImage" class="form-control" placeholder="https://…" oninput="updateBishopPreview()" />
              <div class="img-preview" id="bishop-img-preview" style="margin-top:8px;height:200px;"><span><i class="fas fa-user" style="display:block;margin-bottom:6px;font-size:24px;"></i>Photo preview</span></div>
            </div>
            <div class="form-group">
              <label class="form-label">Bishop's Message / Welcome Quote</label>
              <textarea id="s-bishopMessage" class="form-control" rows="6" placeholder="The bishop's welcome message shown on the homepage…"></textarea>
              <div class="form-hint">This appears in the "Bishop's Message" section on the homepage.</div>
            </div>
          </div>

          <!-- Hero -->
          <div id="tab-hero" class="stab" style="display:none;">
            <h3 style="font-size:14px;font-weight:700;margin-bottom:16px;color:var(--gold);">Homepage Hero Section</h3>
            <div class="form-row form-row-2">
              <div class="form-group"><label class="form-label">Hero Main Title</label><input id="s-heroTitle" class="form-control" placeholder="e.g. ST. PATRICK'S" /></div>
              <div class="form-group"><label class="form-label">Hero Subtitle</label><input id="s-heroSubtitle" class="form-control" placeholder="e.g. CATHOLIC CATHEDRAL" /></div>
            </div>
            <div class="form-group">
              <label class="form-label">Hero Tagline</label>
              <input id="s-heroTagline" class="form-control" placeholder="Short inspiring tagline shown under the subtitle" />
            </div>
            <div class="form-group">
              <label class="form-label">Hero Background Image URL</label>
              <input id="s-heroImage" class="form-control" placeholder="https://…" oninput="updateHeroPreview()" />
              <div style="margin-top:8px;border-radius:7px;overflow:hidden;height:200px;position:relative;background:var(--surface2);border:1px solid var(--border);">
                <img id="hero-img-preview" src="" style="width:100%;height:100%;object-fit:cover;display:none;">
                <div id="hero-preview-overlay" style="position:absolute;inset:0;background:rgba(6,13,31,0.7);display:flex;align-items:center;justify-content:center;flex-direction:column;">
                  <div id="hero-title-preview" style="font-family:'Cinzel',serif;font-size:20px;font-weight:900;color:#fff;letter-spacing:0.1em;text-align:center;"></div>
                  <div id="hero-sub-preview" style="font-family:'Cinzel',serif;font-size:11px;color:var(--gold);letter-spacing:0.3em;margin-top:4px;text-align:center;"></div>
                  <div id="hero-tag-preview" style="font-size:11px;color:rgba(255,255,255,0.7);margin-top:8px;text-align:center;font-style:italic;max-width:280px;"></div>
                </div>
              </div>
            </div>
          </div>

          <!-- Social -->
          <div id="tab-social" class="stab" style="display:none;">
            <h3 style="font-size:14px;font-weight:700;margin-bottom:16px;color:var(--gold);">Social Media Links</h3>
            <div class="form-row form-row-2">
              <div class="form-group">
                <label class="form-label"><i class="fab fa-facebook" style="color:#1877f2;margin-right:6px;"></i>Facebook</label>
                <input id="s-facebook" class="form-control" placeholder="https://facebook.com/…" />
              </div>
              <div class="form-group">
                <label class="form-label"><i class="fab fa-youtube" style="color:#ff0000;margin-right:6px;"></i>YouTube</label>
                <input id="s-youtube" class="form-control" placeholder="https://youtube.com/…" />
              </div>
              <div class="form-group">
                <label class="form-label"><i class="fab fa-instagram" style="color:#e1306c;margin-right:6px;"></i>Instagram</label>
                <input id="s-instagram" class="form-control" placeholder="https://instagram.com/…" />
              </div>
              <div class="form-group">
                <label class="form-label"><i class="fab fa-whatsapp" style="color:#25d366;margin-right:6px;"></i>WhatsApp</label>
                <input id="s-whatsapp" class="form-control" placeholder="https://wa.me/…" />
              </div>
              <div class="form-group">
                <label class="form-label"><i class="fab fa-twitter" style="color:#1da1f2;margin-right:6px;"></i>Twitter / X</label>
                <input id="s-twitter" class="form-control" placeholder="https://twitter.com/…" />
              </div>
            </div>
          </div>

          <!-- Stats -->
          <div id="tab-stats" class="stab" style="display:none;">
            <h3 style="font-size:14px;font-weight:700;margin-bottom:16px;color:var(--gold);">Homepage Statistics</h3>
            <p style="font-size:12px;color:var(--text-muted);margin-bottom:16px;">These numbers appear in the statistics strip on the homepage.</p>
            <div class="form-row form-row-2">
              <div class="form-group"><label class="form-label">Founded Year</label><input id="s-statFounded" class="form-control" /></div>
              <div class="form-group"><label class="form-label">Years of Faith (e.g. 95+)</label><input id="s-statYears" class="form-control" /></div>
              <div class="form-group"><label class="form-label">Weekly Masses (number)</label><input id="s-statMasses" class="form-control" /></div>
              <div class="form-group"><label class="form-label">Parishioners (e.g. 5,000+)</label><input id="s-statParishioners" class="form-control" /></div>
            </div>
          </div>

        </div>
        <div style="padding:14px 18px;border-top:1px solid var(--border);display:flex;justify-content:flex-end;gap:8px;">
          <button class="btn btn-outline" onclick="resetSettings()"><i class="fas fa-rotate-left"></i> Reset</button>
          <button class="btn btn-gold" onclick="saveSettings()"><i class="fas fa-save"></i> Save All Changes</button>
        </div>
      </div>
    </div>
  </div>
</div>

<div id="toast-container"></div>
<script src="{{ asset('admin/js/admin.js') }}"></script>
<script>
  const FIELDS = ['siteName','diocese','tagline','province','founded','welcomeTitle','welcomeText',
    'address','poBox','phone','email','website','bishopName','bishopTitle','bishopSince','bishopImage','bishopMessage',
    'heroTitle','heroSubtitle','heroTagline','heroImage','facebook','youtube','instagram','whatsapp','twitter',
    'statFounded','statYears','statMasses','statParishioners'];

  function loadSettings() {
    const s = CathedralDB.get('settings');
    FIELDS.forEach(f => {
      const el = document.getElementById('s-' + f);
      if (el) el.value = s[f] || '';
    });
    updateBishopPreview();
    updateHeroPreview();
    updateContactPreview();
  }

  function saveSettings() {
    const s = CathedralDB.get('settings');
    FIELDS.forEach(f => {
      const el = document.getElementById('s-' + f);
      if (el) s[f] = el.value;
    });
    CathedralDB.set('settings', s);
    showToast('Settings saved successfully!', 'success');
    CathedralDB.log('Admin', 'Updated site settings');
  }

  function resetSettings() {
    confirmAction('Reset all settings to defaults? Your current settings will be lost.', () => {
      CathedralDB.reset('settings');
      loadSettings();
      showToast('Settings reset to defaults', 'info');
    });
  }

  function showTab(name, btn) {
    document.querySelectorAll('.stab').forEach(t => t.style.display = 'none');
    document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
    document.getElementById('tab-' + name).style.display = 'block';
    btn.classList.add('active');
    if (name === 'contact') updateContactPreview();
  }

  function updateBishopPreview() {
    const url = document.getElementById('s-bishopImage').value.trim();
    const p = document.getElementById('bishop-img-preview');
    p.innerHTML = url ? `<img src="${url}" onerror="this.parentElement.innerHTML='<span>Invalid URL</span>'" style="width:100%;height:100%;object-fit:cover;">` : '<span><i class="fas fa-user" style="display:block;margin-bottom:6px;font-size:24px;"></i>Photo preview</span>';
  }

  function updateHeroPreview() {
    const url   = document.getElementById('s-heroImage').value.trim();
    const title = document.getElementById('s-heroTitle').value;
    const sub   = document.getElementById('s-heroSubtitle').value;
    const tag   = document.getElementById('s-heroTagline').value;
    const img   = document.getElementById('hero-img-preview');
    if (url) { img.src = url; img.style.display = 'block'; } else { img.style.display = 'none'; }
    document.getElementById('hero-title-preview').textContent = title;
    document.getElementById('hero-sub-preview').textContent = sub;
    document.getElementById('hero-tag-preview').textContent = tag;
  }

  function updateContactPreview() {
    const get = id => (document.getElementById('s-' + id)?.value || '').trim();
    document.getElementById('contact-preview').innerHTML = `
      <span style="color:var(--gold);"><i class="fas fa-map-marker-alt"></i></span> ${get('address')}<br>
      <span style="color:var(--gold);"><i class="fas fa-phone"></i></span> ${get('phone')}<br>
      <span style="color:var(--gold);"><i class="fas fa-envelope"></i></span> ${get('email')}<br>
      <span style="color:var(--gold);"><i class="fas fa-globe"></i></span> ${get('website')}`;
  }

  /* Live preview updates */
  ['s-heroTitle','s-heroSubtitle','s-heroTagline'].forEach(id => {
    document.getElementById(id)?.addEventListener('input', updateHeroPreview);
  });
  ['s-address','s-phone','s-email','s-website'].forEach(id => {
    document.getElementById(id)?.addEventListener('input', updateContactPreview);
  });

  window.addEventListener('DOMContentLoaded', loadSettings);
</script>
</body>
</html>
