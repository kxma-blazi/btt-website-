<?php

/**
 * config.php — ตั้งค่าข้อมูลบริษัทที่เดียว (แก้แล้วมีผลทั้งเว็บ)
 */
$company = [
  'name'    => 'BTT United Company Limited',
  'phone'   => '02-586-8733',
  'email'   => 'info@bttunited.com',
  'address' => 'Bangkok, Thailand',              // <- ใส่ที่อยู่เต็มของบริษัท (ใช้ปักหมุดแผนที่ในหน้า Contact ด้วย)
  'hours'   => 'Mon - Fri, 08:30 - 17:30',
  'fb'      => 'https://www.facebook.com/',     // <- ใส่ลิงก์เพจจริง
  'line'    => 'https://line.me/',              // <- ใส่ลิงก์ LINE OA จริง
  'youtube' => '',                              // <- ใส่ YouTube video ID ของวิดีโอแนะนำบริษัท
  // ใบรับรองที่บริษัทมีจริง เช่น ['ISO 9001', 'ISO 14001'] — ถ้าว่างไว้ ส่วนนี้จะไม่แสดง
  'certifications' => ['ISO 9001', 'ISO 14001']
];
