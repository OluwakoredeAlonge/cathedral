<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" /><meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Liturgical Calendar — Cathedral CMS</title>
  <link rel="stylesheet" href="{{ asset('admin/css/admin.css') }}" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <script src="{{ asset('js/data.js') }}"></script>
</head>
<body>
<div class="admin-layout">
  <aside class="sidebar"></aside>
  <div class="main-area">
    <header class="top-header">
      <div class="page-title">
        <h1>Liturgical Calendar</h1>
        <p>Manage feast days and holy days shown on the Events page</p>
      </div>
      <div class="header-actions">
        <a href="../events.html" target="_blank" class="btn btn-outline btn-sm"><i class="fas fa-external-link-alt"></i> View Page</a>
        <button class="btn btn-gold" onclick="openAddModal()"><i class="fas fa-plus"></i> Add Feast Day</button>
      </div>
    </header>

    <div class="page-content">
      <div class="breadcrumb"><a href="index.html">Dashboard</a><span>/</span><span>Liturgical Calendar</span></div>

      <div style="background:rgba(201,168,76,0.06);border:1px solid rgba(201,168,76,0.18);border-radius:8px;padding:14px 18px;margin-bottom:20px;display:flex;align-items:center;gap:12px;font-size:12px;color:var(--text-muted);">
        <i class="fas fa-calendar-check" style="color:var(--gold);font-size:16px;flex-shrink:0;"></i>
        <span>These feast days are displayed in the <strong style="color:var(--text);">Liturgical Calendar</strong> section of the Events page. For moveable feasts, enter the date as text (e.g., "Moveable" or the specific year's date).</span>
      </div>

      <div class="panel">
        <div class="toolbar">
          <div class="search-box"><i class="fas fa-search"></i><input type="text" id="search" placeholder="Search feasts…" oninput="renderTable()"></div>
          <span id="count-label" style="font-size:12px;color:var(--text-muted);"></span>
        </div>
        <table class="data-table">
          <thead>
            <tr>
              <th style="width:50px;">Order</th>
              <th style="width:130px;">Date</th>
              <th>Feast / Solemnity</th>
              <th>Note / Details</th>
              <th style="width:110px;">Actions</th>
            </tr>
          </thead>
          <tbody id="lit-table"></tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal-backdrop" id="lit-modal">
  <div class="modal" style="max-width:520px;">
    <div class="modal-header">
      <span class="modal-title" id="modal-title">Add Feast Day</span>
      <button class="modal-close" onclick="closeModal('lit-modal')">&times;</button>
    </div>
    <div class="modal-body">
      <input type="hidden" id="edit-id" />
      <div style="display:grid;grid-template-columns:1fr 1fr;gap:14px;">
        <div class="form-group" style="grid-column:1/-1;">
          <label class="form-label">Feast / Solemnity Name *</label>
          <input type="text" id="edit-feast" class="form-control" placeholder="e.g. Feast of St. Patrick" />
        </div>
        <div class="form-group">
          <label class="form-label">Date</label>
          <input type="text" id="edit-date" class="form-control" placeholder="e.g. March 17 or Moveable" />
        </div>
        <div class="form-group">
          <label class="form-label">Display Order</label>
          <input type="number" id="edit-order" class="form-control" min="1" value="1" />
        </div>
        <div class="form-group" style="grid-column:1/-1;">
          <label class="form-label">Note / Details</label>
          <textarea id="edit-note" class="form-control" rows="2" placeholder="e.g. Holy Day of Obligation — Solemn Mass with the Bishop"></textarea>
        </div>
      </div>
    </div>
    <div class="modal-footer">
      <button class="btn btn-outline" onclick="closeModal('lit-modal')">Cancel</button>
      <button class="btn btn-gold" onclick="saveFeast()"><i class="fas fa-save mr-1"></i> Save</button>
    </div>
  </div>
</div>

<div id="toast-container"></div>
<script src="{{ asset('admin/js/admin.js') }}"></script>
<script>
let editingId = null;

function renderTable() {
  const items = CathedralDB.get('liturgicalDates') || [];
  const q = (document.getElementById('search').value || '').toLowerCase();
  const filtered = items.filter(d => !q || d.feast.toLowerCase().includes(q) || (d.date||'').toLowerCase().includes(q) || (d.note||'').toLowerCase().includes(q))
    .sort((a,b) => (a.order||0)-(b.order||0));
  document.getElementById('count-label').textContent = `${filtered.length} of ${items.length}`;
  const tbody = document.getElementById('lit-table');
  tbody.innerHTML = filtered.map(d => `
    <tr>
      <td style="text-align:center;">
        <div style="display:flex;gap:4px;justify-content:center;align-items:center;">
          <button class="btn-icon" onclick="moveUp(${d.id})"><i class="fas fa-chevron-up"></i></button>
          <span style="font-size:12px;color:var(--text-muted);font-weight:600;">${d.order||'—'}</span>
          <button class="btn-icon" onclick="moveDown(${d.id})"><i class="fas fa-chevron-down"></i></button>
        </div>
      </td>
      <td><span style="background:rgba(201,168,76,0.15);color:var(--gold);padding:3px 8px;border-radius:4px;font-size:12px;font-weight:600;">${d.date||'—'}</span></td>
      <td style="font-weight:600;color:var(--text);">${d.feast}</td>
      <td style="color:var(--text-muted);font-size:12px;">${d.note||''}</td>
      <td>
        <div style="display:flex;gap:6px;">
          <button class="btn-icon" onclick="editFeast(${d.id})"><i class="fas fa-edit"></i></button>
          <button class="btn-icon danger" onclick="deleteFeast(${d.id})"><i class="fas fa-trash"></i></button>
        </div>
      </td>
    </tr>`).join('') || '<tr><td colspan="5" style="text-align:center;color:var(--text-dim);padding:40px;">No feast days found.</td></tr>';
}

function openAddModal() {
  editingId = null;
  document.getElementById('modal-title').textContent = 'Add Feast Day';
  ['edit-feast','edit-date','edit-note'].forEach(id => document.getElementById(id).value = '');
  document.getElementById('edit-order').value = (CathedralDB.get('liturgicalDates')||[]).length + 1;
  openModal('lit-modal');
}

function editFeast(id) {
  const items = CathedralDB.get('liturgicalDates') || [];
  const d = items.find(x => x.id === id); if (!d) return;
  editingId = id;
  document.getElementById('modal-title').textContent = 'Edit Feast Day';
  document.getElementById('edit-id').value = id;
  document.getElementById('edit-feast').value = d.feast || '';
  document.getElementById('edit-date').value = d.date || '';
  document.getElementById('edit-order').value = d.order || 1;
  document.getElementById('edit-note').value = d.note || '';
  openModal('lit-modal');
}

function saveFeast() {
  const feast = document.getElementById('edit-feast').value.trim();
  if (!feast) { showToast('Feast name is required.', 'error'); return; }
  const items = CathedralDB.get('liturgicalDates') || [];
  const id = editingId ? parseInt(editingId) : CathedralDB.nextId('liturgicalDates');
  const entry = { id, feast, date: document.getElementById('edit-date').value.trim(), order: parseInt(document.getElementById('edit-order').value)||1, note: document.getElementById('edit-note').value.trim() };
  if (editingId) { const idx = items.findIndex(x => x.id === id); if (idx !== -1) items[idx] = entry; else items.push(entry); }
  else items.push(entry);
  CathedralDB.set('liturgicalDates', items);
  editingId = null;
  closeModal('lit-modal');
  renderTable();
  showToast('Feast day saved!', 'success');
}

function deleteFeast(id) {
  const items = CathedralDB.get('liturgicalDates') || [];
  const d = items.find(x => x.id === id);
  confirmAction(`Delete "${d ? d.feast : 'this feast day'}"?`, () => {
    CathedralDB.set('liturgicalDates', items.filter(x => x.id !== id));
    renderTable(); showToast('Deleted.', 'success');
  });
}

function moveUp(id) {
  const items = [...(CathedralDB.get('liturgicalDates')||[])].sort((a,b)=>(a.order||0)-(b.order||0));
  const idx = items.findIndex(x=>x.id===id); if(idx<=0) return;
  const tmp=items[idx].order; items[idx].order=items[idx-1].order; items[idx-1].order=tmp;
  CathedralDB.set('liturgicalDates',items); renderTable();
}

function moveDown(id) {
  const items = [...(CathedralDB.get('liturgicalDates')||[])].sort((a,b)=>(a.order||0)-(b.order||0));
  const idx = items.findIndex(x=>x.id===id); if(idx<0||idx>=items.length-1) return;
  const tmp=items[idx].order; items[idx].order=items[idx+1].order; items[idx+1].order=tmp;
  CathedralDB.set('liturgicalDates',items); renderTable();
}

document.addEventListener('DOMContentLoaded', () => { renderSidebar(); renderTable(); });
</script>
</body>
</html>
