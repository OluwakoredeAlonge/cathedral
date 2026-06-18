/**
 * Cathedral CMS — shared data layer (localStorage)
 * All public pages and admin pages read/write through this module.
 */
const CathedralDB = (() => {

  /* ── Default seed data ── */
  const DEFAULTS = {
    settings: {
      siteName:        "St. Patrick's Catholic Cathedral",
      tagline:         "A House of God, a Gate of Heaven",
      diocese:         "Diocese of Ekiti",
      province:        "Ecclesiastical Province of Ibadan",
      founded:         "1929",
      address:         "Pope John Paul II Pastoral Centre, Ikere Road, Ado-Ekiti, Ekiti State, Nigeria",
      poBox:           "P.O. Box 136",
      phone:           "(0812) 567-4455",
      email:           "info@catholicdioceseofekiti.org",
      website:         "www.catholicdioceseofekiti.org",
      facebook:        "#",
      youtube:         "#",
      instagram:       "#",
      whatsapp:        "#",
      twitter:         "#",
      bishopName:      "Most Rev. Felix Femi Ajakaye",
      bishopTitle:     "DD · Bishop of Ekiti",
      bishopSince:     "April 17, 2010",
      bishopMessage:   "With great joy I welcome you to the online home of our beloved Cathedral. St. Patrick's is more than a building — it is a people, a family called together in Christ's name. I invite you to come, worship, serve and grow with us as we journey together towards eternity.",
      bishopImage:     "https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=600&q=80",
      heroImage:       "https://images.unsplash.com/photo-1548625149-720754952f87?w=1920&q=80",
      heroTitle:       "ST. PATRICK'S",
      heroSubtitle:    "CATHOLIC CATHEDRAL",
      heroTagline:     '"A House of God, a Gate of Heaven" — serving the faithful of Ado-Ekiti since 1929',
      welcomeTitle:    "A Community of Faith, Hope & Love",
      welcomeText:     "St. Patrick's Catholic Cathedral stands as the mother church of the Diocese of Ekiti — a spiritual home where generations of faithful have encountered the living God. Whether you are visiting for the first time or returning after many years, you are welcome here.",
      statFounded:     "1929",
      statYears:       "95+",
      statMasses:      "6",
      statParishioners:"5,000+",
    },

    announcements: [
      { id: 1, text: "HOLY MASS: Weekdays 6:30am & 7:00am", active: true },
      { id: 2, text: "Saturdays 7:00am & 6:00pm", active: true },
      { id: 3, text: "Sundays 7:00am, 9:00am & 11:00am", active: true },
      { id: 4, text: "Catechism Classes every Saturday 3:00pm", active: true },
      { id: 5, text: "Upcoming: Feast of St. Patrick — March 17, 2027", active: true },
    ],

    masses: [
      { id: 1, day: "Monday",    times: "6:30 AM & 7:00 AM", language: "English", note: "" },
      { id: 2, day: "Tuesday",   times: "6:30 AM & 7:00 AM", language: "English", note: "" },
      { id: 3, day: "Wednesday", times: "6:30 AM & 7:00 AM", language: "English", note: "" },
      { id: 4, day: "Thursday",  times: "6:30 AM & 7:00 AM", language: "English", note: "" },
      { id: 5, day: "Friday",    times: "6:30 AM & 7:00 AM", language: "English", note: "Stations of the Cross during Lent" },
      { id: 6, day: "Saturday",  times: "7:00 AM & 6:00 PM", language: "English",  note: "6:00 PM is Vigil Mass" },
      { id: 7, day: "Sunday",    times: "7:00 AM · 9:00 AM · 11:00 AM", language: "English / Yoruba", note: "" },
    ],

    devotions: [
      { id: 1, title: "Eucharistic Adoration", schedule: "Fridays · 4:00 PM – 6:00 PM", description: "Silent adoration before the Blessed Sacrament.", active: true },
      { id: 2, title: "Holy Rosary", schedule: "Daily · 6:00 AM (before Mass)", description: "The Rosary is prayed communally in the Cathedral each morning.", active: true },
      { id: 3, title: "Stations of the Cross", schedule: "Lent · Fridays 5:30 PM", description: "Walking the Via Crucis during Lenten season.", active: true },
      { id: 4, title: "Novena to Our Lady", schedule: "Wednesdays · 5:00 PM", description: "Nine-day cycle of prayer in honour of the Blessed Virgin Mary.", active: true },
      { id: 5, title: "Charismatic Prayer", schedule: "Wednesdays · 5:30 PM", description: "Spirit-filled prayer meetings with praise, worship and healing prayers.", active: true },
      { id: 6, title: "Bible Study", schedule: "Tuesdays · 5:00 PM", description: "Lectio Divina and structured study of the Sacred Scriptures.", active: true },
    ],

    events: [
      { id: 1, title: "Corpus Christi Procession", date: "2026-06-22", time: "10:00 AM", location: "Cathedral & Streets of Ado-Ekiti", category: "liturgy", tag: "UPCOMING", tagColor: "gold", image: "https://images.unsplash.com/photo-1596496181848-3091d4878b24?w=600&q=80", description: "The solemn outdoor procession of the Blessed Sacrament through the main streets of Ado-Ekiti. Mass at 9:00 AM, procession at 10:30 AM.", featured: true, published: true },
      { id: 2, title: "Diocesan Youth Rally", date: "2026-07-05", time: "8:00 AM – 6:00 PM", location: "Cathedral Grounds", category: "youth", tag: "MONTHLY", tagColor: "green", image: "https://images.unsplash.com/photo-1543207093-7bf3a6bfcfd2?w=600&q=80", description: "Young Catholics from across the Diocese gather for prayer, praise, talks and fellowship. Theme: "Arise and Shine!"", featured: false, published: true },
      { id: 3, title: "Annual Spiritual Retreat", date: "2026-08-10", time: "Aug 10–12", location: "Pastoral Centre", category: "retreat", tag: "RETREAT", tagColor: "blue", image: "https://images.unsplash.com/photo-1508672019048-805c876b67e2?w=600&q=80", description: "Three days of silence, reflection and renewal guided by a visiting retreat master. Open to all parishioners 18+.", featured: false, published: true },
      { id: 4, title: "Feast of the Assumption", date: "2026-08-15", time: "9:00 AM & 11:00 AM", location: "Cathedral", category: "feast", tag: "FEAST DAY", tagColor: "purple", image: "https://images.unsplash.com/photo-1530103862676-de8c9debad1d?w=600&q=80", description: "Solemnity of the Assumption of the Blessed Virgin Mary — Holy Day of Obligation. Special solemn Mass by the Bishop.", featured: false, published: true },
      { id: 5, title: "Cathedral Choir Concert", date: "2026-09-27", time: "5:00 PM", location: "Cathedral Hall", category: "music", tag: "MUSIC", tagColor: "orange", image: "https://images.unsplash.com/photo-1519677100203-a0e668c92439?w=600&q=80", description: "An evening of sacred music featuring the Cathedral Choir, guest choirs, and special soloists.", featured: false, published: true },
      { id: 6, title: "Harvest Thanksgiving", date: "2026-10-18", time: "9:00 AM", location: "Cathedral Grounds", category: "annual", tag: "ANNUAL", tagColor: "amber", image: "https://images.unsplash.com/photo-1483985988355-763728e1935b?w=600&q=80", description: "The grand annual Harvest Thanksgiving Mass and Bazaar — celebrating God's provision.", featured: false, published: true },
    ],

    gallery: [
      { id: 1,  title: "Cathedral Interior",       image: "https://images.unsplash.com/photo-1548625149-720754952f87?w=800&q=80",  category: "architecture", span: "2x2" },
      { id: 2,  title: "Holy Mass",                image: "https://images.unsplash.com/photo-1530103862676-de8c9debad1d?w=400&q=80", category: "liturgy",      span: "1x1" },
      { id: 3,  title: "Baptism",                  image: "https://images.unsplash.com/photo-1507692049790-de58290a4334?w=400&q=80", category: "community",    span: "1x1" },
      { id: 4,  title: "Youth Ministry",           image: "https://images.unsplash.com/photo-1543207093-7bf3a6bfcfd2?w=400&q=80",  category: "youth",        span: "1x1" },
      { id: 5,  title: "Cathedral Choir",          image: "https://images.unsplash.com/photo-1519677100203-a0e668c92439?w=400&q=80", category: "liturgy",      span: "1x1" },
      { id: 6,  title: "Corpus Christi Procession",image: "https://images.unsplash.com/photo-1596496181848-3091d4878b24?w=800&q=80", category: "community",   span: "2x1" },
      { id: 7,  title: "Cathedral Exterior",       image: "https://images.unsplash.com/photo-1583429780296-e8b9d8df0b19?w=500&q=80", category: "architecture", span: "1x1" },
      { id: 8,  title: "Eucharistic Adoration",    image: "https://images.unsplash.com/photo-1508672019048-805c876b67e2?w=500&q=80", category: "liturgy",      span: "1x1" },
      { id: 9,  title: "Youth Fellowship",         image: "https://images.unsplash.com/photo-1529156069898-49953e39b3ac?w=500&q=80", category: "youth",        span: "1x1" },
      { id: 10, title: "Parish Gathering",         image: "https://images.unsplash.com/photo-1567529684892-09290a1b2d05?w=500&q=80", category: "community",    span: "1x1" },
      { id: 11, title: "Cathedral Windows",        image: "https://images.unsplash.com/photo-1568667256549-094345857637?w=500&q=80", category: "architecture", span: "1x1" },
      { id: 12, title: "Candlelight Vigil",        image: "https://images.unsplash.com/photo-1493612276216-ee3925520721?w=500&q=80", category: "liturgy",      span: "1x1" },
    ],

    posts: [
      {
        id: 1,
        title: "The History of St. Patrick's Cathedral: A Century of Faith",
        slug: "history-of-st-patricks-cathedral",
        excerpt: "From the early missionary work of the Irish SMA Fathers in 1929 to the vibrant Diocese it anchors today, St. Patrick's has been a beacon of faith in the Ekiti heartland.",
        content: `<p>The history of St. Patrick's Catholic Cathedral is intertwined with the very beginning of Catholicism in the Ekiti heartland. Evangelisation in this region began under the aegis of Bishop O'Rourke of the Society of African Missions (SMA), who succeeded Bishop Terrien in 1929 when the area was part of the ancient Bight of Benin mission.</p><p>The church building — originally known as <strong>St. George's Church</strong> — was established by the Irish SMA fathers who brought the Catholic faith to the people of Ado-Ekiti. When the Irish missionaries arrived and planted deep roots, it was renamed <strong>St. Patrick's</strong>, in honour of the patron saint of Ireland.</p><p>On July 30, 1972, the Diocese of Ado-Ekiti was created from the Diocese of Ondo. Just months later, on December 11, 1972, it was officially renamed the Diocese of Ekiti. St. Patrick's was elevated as its Cathedral Church — a role it has held with dignity ever since.</p>`,
        image: "https://images.unsplash.com/photo-1548625149-720754952f87?w=800&q=80",
        category: "History",
        author: "Parish Secretary",
        date: "2026-05-10",
        tags: ["history", "diocese", "faith"],
        featured: true,
        published: true,
        views: 342
      },
      {
        id: 2,
        title: "Preparing for the Feast of Corpus Christi 2026",
        slug: "corpus-christi-2026",
        excerpt: "This year's Corpus Christi Procession promises to be the grandest in recent memory. Here is everything you need to know to participate fully in this magnificent celebration of the Eucharist.",
        content: `<p>The Feast of Corpus Christi — the Most Holy Body and Blood of Christ — is one of the most significant celebrations in the liturgical calendar of the Catholic Church. At St. Patrick's Cathedral, Ado-Ekiti, this feast has always been marked with great solemnity and joyful public witness.</p><p>This year's procession will begin after the 9:00 AM Mass on June 22, 2026. The faithful are invited to dress in white or their best traditional attire as we carry the Lord through the streets of Ado-Ekiti.</p><h3>How to Participate</h3><ul><li>Attend the 9:00 AM Mass before the procession</li><li>Join the procession at 10:30 AM from the Cathedral entrance</li><li>Bring flowers and palm fronds as an act of reverence</li></ul>`,
        image: "https://images.unsplash.com/photo-1596496181848-3091d4878b24?w=800&q=80",
        category: "Events",
        author: "Communications Office",
        date: "2026-06-01",
        tags: ["corpus christi", "eucharist", "procession"],
        featured: true,
        published: true,
        views: 218
      },
      {
        id: 3,
        title: "Introducing Our New Catechism Programme for 2026",
        slug: "catechism-programme-2026",
        excerpt: "The Parish Catechetical Team is pleased to announce an updated and expanded faith formation programme for children, youth and adults beginning this September.",
        content: `<p>Faith formation is at the heart of parish life at St. Patrick's Cathedral. Beginning September 2026, we are launching an updated Catechism Programme designed to deepen the faith of every parishioner at every stage of life.</p><p>The programme will run across three streams: Children (ages 7–12), Youth (ages 13–17), and Adults (RCIA and continuing formation). Each stream meets on Saturdays and includes Scripture, Tradition, the Sacraments, and Catholic Social Teaching.</p>`,
        image: "https://images.unsplash.com/photo-1543207093-7bf3a6bfcfd2?w=800&q=80",
        category: "Formation",
        author: "Catechetical Director",
        date: "2026-05-28",
        tags: ["catechism", "faith formation", "RCIA"],
        featured: false,
        published: true,
        views: 95
      },
      {
        id: 4,
        title: "Message from the Bishop: On the Year of the Eucharist",
        slug: "bishop-message-year-of-eucharist",
        excerpt: "His Lordship Most Rev. Felix Femi Ajakaye shares a pastoral reflection on the centrality of the Eucharist in the life of every Catholic faithful.",
        content: `<p>Dear beloved People of God in the Diocese of Ekiti,</p><p>Grace and peace to you from God our Father and our Lord Jesus Christ. As we journey through this sacred year, I invite each one of you to rediscover the inexhaustible gift of the Most Holy Eucharist — the source and summit of our Christian life.</p><p>The Eucharist is not merely a ritual or a tradition. It is the living presence of Our Lord Jesus Christ — Body, Blood, Soul, and Divinity — given to us out of boundless love. To receive the Eucharist worthily is to be united with Christ Himself.</p><p>I call upon every family in our Diocese to make Sunday Mass a non-negotiable priority. Let us approach the altar with faith, reverence and gratitude.</p><p>May Our Lady, Queen of the Eucharist, intercede for us.</p><p><em>† Felix Femi Ajakaye<br/>Bishop of Ekiti</em></p>`,
        image: "https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=800&q=80",
        category: "Pastoral",
        author: "Bishop's Office",
        date: "2026-04-15",
        tags: ["bishop", "eucharist", "pastoral letter"],
        featured: false,
        published: true,
        views: 412
      },
      {
        id: 5,
        title: "Youth Ministry Recap: Diocesan Conference 2026",
        slug: "youth-ministry-recap-2026",
        excerpt: "Over 500 young Catholics from across Ekiti Diocese gathered for three days of prayer, formation and friendship at this year's Diocesan Youth Conference.",
        content: `<p>The Diocesan Youth Conference 2026 was a resounding success. Held at the Pope John Paul II Pastoral Centre in Ado-Ekiti, the event brought together over 500 young Catholics from all parishes across the Diocese of Ekiti.</p><p>Under the theme "Arise and Shine" (Isaiah 60:1), young people engaged in Eucharistic adoration, inspiring talks from youth ministers and clergy, group discussions, and a vibrant closing concert of praise and worship.</p>`,
        image: "https://images.unsplash.com/photo-1529156069898-49953e39b3ac?w=800&q=80",
        category: "Youth",
        author: "Youth Ministry Coordinator",
        date: "2026-03-20",
        tags: ["youth", "conference", "young adults"],
        featured: false,
        published: true,
        views: 173
      },
    ],

    adminUsers: [
      { id: 1, name: "Parish Administrator", email: "admin@catholicdioceseofekiti.org", role: "Super Admin", lastLogin: "2026-06-18", active: true },
      { id: 2, name: "Communications Officer", email: "comms@catholicdioceseofekiti.org", role: "Editor", lastLogin: "2026-06-15", active: true },
      { id: 3, name: "Parish Secretary", email: "secretary@catholicdioceseofekiti.org", role: "Content Manager", lastLogin: "2026-06-10", active: true },
    ],

    activityLog: [
      { id: 1, user: "Admin", action: "Updated mass schedule", time: "2026-06-18 09:12 AM" },
      { id: 2, user: "Comms Officer", action: "Published blog post: Corpus Christi 2026", time: "2026-06-01 02:45 PM" },
      { id: 3, user: "Admin", action: "Added gallery item: Youth Ministry", time: "2026-05-30 11:00 AM" },
      { id: 4, user: "Comms Officer", action: "Updated site announcement", time: "2026-05-28 04:20 PM" },
      { id: 5, user: "Parish Secretary", action: "Published blog post: Catechism 2026", time: "2026-05-28 10:05 AM" },
    ],
  };

  /* ── init: seed defaults if first load ── */
  function init() {
    Object.keys(DEFAULTS).forEach(key => {
      if (!localStorage.getItem('cathedral_' + key)) {
        localStorage.setItem('cathedral_' + key, JSON.stringify(DEFAULTS[key]));
      }
    });
  }

  function get(key)      { return JSON.parse(localStorage.getItem('cathedral_' + key) || 'null') || DEFAULTS[key]; }
  function set(key, val) { localStorage.setItem('cathedral_' + key, JSON.stringify(val)); }
  function reset(key)    { localStorage.setItem('cathedral_' + key, JSON.stringify(DEFAULTS[key])); }

  /* ── Post helpers ── */
  function getPublishedPosts()  { return get('posts').filter(p => p.published).sort((a,b) => new Date(b.date) - new Date(a.date)); }
  function getPostBySlug(slug)  { return get('posts').find(p => p.slug === slug); }
  function getPostById(id)      { return get('posts').find(p => p.id === parseInt(id)); }

  /* ── Event helpers ── */
  function getUpcomingEvents(n) {
    const now = new Date();
    return get('events')
      .filter(e => e.published && new Date(e.date) >= now)
      .sort((a,b) => new Date(a.date) - new Date(b.date))
      .slice(0, n || 99);
  }

  /* ── Announcement builder ── */
  function buildTickerText() {
    return get('announcements').filter(a => a.active).map(a => '✦ ' + a.text).join('  |  ');
  }

  /* ── Next ID ── */
  function nextId(key) {
    const items = get(key);
    return items.length ? Math.max(...items.map(i => i.id)) + 1 : 1;
  }

  /* ── Log activity ── */
  function log(user, action) {
    const log = get('activityLog');
    const now = new Date();
    const pad = n => String(n).padStart(2,'0');
    const time = `${now.getFullYear()}-${pad(now.getMonth()+1)}-${pad(now.getDate())} ${pad(now.getHours())}:${pad(now.getMinutes())}`;
    log.unshift({ id: nextId('activityLog'), user, action, time });
    set('activityLog', log.slice(0, 50));
  }

  init();

  return { get, set, reset, getPublishedPosts, getPostBySlug, getPostById,
           getUpcomingEvents, buildTickerText, nextId, log, DEFAULTS };
})();
