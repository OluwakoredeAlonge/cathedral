<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" /><meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Key Milestones — Cathedral CMS</title>
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
        <h1>Key Milestones</h1>
        <p>Manage the historical timeline shown on the About page</p>
      </div>
      <div class="header-actions">
        <a href="../about.html#timeline" target="_blank" class="btn btn-outline btn-sm"><i class="fas fa-external-link-alt"></i> View Timeline</a>
        <button class="btn btn-gold" onclick="openMilestoneModal()"><i class="fas fa-plus"></i> Add Milestone</button>
      </div>
    </header>

    <div class="page-content">
      <div class="breadcrumb"><a href="index.html">Dashboard</a><span>/</span><span>Key Milestones</span></div>

      <!-- Stats row -->
      <div class="stats-grid" style="grid-template-columns:repeat(3,1fr);margin-bottom:20px;">
        <div class="stat-card">
          <div class="stat-icon" style="background:rgba(201,168,76,0.1);color:var(--gold);"><i class="fas fa-flag"></i></div>
          <div class="stat-info"><div class="stat-value" id="stat-total">0</div><div class="stat-label">Total Milestones</div></div>
        </div>
        <div class="stat-card">
          <div class="stat-icon" style="background:rgba(59,130,246,0.1);color:var(--blue);"><i class="fas fa-calendar-days"></i></div>
          <div class="stat-info"><div class="stat-value" id="stat-earliest">—</div><div class="stat-label">Earliest Year</div></div>
        </div>
        <div class="stat-card">
          <div class="stat-icon" style="background:rgba(34,197,94,0.1);color:var(--green);"><i class="fas fa-clock-rotate-left"></i></div>
          <div class="stat-info"><div class="stat-value" id="stat-latest">—</div><div class="stat-label">Latest Year</div></div>
        </div>
      </div>

      <!-- Info banner -->
      <div style="background:rgba(201,168,76,0.06);border:1px solid rgba(201,168,76,0.18);border-radius:8px;padding:14px 18px;margin-bottom:20px;display:flex;align-items:center;gap:12px;font-size:12px;color:var(--text-muted);">
        <i class="fas fa-info-circle" style="color:var(--gold);font-size:16px;flex-shrink:0;"></i>
        <span>Milestones are displayed on the <strong style="color:var(--text);">About</strong> page in ascending order. Use the <i class="fas fa-arrows-up-down"></i> drag handles or the order field to control their sequence.</span>
      </div>

      <!-- Milestones table -->
      <div class="panel">
        <div class="toolbar">
          <div class="search-box"><i class="fas fa-search"></i><input type="text" id="search" placeholder="Search milestones…" oninput="renderTable()"></div>
          <span id="milestone-count" style="font-size:12px;color:var(--text-muted);"></span>
        </div>
        <table class="data-table">
          <thead>
            <tr>
              <th style="width:40px;">Order</th>
              <th style="width:160px;">Year / Date</th>
              <th>Title</th>
              <th>Description</th>
              <th style="width:100px;">Actions</th>
            </tr>
          </thead>
          <tbody id="milestones-tbody"></tbody>
        </table>
      </div>

      <!-- Timeline preview -->
      <div class="panel" style="margin-top:20px;">
        <div class="panel-header">
          <div class="panel-title"><i class="fas fa-eye"></i> Public Timeline Preview</div>
        </div>
        <div class="panel-body" style="padding:24px 32px;">
          <div id="timeline-preview" style="position:relative;padding-left:28px;"></div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Milestone Modal -->
<div class="modal-backdrop" id="milestone-modal">
  <div class="modal" style="max-width:560px;">
    <div class="modal-header">
      <span class="modal-title" id="modal-title">Add Milestone</span>
      <button class="modal-close" onclick="closeModal('milestone-modal')">&times;</button>
    </div>
    <div class="modal-body">
      <input type="hidden" id="m-id" />
      <div class="form-row form-row-2">
        <div class="form-group">
          <label class="form-label">Year / Date <span style="color:var(--red)">*</span></label>
          <input type="text" id="m-year" class="form-control" placeholder="e.g. 1929  or  July 30, 1972" />
          <div class="form-hint">Free text — can be a year, date range, or period.</div>
        </div>
        <div class="form-group">
          <label class="form-label">Display Order</label>
          <input type="number" id="m-order" class="form-control" min="1" placeholder="1" />
          <div class="form-hint">Lower numbers appear first.</div>
        </div>
      </div>
      <div class="form-group">
        <label class="form-label">Milestone Title <span style="color:var(--red)">*</span></label>
        <input type="text" id="m-title" class="form-control" placeholder="e.g. Diocese of Ekiti Established" />
      </div>
      <div class="form-group">
        <label class="form-label">Description <span style="color:var(--red)">*</span></label>
        <textarea id="m-description" class="form-control" rows="4" placeholder="A brief description of what happened during this milestone…"></textarea>
      </div>

      <!-- Live preview inside modal -->
      <div style="background:var(--surface2);border:1px solid var(--border);border-radius:8px;padding:16px;margin-top:4px;">
        <div style="font-size:11px;color:var(--text-dim);margin-bottom:10px;letter-spacing:0.06em;">PREVIEW</div>
        <div style="position:relative;padding-left:24px;">
          <div style="position:absolute;left:0;top:4px;width:10px;height:10px;border-radius:50%;background:var(--gold);border:2px solid var(--surface2);box-shadow:0 0 0 2px rgba(201,168,76,0.3);"></div>
          <div id="prev-year"  style="font-family:'Cinzel',serif;font-size:11px;font-weight:700;color:var(--gold);margin-bottom:2px;"></div>
          <div id="prev-title" style="font-family:'Cinzel',serif;font-size:13px;font-weight:700;color:#fff;margin-bottom:4px;"></div>
          <div id="prev-desc"  style="font-size:12px;color:var(--text-muted);line-height:1.6;"></div>
        </div>
      </div>
    </div>
    <div class="modal-footer">
      <button class="btn btn-outline" onclick="closeModal('milestone-modal')">Cancel</button>
      <button class="btn btn-gold" onclick="saveMilestone()"><i class="fas fa-save"></i> Save Milestone</button>
    </div>
  </div>
