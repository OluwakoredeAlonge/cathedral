<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" /><meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Announcements — Cathedral CMS</title>
  <link rel="stylesheet" href="{{ asset('admin/css/admin.css') }}" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <script src="{{ asset('js/data.js') }}"></script>
</head>
<body>
<div class="admin-layout">
  <aside class="sidebar"></aside>
  <div class="main-area">
    <header class="top-header">
      <div class="page-title"><h1>Announcements</h1><p>Manage the scrolling ticker bar shown on every public page</p></div>
      <div class="header-actions">
        <button class="btn btn-gold" onclick="openModal('add-modal')"><i class="fas fa-plus"></i> Add Announcement</button>
      </div>
    </header>

    <div class="page-content">
      <div class="breadcrumb"><a href="index.html">Dashboard</a><span>/</span><span>Announcements</span></div>

      <!-- Live preview -->
      <div class="panel" style="margin-bottom:20px;">
        <div class="panel-header"><div class="panel-title"><i class="fas fa-eye"></i> Live Ticker Preview</div></div>
        <div class="panel-body" style="padding:0;">
          <div style="overflow:hidden;background:#9c7a2e;padding:10px 0;">
            <div id="ticker-preview" style="display:inline-block;white-space:nowrap;animation:ticker 30s linear infinite;font-family:'Cinzel',serif;font-size:12px;letter-spacing:0.1em;color:#fff;"></div>
          </div>
        </div>
      </div>

      <!-- Announcements table -->
      <div class="panel">
        <div class="toolbar">
          <div class="search-box"><i class="fas fa-search"></i><input type="text" id="search" placeholder="Search announcements…" oninput="renderTable()"></div>
          <span style="font-size:12px;color:var(--text-muted);" id="count-label"></span>
        </div>
        <table class="data-table">
          <thead><tr><th style="width:40px;">#</th><th>Announcement Text</th><th style="width:100px;">Status</th><th style="width:120px;">Actions</th></tr></thead>
          <tbody id="table-body"></tbody>
        </table>
      </div>

      <!-- Tips -->
      <div class="panel" style="margin-top:20px;">
        <div class="panel-header"><div class="panel-title"><i class="fas fa-lightbulb"></i> Tips</div></div>
        <div class="panel-body" style="display:grid;grid-template-columns:1fr 1fr 1fr;gap:14px;">
          <div style="font-size:12px;color:var(--text-muted);"><strong style="color:var(--text);">Order matters</strong><br/>Drag to reorder. Announcements scroll left to right in the order shown.</div>
          <div style="font-size:12px;color:var(--text-muted);"><strong style="color:var(--text);">Keep it concise</strong><br/>Short, punchy announcements read better in the ticker. Aim for under 60 characters.</div>
          <div style="font-size:12px;color:var(--text-muted);"><strong style="color:var(--text);">Toggle visibility</strong><br/>Disable an announcement without deleting it. Great for seasonal messages.</div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Add/Edit Modal -->
<div class="modal-backdrop" id="add-modal">
  <div class="modal">
    <div class="modal-header">
      <span class="modal-title" id="modal-title">Add Announcement</span>
      <button class="modal-close" onclick="closeModal('add-modal')">&times;</button>
    </div>
    <div class="modal-body">
      <input type="hidden" id="edit-id" />
      <div class="form-group">
        <label class="form-label">Announcement Text <span style="color:var(--red);">*</span></label>
        <input type="text" id="ann-text" class="form-control" placeholder="e.g. Sunday Mass at 9:00 AM – All are welcome!" maxlength="120" />
        <div class="form-hint">Maximum 120 characters. The ✦ bullet is added automatically.</div>
      </div>
      <div class="form-group">
        <label class="toggle">
          <input type="checkbox" id="ann-active" checked />
          <div class="toggle-track"><div class="toggle-thumb"></div></div>
          <span class="toggle-label">Active (visible on public site)</span>
        </label>
      </div>
    </div>
    <div class="modal-footer">
      <button class="btn btn-outline" onclick="closeModal('add-modal')">Cancel</button>
      <button class="btn btn-gold" onclick="saveAnnouncement()"><i class="fas fa-save"></i> Save</button>
    </div>
  </div>
</div>

