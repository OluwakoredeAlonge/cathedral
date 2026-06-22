<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" /><meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Mass Schedule — Cathedral CMS</title>
  <link rel="stylesheet" href="{{ asset('admin/css/admin.css') }}" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <script src="{{ asset('js/data.js') }}"></script>
</head>
<body>
<div class="admin-layout">
  <aside class="sidebar"></aside>
  <div class="main-area">
    <header class="top-header">
      <div class="page-title"><h1>Mass Schedule</h1><p>Manage weekly Mass times and special devotions</p></div>
      <div class="header-actions">
        <button class="btn btn-outline" onclick="openModal('add-devotion-modal')"><i class="fas fa-plus"></i> Add Devotion</button>
        <button class="btn btn-gold" onclick="openMassModal()"><i class="fas fa-plus"></i> Add Mass Time</button>
      </div>
    </header>

    <div class="page-content">
      <div class="breadcrumb"><a href="index.html">Dashboard</a><span>/</span><span>Mass Schedule</span></div>

      <div style="display:grid;grid-template-columns:3fr 2fr;gap:20px;">

        <!-- Mass times -->
        <div>
          <div class="panel">
            <div class="panel-header">
              <div class="panel-title"><i class="fas fa-church"></i> Weekly Mass Times</div>
              <span id="mass-count" class="badge badge-gold"></span>
            </div>
            <table class="data-table">
              <thead><tr><th>Day</th><th>Times</th><th>Language</th><th>Note</th><th>Actions</th></tr></thead>
              <tbody id="mass-tbody"></tbody>
            </table>
          </div>

          <!-- Devotions -->
          <div class="panel" style="margin-top:20px;">
            <div class="panel-header">
              <div class="panel-title"><i class="fas fa-pray"></i> Special Devotions &amp; Prayers</div>
              <span id="dev-count" class="badge badge-blue"></span>
            </div>
            <table class="data-table">
              <thead><tr><th>Title</th><th>Schedule</th><th>Status</th><th>Actions</th></tr></thead>
              <tbody id="dev-tbody"></tbody>
            </table>
          </div>
        </div>

        <!-- Preview card -->
        <div>
          <div class="panel" style="position:sticky;top:80px;">
            <div class="panel-header"><div class="panel-title"><i class="fas fa-eye"></i> Public Preview</div></div>
            <div class="panel-body" style="padding:12px;">
              <div id="preview-card" style="background:#060d1f;border-radius:8px;padding:16px;"></div>
            </div>
            <div class="panel-body" style="padding:12px;border-top:1px solid var(--border);">
              <a href="../masses.html" target="_blank" class="btn btn-outline" style="width:100%;justify-content:center;">
                <i class="fas fa-external-link-alt"></i> View Masses Page
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Mass Modal -->
<div class="modal-backdrop" id="mass-modal">
  <div class="modal">
    <div class="modal-header">
      <span class="modal-title" id="mass-modal-title">Add Mass Time</span>
      <button class="modal-close" onclick="closeModal('mass-modal')">&times;</button>
    </div>
    <div class="modal-body">
      <input type="hidden" id="mass-edit-id" />
      <div class="form-row form-row-2">
        <div class="form-group">
          <label class="form-label">Day <span style="color:var(--red)">*</span></label>
          <select id="mass-day" class="form-control">
            <option value="">Select day…</option>
            <option>Monday</option><option>Tuesday</option><option>Wednesday</option>
            <option>Thursday</option><option>Friday</option><option>Saturday</option><option>Sunday</option>
          </select>
        </div>
        <div class="form-group">
          <label class="form-label">Language</label>
          <input type="text" id="mass-lang" class="form-control" placeholder="e.g. English / Yoruba" />
        </div>
      </div>
      <div class="form-group">
        <label class="form-label">Times <span style="color:var(--red)">*</span></label>
        <input type="text" id="mass-times" class="form-control" placeholder="e.g. 7:00 AM · 9:00 AM · 11:00 AM" />
        <div class="form-hint">Separate multiple times with · (middle dot)</div>
      </div>
      <div class="form-group">
        <label class="form-label">Special Note</label>
        <input type="text" id="mass-note" class="form-control" placeholder="e.g. Vigil Mass · Stations of the Cross during Lent" />
      </div>
    </div>
    <div class="modal-footer">
      <button class="btn btn-outline" onclick="closeModal('mass-modal')">Cancel</button>
      <button class="btn btn-gold" onclick="saveMass()"><i class="fas fa-save"></i> Save</button>
    </div>
  </div>
