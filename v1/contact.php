<?php
/**
 * contact.php — ข้อมูลติดต่อ + ฟอร์ม
 * ฟอร์มบันทึกข้อความลงไฟล์ data/messages.csv (mail() บน XAMPP ใช้ไม่ได้ถ้าไม่ตั้งค่า SMTP)
 * เปิดดูข้อความได้ที่ C:\xampp\htdocs\btt-united\data\messages.csv
 */
session_start();
require_once __DIR__ . '/config.php';
if (empty($_SESSION['csrf'])) $_SESSION['csrf'] = bin2hex(random_bytes(16));

$errors = []; $sent = false;
$old = ['name' => '', 'email' => '', 'phone' => '', 'subject' => trim($_GET['subject'] ?? ''), 'message' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  foreach ($old as $k => $_) $old[$k] = trim($_POST[$k] ?? '');

  if (!hash_equals($_SESSION['csrf'], $_POST['csrf'] ?? '')) $errors[] = 'Session expired. Please reload the page and try again.';
  if (!empty($_POST['website'])) $errors[] = 'Spam detected.';           // honeypot: ช่องที่คนจริงมองไม่เห็น
  if ($old['name'] === '') $errors[] = 'Please enter your name.';
  if (!filter_var($old['email'], FILTER_VALIDATE_EMAIL)) $errors[] = 'Please enter a valid email address.';
  if (mb_strlen($old['message']) < 10) $errors[] = 'Please write a message of at least 10 characters.';

  if (!$errors) {
    $row = [date('Y-m-d H:i:s'), $old['name'], $old['email'], $old['phone'], $old['subject'], str_replace(["\r", "\n"], ' ', $old['message'])];
    // กัน CSV injection (ค่าที่ขึ้นต้นด้วย = + - @)
    $row = array_map(fn($v) => preg_match('/^[=+\-@]/', $v) ? "'" . $v : $v, $row);
    $fp = @fopen(__DIR__ . '/data/messages.csv', 'a');
    if ($fp) { fputcsv($fp, $row); fclose($fp); $sent = true; $old = array_fill_keys(array_keys($old), ''); }
    else $errors[] = 'Could not save your message. Please call us instead.';
  }
}

$pageTitle = 'Contact | BTT United'; $activePage = 'contact';
include 'header.php';
$bannerTitle = 'Contact';
include 'includes/page-banner.php';
?>
<main>
<section class="section">
  <div class="container">
    <div class="row g-5">
      <div class="col-lg-5">
        <h2>Get in touch</h2><div class="title-bar mx-0"></div>
        <p>Tell us about your motor, voltage and application. Our engineers will reply with a recommended solution.</p>
        <ul class="list-unstyled contact-info">
          <li><i class="bi bi-geo-alt-fill"></i><span><?= htmlspecialchars($company['address']) ?></span></li>
          <li><i class="bi bi-telephone-fill"></i><a href="tel:<?= preg_replace('/\D/', '', $company['phone']) ?>"><?= $company['phone'] ?> (Head office)</a></li>
          <li><i class="bi bi-envelope-fill"></i><a href="mailto:<?= $company['email'] ?>"><?= $company['email'] ?></a></li>
          <li><i class="bi bi-clock-fill"></i><span><?= htmlspecialchars($company['hours']) ?></span></li>
        </ul>
      </div>

      <div class="col-lg-7">
        <?php if ($sent): ?>
          <div class="alert alert-success" role="status">Thank you. Your message was sent and we will contact you soon.</div>
        <?php endif; ?>
        <?php if ($errors): ?>
          <div class="alert alert-danger" role="alert"><ul class="mb-0"><?php foreach ($errors as $e): ?><li><?= htmlspecialchars($e) ?></li><?php endforeach; ?></ul></div>
        <?php endif; ?>

        <form method="post" action="contact.php" novalidate>
          <input type="hidden" name="csrf" value="<?= $_SESSION['csrf'] ?>">
          <div style="position:absolute;left:-9999px" aria-hidden="true"><input type="text" name="website" tabindex="-1" autocomplete="off"></div>
          <div class="row g-3">
            <div class="col-md-6"><label class="form-label" for="name">Name *</label><input class="form-control" id="name" name="name" value="<?= htmlspecialchars($old['name']) ?>" required></div>
            <div class="col-md-6"><label class="form-label" for="email">Email *</label><input class="form-control" type="email" id="email" name="email" value="<?= htmlspecialchars($old['email']) ?>" required></div>
            <div class="col-md-6"><label class="form-label" for="phone">Phone</label><input class="form-control" id="phone" name="phone" value="<?= htmlspecialchars($old['phone']) ?>"></div>
            <div class="col-md-6"><label class="form-label" for="subject">Subject</label><input class="form-control" id="subject" name="subject" value="<?= htmlspecialchars($old['subject']) ?>"></div>
            <div class="col-12"><label class="form-label" for="message">Message *</label><textarea class="form-control" id="message" name="message" rows="6" required><?= htmlspecialchars($old['message']) ?></textarea></div>
            <div class="col-12"><button class="btn btn-red" type="submit">Send message</button></div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
<section class="pb-5"><div class="container"><iframe class="map-frame" title="Map" loading="lazy" src="https://maps.google.com/maps?q=<?= urlencode($company['name'] . ' ' . $company['address']) ?>&amp;output=embed"></iframe></div></section>
</main>
<?php include 'footer.php'; ?>
