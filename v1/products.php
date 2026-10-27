<?php
$pageTitle = 'Products | BTT United'; $activePage = 'products';

// ข้อมูลสินค้า/บริการ — แก้ไขหรือเพิ่มบล็อกได้ที่นี่
$products = [
  ['id' => 'motor-starter', 'icon' => 'bi-toggles', 'title' => 'Motor Starter Solutions',
   'desc' => 'Starting solutions for low and medium voltage motors, from 200 VAC up to 15,000 VAC.',
   'items' => ['Direct-on-line, star-delta and auto-transformer starters', 'Soft starters (low and medium voltage)', 'Variable speed drives', 'Motor control centers (MCC)'],
   'tags' => ['200 VAC – 15,000 VAC', 'LV', 'MV']],
  ['id' => 'motor-protection', 'icon' => 'bi-shield-check', 'title' => 'Motor Protection Solutions',
   'desc' => 'Protect motors against electrical and thermal faults before they cause downtime.',
   'items' => ['Current based protection', 'Voltage and current based protection', 'Over temperature protection', 'Intelligent protection relay with preventive maintenance function', 'Insulation protection'],
   'tags' => ['LV', 'MV', 'Relays']],
  ['id' => 'power-quality', 'icon' => 'bi-lightning-charge', 'title' => 'Power Quality & Energy Solutions',
   'desc' => 'Measure, improve and reduce the cost of your electrical energy.',
   'items' => ['Power quality monitoring', 'Energy efficient solution', 'Power factor correction and harmonic filtering', 'Problem solving and engineering service'],
   'tags' => ['Monitoring', 'PFC', 'Harmonics']],
  ['id' => 'switchgear', 'icon' => 'bi-grid-3x3-gap', 'title' => 'Switchgear',
   'desc' => 'Low and medium voltage switchgear designed and assembled to your project specification.',
   'items' => ['Main distribution boards', 'Motor control centers', 'Capacitor bank panels', 'Custom control panels'],
   'tags' => ['LV', 'MV', 'Custom']],
];

include 'header.php';
$bannerTitle = 'Products';
include 'includes/page-banner.php';
?>
<main>
<div class="container">
  <?php foreach ($products as $p): ?>
  <section class="prod-block" id="<?= $p['id'] ?>">
    <div class="row g-4">
      <div class="col-lg-4">
        <div class="prod-icon"><i class="bi <?= $p['icon'] ?>"></i></div>
        <h2><?= htmlspecialchars($p['title']) ?></h2>
        <p><?= htmlspecialchars($p['desc']) ?></p>
        <?php foreach ($p['tags'] as $t): ?><span class="tag"><?= htmlspecialchars($t) ?></span><?php endforeach; ?>
      </div>
      <div class="col-lg-8">
        <ul class="check-list">
          <?php foreach ($p['items'] as $it): ?><li><?= htmlspecialchars($it) ?></li><?php endforeach; ?>
        </ul>
        <a href="contact.php?subject=<?= urlencode($p['title']) ?>" class="btn btn-red mt-2">Request a quotation</a>
      </div>
    </div>
  </section>
  <?php endforeach; ?>
</div>
</main>
<?php include 'footer.php'; ?>