</div>

<!-- Devotion Modal -->
<div class="modal-backdrop" id="add-devotion-modal">
  <div class="modal">
    <div class="modal-header">
      <span class="modal-title" id="dev-modal-title">Add Devotion</span>
      <button class="modal-close" onclick="closeModal('add-devotion-modal')">&times;</button>
    </div>
    <div class="modal-body">
      <input type="hidden" id="dev-edit-id" />
      <div class="form-group">
        <label class="form-label">Title <span style="color:var(--red)">*</span></label>
        <input type="text" id="dev-title" class="form-control" placeholder="e.g. Eucharistic Adoration" />
      </div>
      <div class="form-group">
        <label class="form-label">Schedule <span style="color:var(--red)">*</span></label>
        <input type="text" id="dev-schedule" class="form-control" placeholder="e.g. Fridays · 4:00 PM – 6:00 PM" />
      </div>
      <div class="form-group">
        <label class="form-label">Description</label>
        <textarea id="dev-desc" class="form-control" rows="3" placeholder="Brief description…"></textarea>
      </div>
      <div class="form-group">
        <label class="toggle">
          <input type="checkbox" id="dev-active" checked />
          <div class="toggle-track"><div class="toggle-thumb"></div></div>
          <span class="toggle-label">Active (visible on public site)</span>
        </label>
      </div>
    </div>
    <div class="modal-footer">
      <button class="btn btn-outline" onclick="closeModal('add-devotion-modal')">Cancel</button>
      <button class="btn btn-gold" onclick="saveDevtion()"><i class="fas fa-save"></i> Save</button>
    </div>
  </div>
</div>