<div id="toast-container"></div>
<script src="{{ asset('admin/js/admin.js') }}"></script>
<script>
  function renderTable() {
    const q = document.getElementById('search').value.toLowerCase();
    const items = CathedralDB.get('announcements').filter(a => a.text.toLowerCase().includes(q));
    document.getElementById('count-label').textContent = `${items.length} announcement${items.length !== 1 ? 's' : ''}`;
    const tbody = document.getElementById('table-body');
    tbody.innerHTML = '';
    if (!items.length) { tbody.innerHTML = '<tr><td colspan="4"><div class="empty-state"><i class="fas fa-bullhorn"></i><h3>No announcements found</h3></div></td></tr>'; return; }
    items.forEach((a, i) => {
      tbody.innerHTML += `<tr>
        <td style="color:var(--text-dim);">${i + 1}</td>
        <td>
          <div style="font-weight:500;">✦ ${a.text}</div>
        </td>
        <td>
          <label class="toggle" onclick="event.stopPropagation()">
            <input type="checkbox" ${a.active ? 'checked' : ''} onchange="toggleActive(${a.id}, this.checked)">
            <div class="toggle-track"><div class="toggle-thumb"></div></div>
            <span class="toggle-label">${a.active ? 'Active' : 'Off'}</span>
          </label>
        </td>
        <td>
          <div class="actions">
            <button class="btn-icon" title="Edit" onclick="editAnn(${a.id})"><i class="fas fa-pen"></i></button>
            <button class="btn-icon danger" title="Delete" onclick="deleteAnn(${a.id})"><i class="fas fa-trash"></i></button>
          </div>
        </td>
      </tr>`;
    });
    /* update ticker preview */
    const text = CathedralDB.get('announcements').filter(x => x.active).map(x => '✦ ' + x.text).join('   |   ');
    document.getElementById('ticker-preview').textContent = text + '   |   ' + text;
  }

  function toggleActive(id, val) {
    const items = CathedralDB.get('announcements');
    const item = items.find(a => a.id === id);
    if (item) { item.active = val; CathedralDB.set('announcements', items); }
    renderTable();
    showToast(val ? 'Announcement activated' : 'Announcement deactivated', 'info');
    CathedralDB.log('Admin', `${val ? 'Activated' : 'Deactivated'} announcement: "${item?.text?.slice(0,40)}"`);
  }

  function editAnn(id) {
    const item = CathedralDB.get('announcements').find(a => a.id === id);
    if (!item) return;
    document.getElementById('edit-id').value = id;
    document.getElementById('ann-text').value = item.text;
    document.getElementById('ann-active').checked = item.active;
    document.getElementById('modal-title').textContent = 'Edit Announcement';
    openModal('add-modal');
  }

  function deleteAnn(id) {
    confirmAction('Delete this announcement? This cannot be undone.', () => {
      const items = CathedralDB.get('announcements').filter(a => a.id !== id);
      CathedralDB.set('announcements', items);
      renderTable();
      showToast('Announcement deleted', 'error');
      CathedralDB.log('Admin', 'Deleted an announcement');
    });
  }

  function saveAnnouncement() {
    const text = document.getElementById('ann-text').value.trim();
    if (!text) { showToast('Please enter announcement text', 'error'); return; }
    const active = document.getElementById('ann-active').checked;
    const editId = parseInt(document.getElementById('edit-id').value);
    const items = CathedralDB.get('announcements');
    if (editId) {
      const item = items.find(a => a.id === editId);
      if (item) { item.text = text; item.active = active; }
      CathedralDB.log('Admin', `Updated announcement: "${text.slice(0,40)}"`);
    } else {
      items.push({ id: CathedralDB.nextId('announcements'), text, active });
      CathedralDB.log('Admin', `Added announcement: "${text.slice(0,40)}"`);
    }
    CathedralDB.set('announcements', items);
    closeModal('add-modal');
    document.getElementById('edit-id').value = '';
    document.getElementById('ann-text').value = '';
    document.getElementById('ann-active').checked = true;
    document.getElementById('modal-title').textContent = 'Add Announcement';
    renderTable();
    showToast('Announcement saved!', 'success');
  }

  window.addEventListener('DOMContentLoaded', renderTable);
</script>
<style>@keyframes ticker{from{transform:translateX(100%)}to{transform:translateX(-50%)}}</style>
</body>
</html>
