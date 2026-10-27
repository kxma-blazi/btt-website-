<?php
/**
 * news-data.php — ข่าวและกิจกรรม (ข้อมูลตัวอย่าง)
 * เพิ่มข่าวใหม่โดยเพิ่ม array ใหม่ด้านล่าง (id ต้องไม่ซ้ำ) — เรียงใหม่สุดไว้บน
 */
return [
  ['id' => 3, 'date' => '2026-09-15', 'icon' => 'bi-people',
   'title' => 'Customer training: motor protection relay workshop',
   'summary' => 'A hands-on session for plant engineers covering relay setup, fault records and preventive maintenance functions.',
   'body' => ["BTT United hosted a one-day workshop for plant engineers and maintenance teams.",
              "Topics covered current and voltage based protection, over-temperature protection and how to read fault records from an intelligent protection relay.",
              "Attendees tested real relays on demonstration panels and left with a checklist for their own sites."]],
  ['id' => 2, 'date' => '2026-07-02', 'icon' => 'bi-gear-wide-connected',
   'title' => 'Medium voltage soft starter commissioned at water treatment plant',
   'summary' => 'Our team completed installation and commissioning of a medium voltage motor starter for a pumping station.',
   'body' => ["The BTT team delivered, installed and commissioned a medium voltage soft starter for a pump motor.",
              "The project included site survey, protection coordination, factory acceptance test and operator training."]],
  ['id' => 1, 'date' => '2026-04-20', 'icon' => 'bi-lightning-charge',
   'title' => 'Power quality survey helps factory cut reactive power charges',
   'summary' => 'Power quality monitoring identified low power factor and harmonics; a correction panel solved both.',
   'body' => ["After a two-week power quality monitoring campaign, we recommended a detuned power factor correction panel with harmonic filtering.",
              "The customer now operates close to unity power factor and no longer pays reactive power penalties."]],
];
