<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" /><meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard — Cathedral CMS</title>
  <link rel="stylesheet" href="{{ asset('admin/css/admin.css') }}" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <script src="{{ asset('js/data.js') }}"></script>
</head>
<body>
<div class="admin-layout">
  <aside class="sidebar"></aside>
  <div class="main-area">

    <!-- Header -->
    <header class="top-header">
      <div class="page-title">
        <h1>Dashboard</h1>
        <p id="greeting">Welcome back — here's what's happening</p>
      </div>
      <div class="header-actions">
        <a href="../index.html" target="_blank" class="header-btn" title="View Site"><i class="fas fa-external-link-alt"></i></a>
        <a href="post-editor.html" class="btn btn-gold btn-sm"><i class="fas fa-plus"></i> New Post</a>
      </div>
    </header>

    <div class="page-content">

      <!-- Stats -->
      <div class="stats-grid" id="stats-grid"></div>

      <!-- Row 1 -->
      <div class="grid-3-2" style="margin-bottom:20px;">

        <!-- Recent Blog Posts -->
        <div class="panel">
          <div class="panel-header">
            <div class="panel-title"><i class="fas fa-newspaper"></i> Recent Blog Posts</div>
            <a href="posts.html" class="btn btn-outline btn-sm">View All</a>
          </div>
          <table class="data-table" id="recent-posts-table">
            <thead><tr><th>Title</th><th>Category</th><th>Date</th><th>Status</th></tr></thead>
            <tbody></tbody>
          </table>
        </div>

        <!-- Quick Actions -->
        <div class="panel">
          <div class="panel-header"><div class="panel-title"><i class="fas fa-bolt"></i> Quick Actions</div></div>
          <div class="panel-body" style="display:grid;gap:8px;">
            <a href="post-editor.html" class="btn btn-outline" style="justify-content:flex-start;"><i class="fas fa-pen" style="color:var(--gold);"></i> Write New Blog Post</a>
            <a href="events.html" class="btn btn-outline" style="justify-content:flex-start;"><i class="fas fa-calendar-plus" style="color:var(--blue);"></i> Add New Event</a>
            <a href="masses.html" class="btn btn-outline" style="justify-content:flex-start;"><i class="fas fa-church" style="color:var(--green);"></i> Edit Mass Schedule</a>
            <a href="gallery.html" class="btn btn-outline" style="justify-content:flex-start;"><i class="fas fa-image" style="color:var(--purple);"></i> Add Gallery Photo</a>
            <a href="announcements.html" class="btn btn-outline" style="justify-content:flex-start;"><i class="fas fa-bullhorn" style="color:var(--amber);"></i> Update Announcements</a>
            <a href="settings.html" class="btn btn-outline" style="justify-content:flex-start;"><i class="fas fa-gear" style="color:var(--text-muted);"></i> Site Settings</a>
          </div>
        </div>
      </div>

      <!-- Row 2 -->
      <div class="grid-2-1" style="margin-bottom:20px;">

        <!-- Upcoming Events -->
        <div class="panel">
          <div class="panel-header">
            <div class="panel-title"><i class="fas fa-calendar-days"></i> Upcoming Events</div>
            <a href="events.html" class="btn btn-outline btn-sm">Manage</a>
          </div>
          <div id="upcoming-events" style="padding:0 4px;"></div>
        </div>

        <!-- Activity Log -->
        <div class="panel">
          <div class="panel-header"><div class="panel-title"><i class="fas fa-clock-rotate-left"></i> Recent Activity</div></div>
          <div class="panel-body" id="activity-feed"></div>
        </div>
      </div>

      <!-- Row 3: Mass Overview + Site Health -->
      <div class="grid-2">
        <!-- Mass schedule summary -->
        <div class="panel">
          <div class="panel-header">
            <div class="panel-title"><i class="fas fa-church"></i> Mass Schedule Overview</div>
            <a href="masses.html" class="btn btn-outline btn-sm">Edit</a>
          </div>
          <table class="data-table" id="mass-overview">
            <thead><tr><th>Day</th><th>Times</th><th>Language</th></tr></thead>
            <tbody></tbody>
          </table>
        </div>

        <!-- Content Health -->
        <div class="panel">
          <div class="panel-header"><div class="panel-title"><i class="fas fa-chart-bar"></i> Content Health</div></div>
          <div class="panel-body" style="display:flex;flex-direction:column;gap:16px;" id="content-health"></div>
        </div>
      </div>

    </div><!-- /page-content -->
  </div>
</div>