<div id="toast-container"></div>
<script src="{{ asset('admin/js/admin.js') }}"></script>
<script>
  function renderMasses() {
    const masses = CathedralDB.get('masses');
    document.getElementById('mass-count').textContent = masses.length + ' entries';
    const tbody = document.getElementById('mass-tbody');
    tbody.innerHTML = '';
    masses.forEach(m => {
      tbody.innerHTML += `<tr>
        <td><strong>${m.day}</strong></td>
        <td style="color:var(--gold-light);font-weight:500;">${m.times}</td>
        <td style="color:var(--text-muted);">${m.language}</td>
        <td style="color:var(--text-dim);font-size:11px;">${m.note || '—'}</td>
        <td><div class="actions">
          <button class="btn-icon" onclick="editMass(${m.id})"><i class="fas fa-pen"></i></button>
          <button class="btn-icon danger" onclick="deleteMass(${m.id})"><i class="fas fa-trash"></i></button>
        </div></td>
      </tr>`;
    });
    renderPreview(masses);
  }

  function renderDevotions() {
    const devs = CathedralDB.get('devotions');
    document.getElementById('dev-count').textContent = devs.length + ' devotions';
    const tbody = document.getElementById('dev-tbody');
    tbody.innerHTML = '';
    devs.forEach(d => {
      tbody.innerHTML += `<tr>
        <td><strong>${d.title}</strong><div style="font-size:11px;color:var(--text-muted);margin-top:2px;">${d.description}</div></td>
        <td style="color:var(--gold-light);font-size:12px;">${d.schedule}</td>
        <td><label class="toggle"><input type="checkbox" ${d.active ? 'checked' : ''} onchange="toggleDevtion(${d.id},this.checked)">
          <div class="toggle-track"><div class="toggle-thumb"></div></div><span class="toggle-label">${d.active ? 'Active' : 'Off'}</span></label></td>
        <td><div class="actions">
          <button class="btn-icon" onclick="editDevtion(${d.id})"><i class="fas fa-pen"></i></button>
          <button class="btn-icon danger" onclick="deleteDevtion(${d.id})"><i class="fas fa-trash"></i></button>
        </div></td>
      </tr>`;
    });
  }

  function renderPreview(masses) {
    const pc = document.getElementById('preview-card');
    pc.innerHTML = masses.slice(0,4).map(m => `
      <div style="border-left:2px solid #c9a84c;padding:8px 12px;margin-bottom:8px;background:rgba(201,168,76,0.05);">
        <div style="font-family:'Cinzel',serif;font-size:9px;letter-spacing:0.2em;color:#c9a84c;">${m.day.toUpperCase()}</div>
        <div style="color:#fff;font-weight:600;font-size:13px;">${m.times}</div>
        <div style="color:#7a8ba8;font-size:11px;">${m.language}${m.note ? ' · ' + m.note : ''}</div>
      </div>`).join('') + (masses.length > 4 ? `<div style="color:var(--text-dim);font-size:11px;text-align:center;margin-top:4px;">+${masses.length - 4} more…</div>` : '');
  }

  function openMassModal() {
    document.getElementById('mass-edit-id').value = '';
    document.getElementById('mass-day').value = '';
    document.getElementById('mass-times').value = '';
    document.getElementById('mass-lang').value = '';
    document.getElementById('mass-note').value = '';
    document.getElementById('mass-modal-title').textContent = 'Add Mass Time';
    openModal('mass-modal');
  }

  function editMass(id) {
    const m = CathedralDB.get('masses').find(x => x.id === id);
    if (!m) return;
    document.getElementById('mass-edit-id').value = id;
    document.getElementById('mass-day').value = m.day;
    document.getElementById('mass-times').value = m.times;
    document.getElementById('mass-lang').value = m.language;
    document.getElementById('mass-note').value = m.note;
    document.getElementById('mass-modal-title').textContent = 'Edit Mass Time';
    openModal('mass-modal');
  }

  function saveMass() {
    const day = document.getElementById('mass-day').value;
    const times = document.getElementById('mass-times').value.trim();
    if (!day || !times) { showToast('Day and Times are required', 'error'); return; }
    const items = CathedralDB.get('masses');
    const editId = parseInt(document.getElementById('mass-edit-id').value);
    const data = { day, times, language: document.getElementById('mass-lang').value || 'English', note: document.getElementById('mass-note').value };
    if (editId) { const i = items.find(x => x.id === editId); if (i) Object.assign(i, data); }
    else { items.push({ id: CathedralDB.nextId('masses'), ...data }); }
    CathedralDB.set('masses', items);
    closeModal('mass-modal');
    renderMasses();
    showToast('Mass schedule saved!', 'success');
    CathedralDB.log('Admin', `Updated mass schedule for ${day}`);
  }

  function deleteMass(id) {
    confirmAction('Delete this mass time entry?', () => {
      CathedralDB.set('masses', CathedralDB.get('masses').filter(x => x.id !== id));
      renderMasses(); showToast('Entry deleted', 'error');
    });
  }

  function editDevtion(id) {
    const d = CathedralDB.get('devotions').find(x => x.id === id);
    if (!d) return;
    document.getElementById('dev-edit-id').value = id;
    document.getElementById('dev-title').value = d.title;
    document.getElementById('dev-schedule').value = d.schedule;
    document.getElementById('dev-desc').value = d.description;
    document.getElementById('dev-active').checked = d.active;
    document.getElementById('dev-modal-title').textContent = 'Edit Devotion';
    openModal('add-devotion-modal');
  }

  function toggleDevtion(id, val) {
    const items = CathedralDB.get('devotions');
    const item = items.find(x => x.id === id);
    if (item) { item.active = val; CathedralDB.set('devotions', items); }
    renderDevotions(); showToast(val ? 'Devotion activated' : 'Devotion deactivated', 'info');
  }

  function saveDevtion() {
    const title = document.getElementById('dev-title').value.trim();
    const schedule = document.getElementById('dev-schedule').value.trim();
    if (!title || !schedule) { showToast('Title and schedule required', 'error'); return; }
    const items = CathedralDB.get('devotions');
    const editId = parseInt(document.getElementById('dev-edit-id').value);
    const data = { title, schedule, description: document.getElementById('dev-desc').value, active: document.getElementById('dev-active').checked };
    if (editId) { const i = items.find(x => x.id === editId); if (i) Object.assign(i, data); }
    else { items.push({ id: CathedralDB.nextId('devotions'), ...data }); }
    CathedralDB.set('devotions', items);
    closeModal('add-devotion-modal');
    renderDevotions(); showToast('Devotion saved!', 'success');
    CathedralDB.log('Admin', `Updated devotion: ${title}`);
  }

  function deleteDevtion(id) {
    confirmAction('Delete this devotion entry?', () => {
      CathedralDB.set('devotions', CathedralDB.get('devotions').filter(x => x.id !== id));
      renderDevotions(); showToast('Deleted', 'error');
    });
  }

  window.addEventListener('DOMContentLoaded', () => { renderMasses(); renderDevotions(); });
</script>
</body>
</html>
