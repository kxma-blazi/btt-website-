<?php
/**
 * index.php — หน้าแรก
 * ส่วนประกอบ: Hero → Intro → Services → Gallery → Partners → Video
 */
require_once __DIR__ . '/config.php';
$pageTitle  = 'BTT United | Leader in Motor Starter Solutions';
$activePage = 'home';

// ----- ตั้งค่าวิดีโอแนะนำบริษัท: ใส่ YouTube video ID (เช่น 'dQw4w9WgXcQ') ปล่อยว่างไว้ = แสดง placeholder -----
$youtubeId = $company['youtube'] ?? '';

// ----- ข้อมูล Hero (เพิ่ม/ลบสไลด์ได้ที่นี่) -----
$heroSlides = [
  ['class' => 'hero-1', 'title' => 'Leader in Motor Starter Solutions', 'sub' => 'Low & Medium Voltage, 200 – 15,000 VAC'],
  ['class' => 'hero-2', 'title' => 'Best Solutions, Best Technology Team', 'sub' => 'Design, supply, commissioning and service'],
  ['class' => 'hero-3', 'title' => 'Protect Every Motor. Save Every Watt.', 'sub' => 'Motor protection and energy-efficiency engineering'],
];

// ----- ข้อมูลบริการ 3 ด้าน -----
$services = [
  ['hex' => 'hex-1', 'icon' => 'bi-toggles', 'title' => 'Motor Starter Solutions',
   'volt' => 'Low Voltage – Medium Voltage', 'items' => ['200 VAC – 15,000 VAC']],
  ['hex' => 'hex-2', 'icon' => 'bi-shield-check', 'title' => 'Motor Protection Solutions',
   'volt' => 'Low Voltage – Medium Voltage',
   'items' => ['Current based protection', 'Voltage & current based protection', 'Over temperature protection',
               'Intelligent protection relay with preventive maintenance function', 'Insulation protection']],
  ['hex' => 'hex-3', 'icon' => 'bi-lightning-charge', 'title' => 'Power Quality & Energy Solutions',
   'volt' => 'Low Voltage – Medium Voltage',
   'items' => ['Power quality monitoring', 'Energy efficient solution', 'Problem solving & engineering service']],
];

// ----- พาร์ทเนอร์ (ไฟล์โลโก้อยู่ใน assets/img/ — ทับด้วยโลโก้จริงชื่อเดิมได้) -----
$partners = [
  ['name' => 'LS Electric',        'img' => 'assets/img/partner-ls.svg'],
  ['name' => 'Nidec',              'img' => 'assets/img/partner-nidec.svg'],
  ['name' => 'Schneider Electric', 'img' => 'assets/img/partner-schneider.svg'],
];

include 'header.php';
?>

<main>

<!-- ============ HERO SLIDER ============ -->
<section class="hero" aria-label="Featured">
  <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5500">
    <div class="carousel-indicators">
      <?php foreach ($heroSlides as $i => $s): ?>
        <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="<?= $i ?>" class="<?= $i === 0 ? 'active' : '' ?>" aria-label="Slide <?= $i + 1 ?>"></button>
      <?php endforeach; ?>
    </div>
    <div class="carousel-inner">
      <?php foreach ($heroSlides as $i => $s): ?>
        <div class="carousel-item<?= $i === 0 ? ' active' : '' ?>">
          <div class="hero-slide <?= $s['class'] ?>">
            <div>
              <h1 class="hero-title"><?= htmlspecialchars($s['title']) ?></h1>
              <p class="hero-sub"><?= htmlspecialchars($s['sub']) ?></p>
              <a href="products.php" class="btn btn-cta">View products</a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev"><span class="carousel-control-prev-icon"></span><span class="visually-hidden">Previous</span></button>
    <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next"><span class="carousel-control-next-icon"></span><span class="visually-hidden">Next</span></button>
  </div>
</section>

