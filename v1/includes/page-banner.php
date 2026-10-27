<?php /** ส่วนหัวของหน้าย่อย — ต้องกำหนด $bannerTitle ก่อน include */ ?>
<section class="page-banner">
  <div class="container">
    <div class="crumb mb-1"><a href="index.php">Home</a> / <?= htmlspecialchars($bannerTitle) ?></div>
    <h1><?= htmlspecialchars($bannerTitle) ?></h1>
  </div>
</section>
