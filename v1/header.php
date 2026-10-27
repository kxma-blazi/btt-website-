<?php
/**
 * header.php — Top bar + navigation + <head>
 * ใช้งาน: ก่อน include ให้กำหนด $pageTitle และ $activePage ในแต่ละหน้า
 */
$pageTitle  = $pageTitle  ?? 'BTT United Company Limited';
$activePage = $activePage ?? 'home';

require_once __DIR__ . '/config.php';   // ข้อมูลบริษัททั้งหมดอยู่ใน config.php

// Helper: ใส่ class active ให้เมนูปัจจุบัน
function navActive($key, $current) { return $key === $current ? ' active' : ''; }
?>
<!DOCTYPE html>
<html lang="th">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= htmlspecialchars($pageTitle) ?></title>
  <meta name="description" content="BTT United — Leader in Motor Starter Solutions, Switchgear, Motor Protection, Power Factor Correction & Harmonic Filtering.">

  <!-- Bootstrap 5 + Bootstrap Icons + Google Font (ต้องมีอินเทอร์เน็ต) -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@500;600;700&family=Sarabun:wght@300;400;500;600&display=swap" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="style.css" rel="stylesheet">
</head>
<body>

<!-- ============ TOP CONTACT BAR ============ -->
<div class="topbar">
  <div class="container d-flex justify-content-end align-items-center gap-3">
    <a href="tel:<?= preg_replace('/\D/', '', $company['phone']) ?>" class="topbar-phone">
      <i class="bi bi-telephone-fill"></i> Tel. <?= $company['phone'] ?> (Head office)
    </a>
    <a href="<?= $company['fb'] ?>" target="_blank" rel="noopener" class="social social-fb" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
    <a href="<?= $company['line'] ?>" target="_blank" rel="noopener" class="social social-line" aria-label="LINE"><i class="bi bi-chat-dots-fill"></i></a>
  </div>
</div>

<!-- ============ NAVBAR ============ -->
<nav class="navbar navbar-expand-lg main-nav sticky-top">
  <div class="container">
    <a class="navbar-brand d-flex align-items-center gap-2" href="index.php">
      <img src="assets/img/logo.svg" alt="BTT United logo" width="44" height="44">
      <span class="brand-text">BTT UNITED<small>Company Limited</small></span>
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainMenu" aria-controls="mainMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="mainMenu">
      <ul class="navbar-nav align-items-lg-center">
        <li class="nav-item"><a class="nav-link<?= navActive('home', $activePage) ?>" href="index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link<?= navActive('about', $activePage) ?>" href="about.php">About Us</a></li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle<?= navActive('products', $activePage) ?>" href="products.php" role="button" data-bs-toggle="dropdown" aria-expanded="false">Products</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="products.php#motor-starter">Motor Starter Solutions</a></li>
            <li><a class="dropdown-item" href="products.php#motor-protection">Motor Protection Solutions</a></li>
            <li><a class="dropdown-item" href="products.php#power-quality">Power Quality &amp; Energy Solutions</a></li>
            <li><a class="dropdown-item" href="products.php#switchgear">Switchgear</a></li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle<?= navActive('references', $activePage) ?>" href="references.php" role="button" data-bs-toggle="dropdown" aria-expanded="false">References</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="references.php#projects">Projects</a></li>
            <li><a class="dropdown-item" href="references.php#customers">Industries</a></li>
          </ul>
        </li>

        <li class="nav-item"><a class="nav-link<?= navActive('news', $activePage) ?>" href="news.php">News &amp; Activities</a></li>
        <li class="nav-item"><a class="nav-link<?= navActive('contact', $activePage) ?>" href="contact.php">Contact</a></li>
      </ul>
    </div>
  </div>
</nav>
