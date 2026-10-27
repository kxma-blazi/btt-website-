<?php

/** footer.php — Footer + scripts (ต้องใช้คู่กับ header.php เพราะใช้ตัวแปร $company) */
?>
<!-- ============ FOOTER ============ -->
<footer class="site-footer">
  <div class="container">
    <div class="row g-4">
      <div class="col-lg-4">
        <h5>USED For Study BTT United Company Limited</h5>
        <p class="mb-0">Leader in Motor Starter Solutions — design, supply and service of motor starters, switchgear, motor protection, power factor correction and harmonic filtering.</p>
      </div>

      <div class="col-md-6 col-lg-4">
        <h5>Contact</h5>
        <ul class="list-unstyled footer-list mb-0">
          <li><i class="bi bi-geo-alt-fill"></i> <?= htmlspecialchars($company['address']) ?></li>
          <li><i class="bi bi-telephone-fill"></i> <a href="tel:<?= preg_replace('/\D/', '', $company['phone']) ?>"><?= $company['phone'] ?></a></li>
          <li><i class="bi bi-envelope-fill"></i> <a href="mailto:<?= $company['email'] ?>"><?= $company['email'] ?></a></li>
        </ul>
      </div>

      <div class="col-md-6 col-lg-4">
        <?php if (!empty($company['certifications'])): ?>
          <h5>Certifications</h5>
          <div class="d-flex flex-wrap gap-2">
            <?php foreach ($company['certifications'] as $c): ?>
              <span class="cert"><i class="bi bi-patch-check-fill"></i> <?= htmlspecialchars($c) ?></span>
            <?php endforeach; ?>
          </div>
        <?php else: ?>
          <h5>Follow us</h5>
        <?php endif; ?>
        <div class="d-flex gap-2 mt-3">
          <a href="<?= $company['fb'] ?>" target="_blank" rel="noopener" class="social social-fb" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
          <a href="<?= $company['line'] ?>" target="_blank" rel="noopener" class="social social-line" aria-label="LINE"><i class="bi bi-chat-dots-fill"></i></a>
        </div>
      </div>
    </div>

    <hr class="footer-rule">
    <p class="copyright mb-0">&copy; <?= date('Y') ?> BTT United Company Limited. All rights reserved.</p>
  </div>
</footer>

<!-- Back to top -->
<button id="toTop" class="to-top" aria-label="Back to top"><i class="bi bi-arrow-up"></i></button>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/main.js"></script>
</body>

</html>