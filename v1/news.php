<?php
/** news.php — แสดงรายการข่าว และรายละเอียดข่าว (news.php?id=2) */
$pageTitle = 'News & Activities | BTT United'; $activePage = 'news';
$news = require 'includes/news-data.php';

// หาข่าวที่เลือก (ถ้ามี ?id=)
$article = null;
if (isset($_GET['id'])) {
  foreach ($news as $n) { if ($n['id'] === (int)$_GET['id']) { $article = $n; break; } }
  if ($article) $pageTitle = $article['title'] . ' | BTT United';
  else http_response_code(404);
}
include 'header.php';
$bannerTitle = 'News & Activities';
include 'includes/page-banner.php';
?>
<main>
<section class="section">
  <div class="container">
<?php if (isset($_GET['id'])): ?>
  <?php if ($article): ?>
    <article class="article mx-auto" style="max-width:780px">
      <p class="text-muted mb-1"><?= date('d M Y', strtotime($article['date'])) ?></p>
      <h2><?= htmlspecialchars($article['title']) ?></h2>
      <div class="title-bar mx-0"></div>
      <?php foreach ($article['body'] as $para): ?><p><?= htmlspecialchars($para) ?></p><?php endforeach; ?>
      <a href="news.php" class="btn btn-red mt-3">Back to all news</a>
    </article>
  <?php else: ?>
    <div class="text-center"><h2>News not found</h2><p>This article does not exist or was removed.</p><a href="news.php" class="btn btn-red">View all news</a></div>
  <?php endif; ?>
<?php else: ?>
    <div class="row g-4">
      <?php foreach ($news as $n): ?>
      <div class="col-md-6 col-lg-4">
        <article class="news-card">
          <div class="thumb"><i class="bi <?= $n['icon'] ?>"></i></div>
          <div class="body">
            <span class="date"><?= date('d M Y', strtotime($n['date'])) ?></span>
            <h3><a href="news.php?id=<?= $n['id'] ?>"><?= htmlspecialchars($n['title']) ?></a></h3>
            <p><?= htmlspecialchars($n['summary']) ?></p>
            <a class="more" href="news.php?id=<?= $n['id'] ?>">Read more</a>
          </div>
        </article>
      </div>
      <?php endforeach; ?>
    </div>
<?php endif; ?>
  </div>
</section>
</main>
<?php include 'footer.php'; ?>