<div id="toast-container"></div>
<script src="{{ asset('admin/js/admin.js') }}"></script>
<script>
window.addEventListener('DOMContentLoaded', () => {
  /* Greeting */
  const h = new Date().getHours();
  const greet = h < 12 ? 'Good morning' : h < 17 ? 'Good afternoon' : 'Good evening';
  const user = JSON.parse(sessionStorage.getItem('cathedral_admin') || '{}');
  document.getElementById('greeting').textContent = `${greet}, ${user.name || 'Admin'} — here's what's happening`;

  const posts   = CathedralDB.get('posts');
  const events  = CathedralDB.get('events');
  const gallery = CathedralDB.get('gallery');
  const masses  = CathedralDB.get('masses');

  /* Stats */
  const stats = [
    { label:'Blog Posts',    value: posts.length,                           sub: `${posts.filter(p=>p.published).length} published`,  icon:'fa-newspaper',    color:'var(--gold)',   bg:'rgba(201,168,76,0.1)' },
    { label:'Events',        value: events.length,                          sub: `${CathedralDB.getUpcomingEvents().length} upcoming`, icon:'fa-calendar-days',color:'var(--blue)',   bg:'rgba(59,130,246,0.1)' },
    { label:'Gallery Items', value: gallery.length,                         sub: 'across all categories',                              icon:'fa-images',       color:'var(--purple)', bg:'rgba(168,85,247,0.1)' },
    { label:'Mass Times',    value: masses.reduce((a,m)=>a+(m.times.split('·').length),0), sub: `${masses.length} days covered`,      icon:'fa-church',       color:'var(--green)',  bg:'rgba(34,197,94,0.1)'  },
    { label:'Total Views',   value: posts.reduce((a,p)=>a+(p.views||0),0), sub: 'across all blog posts',                              icon:'fa-eye',          color:'var(--amber)',  bg:'rgba(245,158,11,0.1)' },
    { label:'Draft Posts',   value: posts.filter(p=>!p.published).length,  sub: 'awaiting publication',                               icon:'fa-file-pen',     color:'var(--red)',    bg:'rgba(239,68,68,0.1)'  },
  ];
  const sg = document.getElementById('stats-grid');
  stats.forEach(s => {
    sg.innerHTML += `<div class="stat-card">
      <div class="stat-card-accent" style="background:${s.color};"></div>
      <div class="stat-card-icon" style="background:${s.bg};color:${s.color};"><i class="fas ${s.icon}"></i></div>
      <div class="stat-card-value" style="color:${s.color};">${s.value.toLocaleString()}</div>
      <div class="stat-card-label">${s.label}</div>
      <div class="stat-card-change" style="color:var(--text-dim);">${s.sub}</div>
    </div>`;
  });

  /* Recent posts */
  const tbody = document.querySelector('#recent-posts-table tbody');
  posts.slice(0,5).forEach(p => {
    tbody.innerHTML += `<tr>
      <td><a href="post-editor.html?id=${p.id}" style="color:var(--text);text-decoration:none;font-weight:500;">${p.title.length > 42 ? p.title.slice(0,42)+'…' : p.title}</a></td>
      <td><span class="badge badge-blue">${p.category}</span></td>
      <td style="color:var(--text-muted);">${fmtDate(p.date)}</td>
      <td><span class="badge ${p.published ? 'badge-green' : 'badge-gray'}">${p.published ? 'Published' : 'Draft'}</span></td>
    </tr>`;
  });

  /* Upcoming events */
  const ue = document.getElementById('upcoming-events');
  const upcoming = CathedralDB.getUpcomingEvents(5);
  if (!upcoming.length) { ue.innerHTML = '<div class="empty-state"><i class="fas fa-calendar"></i><h3>No upcoming events</h3></div>'; }
  upcoming.forEach(ev => {
    ue.innerHTML += `<div style="display:flex;align-items:center;gap:12px;padding:10px 18px;border-bottom:1px solid rgba(255,255,255,0.04);">
      <div style="text-align:center;min-width:42px;">
        <div style="font-size:18px;font-weight:800;color:var(--gold);line-height:1;">${new Date(ev.date).getDate()}</div>
        <div style="font-size:10px;color:var(--text-muted);">${new Date(ev.date).toLocaleString('default',{month:'short'}).toUpperCase()}</div>
      </div>
      <div style="flex:1;min-width:0;">
        <div style="font-weight:600;font-size:13px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">${ev.title}</div>
        <div style="font-size:11px;color:var(--text-muted);">${ev.time} · ${ev.location}</div>
      </div>
      <span class="badge badge-${ev.published ? 'green' : 'gray'}">${ev.published ? 'Live' : 'Draft'}</span>
    </div>`;
  });

  /* Activity */
  const af = document.getElementById('activity-feed');
  CathedralDB.get('activityLog').slice(0,6).forEach(a => {
    af.innerHTML += `<div class="activity-item">
      <div class="activity-icon"><i class="fas fa-circle-dot"></i></div>
      <div><div class="activity-text"><span class="activity-user">${a.user}</span> <span class="activity-action">${a.action}</span></div>
      <div class="activity-time">${a.time}</div></div>
    </div>`;
  });

  /* Mass overview */
  const mb = document.querySelector('#mass-overview tbody');
  masses.forEach(m => {
    mb.innerHTML += `<tr><td style="font-weight:600;">${m.day}</td><td style="color:var(--gold-light);">${m.times}</td><td style="color:var(--text-muted);">${m.language}</td></tr>`;
  });

  /* Content health bars */
  const ch = document.getElementById('content-health');
  const healthItems = [
    { label:'Published Posts', val: posts.filter(p=>p.published).length, total: posts.length, color:'var(--green)' },
    { label:'Published Events', val: events.filter(e=>e.published).length, total: events.length, color:'var(--blue)' },
    { label:'Active Announcements', val: CathedralDB.get('announcements').filter(a=>a.active).length, total: CathedralDB.get('announcements').length, color:'var(--gold)' },
    { label:'Gallery Items', val: gallery.length, total: 20, color:'var(--purple)' },
  ];
  healthItems.forEach(item => {
    const pct = Math.round((item.val / Math.max(item.total, 1)) * 100);
    ch.innerHTML += `<div>
      <div style="display:flex;justify-content:space-between;font-size:12px;margin-bottom:5px;">
        <span style="color:var(--text-muted);">${item.label}</span>
        <span style="color:${item.color};font-weight:600;">${item.val} / ${item.total}</span>
      </div>
      <div class="progress-bar"><div class="progress-fill" style="width:${pct}%;background:${item.color};"></div></div>
    </div>`;
  });
});
</script>
</body>
</html>
