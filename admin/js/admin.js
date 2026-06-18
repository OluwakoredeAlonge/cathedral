/* ── Auth guard ── */
// function requireAuth() {
//   if (!sessionStorage.getItem('cathedral_admin')) {
//     window.location.href = 'login.html';
//   }
// }

/* ── Toast notifications ── */
function showToast(msg, type = 'info') {
  let container = document.getElementById('toast-container');
  if (!container) {
    container = document.createElement('div');
    container.id = 'toast-container';
    document.body.appendChild(container);
  }
  const icons = { success: 'fa-check-circle', error: 'fa-exclamation-circle', info: 'fa-info-circle' };
  const colors = { success: '#22c55e', error: '#ef4444', info: '#c9a84c' };
  const t = document.createElement('div');
  t.className = `toast ${type}`;
  t.innerHTML = `<i class="fas ${icons[type]}" style="color:${colors[type]};flex-shrink:0;"></i><span>${msg}</span>`;
  container.appendChild(t);
  setTimeout(() => { t.style.opacity = '0'; t.style.transform = 'translateX(20px)'; t.style.transition = 'all 0.3s'; setTimeout(() => t.remove(), 300); }, 3500);
}

/* ── Sidebar injection ── */
const SIDEBAR_LINKS = [
  { section: 'OVERVIEW' },
  { href: 'index.html',         icon: 'fa-gauge',         label: 'Dashboard' },
  { section: 'CONTENT' },
  { href: 'announcements.html', icon: 'fa-bullhorn',       label: 'Announcements' },
  { href: 'homepage.html',      icon: 'fa-house',          label: 'Homepage Content' },
  { href: 'masses.html',        icon: 'fa-church',         label: 'Mass Schedule' },
  { section: 'MINISTRY' },
  { href: 'events.html',        icon: 'fa-calendar-days',  label: 'Events' },
  { href: 'gallery.html',       icon: 'fa-images',         label: 'Gallery' },
  { section: 'BLOG' },
  { href: 'posts.html',         icon: 'fa-newspaper',      label: 'All Posts' },
  { href: 'post-editor.html',   icon: 'fa-pen-to-square',  label: 'New Post' },
  { section: 'SYSTEM' },
  { href: 'settings.html',      icon: 'fa-gear',           label: 'Settings' },
  { href: 'users.html',         icon: 'fa-users',          label: 'Admin Users' },
];

function renderSidebar(activePage) {
  const current = activePage || window.location.pathname.split('/').pop();
  const user = JSON.parse(sessionStorage.getItem('cathedral_admin') || '{"name":"Admin","role":"Super Admin"}');

  let html = `
  <div class="sidebar-logo">
    <div class="sidebar-logo-icon">✝</div>
    <div class="sidebar-logo-text">
      <div class="sidebar-logo-title">CATHEDRAL CMS</div>
      <div class="sidebar-logo-sub">Admin Panel</div>
    </div>
  </div>
  <nav class="sidebar-nav">`;

  SIDEBAR_LINKS.forEach(link => {
    if (link.section) {
      html += `<div class="nav-section-label">${link.section}</div>`;
    } else {
      const active = current === link.href ? 'active' : '';
      html += `<a href="${link.href}" class="nav-item ${active}"><i class="fas ${link.icon}"></i> ${link.label}</a>`;
    }
  });

  html += `</nav>
  <div class="sidebar-footer">
    <div class="sidebar-user">
      <div class="sidebar-avatar">${user.name.charAt(0)}</div>
      <div><div class="sidebar-user-name">${user.name}</div><div class="sidebar-user-role">${user.role}</div></div>
    </div>
    <a href="../index.html" target="_blank" style="display:flex;align-items:center;gap:6px;margin-top:10px;font-size:11px;color:var(--text-dim);text-decoration:none;" class="nav-item" style="padding:6px 0;">
      <i class="fas fa-external-link-alt"></i> View Public Site
    </a>
    <a href="login.html" onclick="sessionStorage.clear()" style="display:flex;align-items:center;gap:6px;margin-top:4px;font-size:11px;color:var(--red);text-decoration:none;padding:6px 0;">
      <i class="fas fa-right-from-bracket"></i> Sign Out
    </a>
  </div>`;

  const sidebar = document.querySelector('.sidebar');
  if (sidebar) sidebar.innerHTML = html;
}

/* ── Modal helpers ── */
function openModal(id)  { document.getElementById(id).classList.add('open'); }
function closeModal(id) { document.getElementById(id).classList.remove('open'); }
function closeAllModals() { document.querySelectorAll('.modal-backdrop').forEach(m => m.classList.remove('open')); }

document.addEventListener('keydown', e => { if (e.key === 'Escape') closeAllModals(); });

/* ── Tab handling ── */
function initTabs(containerSelector) {
  const container = document.querySelector(containerSelector);
  if (!container) return;
  container.querySelectorAll('.tab-btn').forEach(btn => {
    btn.addEventListener('click', () => {
      container.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
      container.querySelectorAll('.tab-content').forEach(c => c.classList.remove('active'));
      btn.classList.add('active');
      const target = document.getElementById(btn.dataset.tab);
      if (target) target.classList.add('active');
    });
  });
}

/* ── Image preview helper ── */
function bindImagePreview(inputId, previewId) {
  const input = document.getElementById(inputId);
  const preview = document.getElementById(previewId);
  if (!input || !preview) return;
  input.addEventListener('input', () => {
    const url = input.value.trim();
    preview.innerHTML = url
      ? `<img src="${url}" onerror="this.parentElement.innerHTML='<span>Invalid image URL</span>'">`
      : '<span><i class="fas fa-image" style="display:block;margin-bottom:6px;font-size:22px;"></i>Image preview</span>';
  });
}

/* ── Confirm dialog ── */
function confirmAction(msg, onConfirm) {
  const d = document.createElement('div');
  d.className = 'modal-backdrop open';
  d.innerHTML = `
  <div class="modal" style="max-width:380px;">
    <div class="modal-header"><span class="modal-title">Confirm Action</span></div>
    <div class="modal-body"><p style="font-size:13px;color:var(--text-muted);">${msg}</p></div>
    <div class="modal-footer">
      <button class="btn btn-outline" id="conf-cancel">Cancel</button>
      <button class="btn btn-danger" id="conf-ok">Confirm</button>
    </div>
  </div>`;
  document.body.appendChild(d);
  document.getElementById('conf-cancel').onclick = () => d.remove();
  document.getElementById('conf-ok').onclick = () => { d.remove(); onConfirm(); };
}

/* ── Format date ── */
function fmtDate(dateStr) {
  if (!dateStr) return '—';
  const d = new Date(dateStr);
  return d.toLocaleDateString('en-GB', { day: 'numeric', month: 'short', year: 'numeric' });
}

/* ── Slugify ── */
function slugify(text) {
  return text.toLowerCase().replace(/[^a-z0-9\s-]/g,'').trim().replace(/\s+/g,'-');
}

/* ── Init on load ── */
window.addEventListener('DOMContentLoaded', () => {
  requireAuth();
  renderSidebar();
});
