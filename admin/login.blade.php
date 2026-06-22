<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Login — St. Patrick's Cathedral CMS</title>
  <link rel="stylesheet" href="{{ asset('admin/css/admin.css') }}" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <script src="{{ asset('js/data.js') }}"></script>
</head>
<body>
<div class="login-page">
  <div class="login-card">

    <!-- Logo -->
    <div style="text-align:center;margin-bottom:28px;">
      <div style="width:52px;height:52px;border-radius:50%;border:1px solid var(--gold-dark);display:flex;align-items:center;justify-content:center;margin:0 auto 12px;color:var(--gold);font-size:22px;">✝</div>
      <div style="font-family:'Cinzel',serif;font-size:13px;font-weight:700;color:var(--text);letter-spacing:0.1em;">CATHEDRAL CMS</div>
      <div style="font-size:11px;color:var(--text-muted);margin-top:3px;">St. Patrick's Catholic Cathedral · Ado-Ekiti</div>
    </div>

    <h2 style="font-size:20px;font-weight:700;margin-bottom:4px;">Welcome back</h2>
    <p style="font-size:12px;color:var(--text-muted);margin-bottom:24px;">Sign in to manage your cathedral website</p>

    <form id="login-form">
      <div class="form-group">
        <label class="form-label">Email Address</label>
        <div style="position:relative;">
          <i class="fas fa-envelope" style="position:absolute;left:11px;top:50%;transform:translateY(-50%);color:var(--text-dim);font-size:12px;"></i>
          <input type="email" id="email" class="form-control" placeholder="admin@catholicdioceseofekiti.org" style="padding-left:32px;" required />
        </div>
      </div>
      <div class="form-group">
        <label class="form-label">Password</label>
        <div style="position:relative;">
          <i class="fas fa-lock" style="position:absolute;left:11px;top:50%;transform:translateY(-50%);color:var(--text-dim);font-size:12px;"></i>
          <input type="password" id="password" class="form-control" placeholder="••••••••" style="padding-left:32px;" required />
          <button type="button" id="toggle-pw" style="position:absolute;right:11px;top:50%;transform:translateY(-50%);background:none;border:none;color:var(--text-dim);cursor:pointer;font-size:12px;">
            <i class="fas fa-eye"></i>
          </button>
        </div>
      </div>

      <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:20px;">
        <label style="display:flex;align-items:center;gap:7px;font-size:12px;color:var(--text-muted);cursor:pointer;">
          <input type="checkbox" style="accent-color:var(--gold);"> Remember me
        </label>
        <a href="#" style="font-size:12px;color:var(--gold);text-decoration:none;">Forgot password?</a>
      </div>

      <div id="login-error" style="display:none;background:rgba(239,68,68,0.1);border:1px solid rgba(239,68,68,0.3);border-radius:6px;padding:10px 12px;font-size:12px;color:var(--red);margin-bottom:14px;">
        <i class="fas fa-exclamation-circle"></i> Invalid email or password.
      </div>

      <button type="submit" class="btn btn-gold" style="width:100%;justify-content:center;padding:11px;">
        <i class="fas fa-right-to-bracket"></i> Sign In to Dashboard
      </button>
    </form>

    <div style="margin-top:24px;padding:12px;background:var(--surface2);border:1px solid var(--border);border-radius:7px;">
      <div style="font-size:10px;font-weight:600;letter-spacing:0.1em;color:var(--text-dim);text-transform:uppercase;margin-bottom:6px;">Demo Credentials</div>
      <div style="font-size:11px;color:var(--text-muted);line-height:1.8;">
        Email: <span style="color:var(--gold-light);">admin@catholicdioceseofekiti.org</span><br/>
        Password: <span style="color:var(--gold-light);">cathedral2026</span>
      </div>
    </div>

    <p style="font-size:11px;color:var(--text-dim);text-align:center;margin-top:20px;">
      &copy; 2026 St. Patrick's Catholic Cathedral · Diocese of Ekiti
    </p>
  </div>
</div>

<!-- <script>
  /* Show/hide password */
  document.getElementById('toggle-pw').addEventListener('click', function() {
    const pw = document.getElementById('password');
    const isText = pw.type === 'text';
    pw.type = isText ? 'password' : 'text';
    this.innerHTML = `<i class="fas fa-eye${isText ? '' : '-slash'}"></i>`;
  });

  /* Redirect if already logged in */
  if (sessionStorage.getItem('cathedral_admin')) window.location.href = 'index.html';

  document.getElementById('login-form').addEventListener('submit', function(e) {
    e.preventDefault();
    const email    = document.getElementById('email').value.trim();
    const password = document.getElementById('password').value;
    const users = CathedralDB.get('adminUsers');
    const match = users.find(u => u.email === email && u.active);
    const validPw = password === 'cathedral2026'; /* demo password */

    if (match && validPw) {
      sessionStorage.setItem('cathedral_admin', JSON.stringify({ name: match.name, role: match.role, email: match.email }));
      window.location.href = 'index.html';
    } else {
      document.getElementById('login-error').style.display = 'block';
    }
  });
</script> -->
</body>
</html>