<!-- ============ COMPANY INTRODUCTION ============ -->
<section class="section" id="intro">
  <div class="container">
    <h2 class="section-title">BTT UNITED COMPANY LIMITED</h2>
    <div class="title-bar"></div>
    <p class="lead-text">
      We specialize in the design of motor starter solutions and switchgear, and in energy-efficient equipment:
      motor protection and control equipment, power supply quality, industrial electrical protection,
      power factor correction and harmonic filtering.
    </p>
    <div class="spec-row">
      <span class="spec-chip"><i class="bi bi-toggles"></i>Motor starters</span>
      <span class="spec-chip"><i class="bi bi-grid-3x3-gap"></i>Switchgear</span>
      <span class="spec-chip"><i class="bi bi-shield-check"></i>Motor protection</span>
      <span class="spec-chip"><i class="bi bi-activity"></i>Power factor correction</span>
      <span class="spec-chip"><i class="bi bi-soundwave"></i>Harmonic filtering</span>
    </div>
  </div>
</section>

<!-- ============ CORE SERVICES ============ -->
<section class="section pt-0" id="services">
  <div class="container">
    <div class="row g-5 align-items-start">
      <?php foreach ($services as $sv): ?>
        <div class="col-md-4">
          <article class="service">
            <div class="hex <?= $sv['hex'] ?>" role="img" aria-label="<?= htmlspecialchars($sv['title']) ?>"><i class="bi <?= $sv['icon'] ?>"></i></div>
            <h3><?= htmlspecialchars($sv['title']) ?></h3>
            <div class="voltage"><?= htmlspecialchars($sv['volt']) ?></div>
            <ul>
              <?php foreach ($sv['items'] as $it): ?><li><?= htmlspecialchars($it) ?></li><?php endforeach; ?>
            </ul>
          </article>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ============ PROJECT GALLERY ============ -->
<section class="gallery" aria-label="Project gallery">
  <div id="galleryCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="4500">
    <div class="carousel-indicators">
      <?php for ($i = 0; $i < 3; $i++): ?>
        <button type="button" data-bs-target="#galleryCarousel" data-bs-slide-to="<?= $i ?>" class="<?= $i === 0 ? 'active' : '' ?>" aria-label="Photo <?= $i + 1 ?>"></button>
      <?php endfor; ?>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active"><div class="gallery-slide gal-1"><span>Switchgear installation</span></div></div>
      <div class="carousel-item"><div class="gallery-slide gal-2"><span>Motor control center</span></div></div>
      <div class="carousel-item"><div class="gallery-slide gal-3"><span>Commissioning &amp; testing</span></div></div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#galleryCarousel" data-bs-slide="prev"><span class="carousel-control-prev-icon"></span><span class="visually-hidden">Previous</span></button>
    <button class="carousel-control-next" type="button" data-bs-target="#galleryCarousel" data-bs-slide="next"><span class="carousel-control-next-icon"></span><span class="visually-hidden">Next</span></button>
  </div>
</section>

<!-- ============ PARTNERS ============ -->
<section class="section" id="partners">
  <div class="container">
    <h2 class="section-title">PARTNERS</h2>
    <div class="title-bar"></div>
    <div class="row g-4 justify-content-center mt-2">
      <?php foreach ($partners as $p): ?>
        <div class="col-6 col-md-4 col-lg-3">
          <div class="partner"><img src="<?= $p['img'] ?>" alt="<?= htmlspecialchars($p['name']) ?>" loading="lazy"></div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ============ VIDEO ============ -->
<section class="section section-soft" id="video">
  <div class="container">
    <h2 class="section-title">COMPANY INTRODUCTION</h2>
    <div class="title-bar"></div>
    <div id="videoBox" class="video-box" data-youtube="<?= htmlspecialchars($youtubeId) ?>" role="button" tabindex="0" aria-label="Play company introduction video">
      <div class="play-btn"><i class="bi bi-play-fill"></i></div>
      <div class="video-caption"><?= $youtubeId ? 'Watch: Who we are' : 'Company introduction video coming soon' ?></div>
    </div>
  </div>
</section>

</main>

<?php include 'footer.php'; ?>