</div>

<div id="toast-container"></div>
<script src="{{ asset('admin/js/admin.js') }}"></script>
<script>
  /* ── Live preview in modal ── */
  ['m-year','m-title','m-description'].forEach(id => {
    document.getElementById(id).addEventListener('input', updateModalPreview);
  });
  function updateModalPreview() {
    document.getElementById('prev-year').textContent  = document.getElementById('m-year').value || 'Year';
    document.getElementById('prev-title').textContent = document.getElementById('m-title').value || 'Milestone Title';
    document.getElementById('prev-desc').textContent  = document.getElementById('m-description').value || 'Description will appear here…';
  }

  /* ── Render table ── */
  function renderTable() {
    const q = document.getElementById('search').value.toLowerCase();
    const milestones = CathedralDB.get('milestones')
      .slice().sort((a, b) => (a.order || 0) - (b.order || 0))
      .filter(m => m.year.toLowerCase().includes(q) || m.title.toLowerCase().includes(q) || m.description.toLowerCase().includes(q));

    document.getElementById('milestone-count').textContent = `${milestones.length} milestone${milestones.length !== 1 ? 's' : ''}`;

    const all = CathedralDB.get('milestones');
    document.getElementById('stat-total').textContent   = all.length;
    document.getElementById('stat-earliest').textContent = all.length ? all.slice().sort((a,b)=>(a.order||0)-(b.order||0))[0].year : '—';
    document.getElementById('stat-latest').textContent   = all.length ? all.slice().sort((a,b)=>(a.order||0)-(b.order||0)).slice(-1)[0].year : '—';

    const tbody = document.getElementById('milestones-tbody');
    tbody.innerHTML = '';
    if (!milestones.length) {
      tbody.innerHTML = `<tr><td colspan="5"><div class="empty-state"><i class="fas fa-timeline"></i><h3>No milestones found</h3><p>Add your first milestone to get started.</p></div></td></tr>`;
      renderPreview();
      return;
    }
    milestones.forEach(m => {
      tbody.innerHTML += `<tr>
        <td style="text-align:center;">
          <div style="display:flex;flex-direction:column;align-items:center;gap:4px;">
            <span style="font-family:'Cinzel',serif;font-size:13px;font-weight:700;color:var(--gold);">${m.order}</span>
            <div style="display:flex;flex-direction:column;gap:2px;">
              <button class="btn-icon" onclick="moveUp(${m.id})" title="Move up"><i class="fas fa-chevron-up" style="font-size:9px;"></i></button>
              <button class="btn-icon" onclick="moveDown(${m.id})" title="Move down"><i class="fas fa-chevron-down" style="font-size:9px;"></i></button>
            </div>
          </div>
        </td>
        <td><span class="badge badge-gold" style="font-family:'Cinzel',serif;font-size:10px;letter-spacing:0.05em;">${m.year}</span></td>
        <td>
          <div style="font-weight:600;color:var(--text);font-size:13px;">${m.title}</div>
        </td>
        <td style="color:var(--text-muted);font-size:12px;max-width:340px;">
          <div style="display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden;">${m.description}</div>
        </td>
        <td>
          <div class="actions">
            <button class="btn-icon" onclick="editMilestone(${m.id})" title="Edit"><i class="fas fa-pen"></i></button>
            <button class="btn-icon danger" onclick="deleteMilestone(${m.id})" title="Delete"><i class="fas fa-trash"></i></button>
          </div>
        </td>
      </tr>`;
    });
    renderPreview();
  }

  /* ── Timeline preview panel ── */
  function renderPreview() {
    const milestones = CathedralDB.get('milestones')
      .slice().sort((a, b) => (a.order || 0) - (b.order || 0));
    const container = document.getElementById('timeline-preview');
    if (!milestones.length) { container.innerHTML = '<p style="color:var(--text-dim);font-size:12px;">No milestones to preview.</p>'; return; }
    container.innerHTML = milestones.map((m, i) => `
      <div style="position:relative;padding-left:0;margin-bottom:${i < milestones.length - 1 ? '24px' : '0'};">
        <div style="position:absolute;left:-28px;top:4px;width:10px;height:10px;border-radius:50%;background:var(--gold);border:2px solid var(--surface);box-shadow:0 0 0 2px rgba(201,168,76,0.25);z-index:1;"></div>
        ${i < milestones.length - 1 ? `<div style="position:absolute;left:-24px;top:16px;width:2px;height:calc(100% + 10px);background:rgba(201,168,76,0.18);"></div>` : ''}
        <div style="font-family:'Cinzel',serif;font-size:11px;font-weight:700;color:var(--gold);margin-bottom:2px;">${m.year}</div>
        <div style="font-family:'Cinzel',serif;font-size:13px;font-weight:600;color:var(--text);margin-bottom:4px;">${m.title}</div>
        <div style="font-size:12px;color:var(--text-muted);line-height:1.6;">${m.description}</div>
      </div>`).join('');
  }

  /* ── Move up / down ── */
  function moveUp(id) {
    const list = CathedralDB.get('milestones').slice().sort((a,b) => (a.order||0) - (b.order||0));
    const idx  = list.findIndex(m => m.id === id);
    if (idx <= 0) return;
    const tmp = list[idx].order; list[idx].order = list[idx-1].order; list[idx-1].order = tmp;
    CathedralDB.set('milestones', list);
    renderTable();
  }
  function moveDown(id) {
    const list = CathedralDB.get('milestones').slice().sort((a,b) => (a.order||0) - (b.order||0));
    const idx  = list.findIndex(m => m.id === id);
    if (idx < 0 || idx >= list.length - 1) return;
    const tmp = list[idx].order; list[idx].order = list[idx+1].order; list[idx+1].order = tmp;
    CathedralDB.set('milestones', list);
    renderTable();
  }

  /* ── Open modal ── */
  function openMilestoneModal(m) {
    document.getElementById('m-id').value          = '';
    document.getElementById('m-year').value        = '';
    document.getElementById('m-title').value       = '';
    document.getElementById('m-description').value = '';
    document.getElementById('modal-title').textContent = 'Add Milestone';

    const all = CathedralDB.get('milestones');
    const maxOrder = all.length ? Math.max(...all.map(x => x.order || 0)) : 0;
    document.getElementById('m-order').value = m ? (m.order || '') : maxOrder + 1;

    if (m) {
      document.getElementById('m-id').value          = m.id;
      document.getElementById('m-year').value        = m.year;
      document.getElementById('m-title').value       = m.title;
      document.getElementById('m-description').value = m.description;
      document.getElementById('m-order').value       = m.order;
      document.getElementById('modal-title').textContent = 'Edit Milestone';
    }
    updateModalPreview();
    openModal('milestone-modal');
  }

  function editMilestone(id) {
    openMilestoneModal(CathedralDB.get('milestones').find(m => m.id === id));
  }

  /* ── Save ── */
  function saveMilestone() {
    const year  = document.getElementById('m-year').value.trim();
    const title = document.getElementById('m-title').value.trim();
    const desc  = document.getElementById('m-description').value.trim();
    const order = parseInt(document.getElementById('m-order').value) || 99;
    const editId = parseInt(document.getElementById('m-id').value);

    if (!year || !title || !desc) {
      showToast('Year, title and description are required.', 'error');
      return;
    }

    const list = CathedralDB.get('milestones');
    if (editId) {
      const m = list.find(x => x.id === editId);
      if (m) Object.assign(m, { year, title, description: desc, order });
      CathedralDB.log('Admin', `Updated milestone: ${title}`);
    } else {
      list.push({ id: CathedralDB.nextId('milestones'), year, title, description: desc, order });
      CathedralDB.log('Admin', `Added milestone: ${title}`);
    }
    CathedralDB.set('milestones', list);
    closeModal('milestone-modal');
    renderTable();
    showToast('Milestone saved!', 'success');
  }

  /* ── Delete ── */
  function deleteMilestone(id) {
    const m = CathedralDB.get('milestones').find(x => x.id === id);
    confirmAction(`Delete milestone "${m?.title}"? This cannot be undone.`, () => {
      CathedralDB.set('milestones', CathedralDB.get('milestones').filter(x => x.id !== id));
      CathedralDB.log('Admin', `Deleted milestone: ${m?.title}`);
      renderTable();
      showToast('Milestone deleted.', 'error');
    });
  }

  window.addEventListener('DOMContentLoaded', renderTable);
</script>
</body>
</html>
