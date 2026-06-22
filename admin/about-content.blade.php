<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" /><meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>About Page Content — Cathedral CMS</title>
  <link rel="stylesheet" href="{{ asset('admin/css/admin.css') }}" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <script src="{{ asset('js/data.js') }}"></script>
  <style>
    .content-section { background:var(--panel-bg);border:1px solid var(--border);border-radius:10px;padding:24px;margin-bottom:20px; }
    .content-section h2 { font-size:15px;font-weight:700;color:var(--gold);margin:0 0 4px;display:flex;align-items:center;gap:8px; }
    .content-section p.section-desc { font-size:12px;color:var(--text-muted);margin:0 0 18px; }
    .char-count { font-size:11px;color:var(--text-dim);text-align:right;margin-top:4px; }
    .section-divider { border:none;border-top:1px solid var(--border);margin:6px 0 20px; }
    .preview-box { background:var(--navy-mid);border:1px solid var(--border);border-radius:6px;padding:14px 16px;font-size:13px;color:var(--text-muted);line-height:1.7;margin-top:8px;display:none; }
    .preview-box.visible { display:block; }
    .toggle-preview { font-size:11px;color:var(--gold);background:none;border:none;cursor:pointer;padding:0;margin-top:6px; }
    .toggle-preview:hover { text-decoration:underline; }
    .bishop-img-preview { width:80px;height:80px;border-radius:50%;object-fit:cover;border:2px solid var(--gold);display:block;margin-bottom:8px; }
    .img-error { display:none;font-size:11px;color:#ef4444;margin-top:4px; }
  </style>
</head>
<body>
<div class="admin-layout">
  <aside class="sidebar"></aside>
  <div class="main-area">
    <header class="top-header">
      <div class="page-title">
        <h1>About Page Content</h1>
        <p>Edit church history, bishop biography, and About page settings</p>
      </div>
      <div class="header-actions">
        <a href="../about.html" target="_blank" class="btn btn-outline btn-sm"><i class="fas fa-external-link-alt"></i> View About Page</a>
        <button class="btn btn-gold" onclick="saveAll()"><i class="fas fa-save"></i> Save All Changes</button>
      </div>
    </header>

    <div class="page-content">
      <div class="breadcrumb"><a href="index.html">Dashboard</a><span>/</span><span>About Page Content</span></div>

      <!-- Church History -->
      <div class="content-section">
        <h2><i class="fas fa-landmark"></i> Church History</h2>
        <p class="section-desc">Three paragraphs displayed in the "Our History" section of the About page.</p>
        <hr class="section-divider" />
        <div class="form-group">
          <label class="form-label">Paragraph 1 — Origins &amp; Founding</label>
          <textarea id="history-p1" class="form-control" rows="4" oninput="updateChar(this,'c1')" placeholder="Early history of the cathedral and diocese…"></textarea>
          <div class="char-count" id="c1">0 characters</div>
          <button class="toggle-preview" onclick="togglePreview('prev-p1')"><i class="fas fa-eye"></i> Preview</button>
          <div class="preview-box" id="prev-p1"></div>
        </div>
        <div class="form-group" style="margin-top:14px;">
          <label class="form-label">Paragraph 2 — The Cathedral Building</label>
          <textarea id="history-p2" class="form-control" rows="4" oninput="updateChar(this,'c2')" placeholder="History of the physical church building…"></textarea>
          <div class="char-count" id="c2">0 characters</div>
          <button class="toggle-preview" onclick="togglePreview('prev-p2')"><i class="fas fa-eye"></i> Preview</button>
          <div class="preview-box" id="prev-p2"></div>
        </div>
        <div class="form-group" style="margin-top:14px;">
          <label class="form-label">Paragraph 3 — The Diocese &amp; Today</label>
          <textarea id="history-p3" class="form-control" rows="4" oninput="updateChar(this,'c3')" placeholder="Creation of the Diocese of Ekiti, current status…"></textarea>
          <div class="char-count" id="c3">0 characters</div>
          <button class="toggle-preview" onclick="togglePreview('prev-p3')"><i class="fas fa-eye"></i> Preview</button>
          <div class="preview-box" id="prev-p3"></div>
        </div>
      </div>

      <!-- Bishop Profile -->
      <div class="content-section">
        <h2><i class="fas fa-mitre"></i> Bishop's Profile</h2>
        <p class="section-desc">Information shown in the "Our Bishop" section on the About page and the bishop spotlight on the Home page.</p>
        <hr class="section-divider" />
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:16px;">
          <div class="form-group">
            <label class="form-label">Full Name</label>
            <input type="text" id="bishop-name" class="form-control" placeholder="e.g. Most Rev. Felix Femi Ajakaye" />
          </div>
          <div class="form-group">
            <label class="form-label">Title / Position</label>
            <input type="text" id="bishop-title" class="form-control" placeholder="e.g. Bishop of Ekiti Diocese" />
          </div>
          <div class="form-group">
            <label class="form-label">Year Ordained Bishop</label>
            <input type="text" id="bishop-since" class="form-control" placeholder="e.g. 2003" />
          </div>
          <div class="form-group">
            <label class="form-label">Diocese Name</label>
            <input type="text" id="bishop-diocese" class="form-control" placeholder="e.g. Diocese of Ekiti" />
          </div>
          <div class="form-group" style="grid-column:1/-1;">
            <label class="form-label">Bishop Photo URL</label>
            <input type="url" id="bishop-image" class="form-control" placeholder="https://…" oninput="previewBishopImg(this.value)" />
            <div class="img-error" id="img-error"><i class="fas fa-exclamation-triangle"></i> Image could not be loaded — check the URL.</div>
            <div style="margin-top:10px;" id="img-preview-wrap" style="display:none;">
              <img id="img-preview" class="bishop-img-preview" alt="Bishop preview" onerror="imgErr()" onload="imgOk()" />
            </div>
          </div>
          <div class="form-group" style="grid-column:1/-1;">
            <label class="form-label">Home Page Message / Quote (shown on index.html)</label>
            <textarea id="bishop-message" class="form-control" rows="3" placeholder="Short pastoral message or quote…"></textarea>
          </div>
          <div class="form-group" style="grid-column:1/-1;">
            <label class="form-label">Biography — Paragraph 1</label>
            <textarea id="bishop-bio1" class="form-control" rows="4" oninput="updateChar(this,'cb1')" placeholder="Early life, ordination, episcopal appointments…"></textarea>
            <div class="char-count" id="cb1">0 characters</div>
          </div>
          <div class="form-group" style="grid-column:1/-1;">
            <label class="form-label">Biography — Paragraph 2</label>
            <textarea id="bishop-bio2" class="form-control" rows="4" oninput="updateChar(this,'cb2')" placeholder="Ministry achievements, diocesan programmes…"></textarea>
            <div class="char-count" id="cb2">0 characters</div>
          </div>
        </div>
      </div>

      <!-- Page Intro -->
      <div class="content-section">
        <h2><i class="fas fa-heading"></i> Page Intro Text</h2>
        <p class="section-desc">The hero subtitle shown at the top of the About page.</p>
        <hr class="section-divider" />
        <div class="form-group">
          <label class="form-label">About Page Subtitle</label>
          <input type="text" id="about-subtitle" class="form-control" placeholder="e.g. Discover the story, faith, and community of St. Patrick's" />
        </div>
      </div>

      <div style="display:flex;gap:12px;justify-content:flex-end;padding-bottom:40px;">
        <button class="btn btn-outline" onclick="discardChanges()"><i class="fas fa-undo"></i> Discard Changes</button>
        <button class="btn btn-gold" onclick="saveAll()"><i class="fas fa-save"></i> Save All Changes</button>
      </div>
    </div>
  </div>
</div>

<div id="toast-container"></div>
<script src="{{ asset('admin/js/admin.js') }}"></script>
<script>
function updateChar(el, countId) {
  document.getElementById(countId).textContent = `${el.value.length} characters`;
}

function togglePreview(id) {
  const box = document.getElementById(id);
  const isVisible = box.classList.contains('visible');
  if (!isVisible) {
    const fieldMap = { 'prev-p1': 'history-p1', 'prev-p2': 'history-p2', 'prev-p3': 'history-p3' };
    box.textContent = document.getElementById(fieldMap[id]).value || '(empty)';
    box.classList.add('visible');
  } else {
    box.classList.remove('visible');
  }
}

function previewBishopImg(url) {
  const img = document.getElementById('img-preview');
  const wrap = document.getElementById('img-preview-wrap');
  const err = document.getElementById('img-error');
  if (!url) { wrap.style.display = 'none'; err.style.display = 'none'; return; }
  wrap.style.display = 'block';
  img.src = url;
  err.style.display = 'none';
}

function imgErr() {
  document.getElementById('img-error').style.display = 'block';
}

function imgOk() {
  document.getElementById('img-error').style.display = 'none';
}

function loadFields() {
  const s = CathedralDB.get('settings') || {};
  document.getElementById('history-p1').value = s.churchHistoryP1 || '';
  document.getElementById('history-p2').value = s.churchHistoryP2 || '';
  document.getElementById('history-p3').value = s.churchHistoryP3 || '';
  document.getElementById('bishop-name').value = s.bishopName || '';
  document.getElementById('bishop-title').value = s.bishopTitle || '';
  document.getElementById('bishop-since').value = s.bishopSince || '';
  document.getElementById('bishop-diocese').value = s.diocese || '';
  document.getElementById('bishop-image').value = s.bishopImage || '';
  document.getElementById('bishop-message').value = s.bishopMessage || '';
  document.getElementById('bishop-bio1').value = s.bishopBio1 || '';
  document.getElementById('bishop-bio2').value = s.bishopBio2 || '';
  document.getElementById('about-subtitle').value = s.aboutSubtitle || '';

  ['history-p1','history-p2','history-p3','bishop-bio1','bishop-bio2'].forEach((id, i) => {
    const countId = ['c1','c2','c3','cb1','cb2'][i];
    updateChar(document.getElementById(id), countId);
  });

  if (s.bishopImage) previewBishopImg(s.bishopImage);
}

function saveAll() {
  const s = CathedralDB.get('settings') || {};
  s.churchHistoryP1  = document.getElementById('history-p1').value.trim();
  s.churchHistoryP2  = document.getElementById('history-p2').value.trim();
  s.churchHistoryP3  = document.getElementById('history-p3').value.trim();
  s.bishopName       = document.getElementById('bishop-name').value.trim();
  s.bishopTitle      = document.getElementById('bishop-title').value.trim();
  s.bishopSince      = document.getElementById('bishop-since').value.trim();
  s.diocese          = document.getElementById('bishop-diocese').value.trim();
  s.bishopImage      = document.getElementById('bishop-image').value.trim();
  s.bishopMessage    = document.getElementById('bishop-message').value.trim();
  s.bishopBio1       = document.getElementById('bishop-bio1').value.trim();
  s.bishopBio2       = document.getElementById('bishop-bio2').value.trim();
  s.aboutSubtitle    = document.getElementById('about-subtitle').value.trim();
  CathedralDB.set('settings', s);
  CathedralDB.log('Admin', 'Updated About page content');
  showToast('About page content saved!', 'success');
}

function discardChanges() {
  confirmAction('Discard all unsaved changes and reload?', () => loadFields());
}

document.addEventListener('DOMContentLoaded', () => { renderSidebar(); loadFields(); });
</script>
</body>
</html>
