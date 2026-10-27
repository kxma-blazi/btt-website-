<?php
$pageTitle = 'References | BTT United'; $activePage = 'references';

// ผลงาน (แก้ไขเป็นข้อมูลจริง) และรายชื่อลูกค้า
$projects = [
  ['title' => 'MV soft starter, pumping station', 'meta' => 'Water treatment', 'text' => 'Supply, installation and commissioning of a medium voltage soft starter.'],
  ['title' => 'MCC upgrade, food factory', 'meta' => 'Food & beverage', 'text' => 'Replaced aging starters with intelligent protection relays.'],
  ['title' => 'Power factor correction panel', 'meta' => 'Manufacturing', 'text' => 'Detuned capacitor bank with harmonic filtering to remove reactive power charges.'],
  ['title' => 'Motor protection retrofit', 'meta' => 'Petrochemical', 'text' => 'Over-temperature and insulation protection added to critical motors.'],
  ['title' => 'Power quality survey', 'meta' => 'Electronics', 'text' => 'Two-week monitoring campaign and engineering report.'],
  ['title' => 'Custom control panel', 'meta' => 'Cement', 'text' => 'Design and build of an LV control panel for a kiln fan line.'],
];
$customers = ['Water & wastewater', 'Food & beverage', 'Petrochemical', 'Cement & mining', 'Manufacturing', 'Buildings & HVAC', 'Power & utilities', 'Electronics'];

include 'header.php';
$bannerTitle = 'References';
include 'includes/page-banner.php';
?>
<main>
<section class="section" id="projects">
  <div class="container">
    <h2 class="section-title">Projects</h2><div class="title-bar"></div>
    <div class="row g-4">
      <?php foreach ($projects as $p): ?>
      <div class="col-md-6 col-lg-4">
        <article class="ref-card">
          <div class="thumb"><i class="bi bi-image"></i></div>
          <div class="body">
            <small><?= htmlspecialchars($p['meta']) ?></small>
            <h3><?= htmlspecialchars($p['title']) ?></h3>
            <p class="mb-0"><?= htmlspecialchars($p['text']) ?></p>
          </div>
        </article>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="section section-soft" id="customers">
  <div class="container">
    <h2 class="section-title">Industries We Serve</h2><div class="title-bar"></div>
    <div class="row g-3">
      <?php foreach ($customers as $c): ?>
        <div class="col-6 col-md-3"><div class="customer-chip"><?= htmlspecialchars($c) ?></div></div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
</main>
<?php include 'footer.php'; ?>
