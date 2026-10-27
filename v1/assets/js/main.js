// main.js — พฤติกรรมฝั่งหน้าเว็บ
(function () {
  // ปุ่มกลับขึ้นด้านบน: แสดงเมื่อเลื่อนลง 300px
  const toTop = document.getElementById('toTop');
  if (toTop) {
    window.addEventListener('scroll', () => {
      toTop.classList.toggle('show', window.scrollY > 300);
    }, { passive: true });
    toTop.addEventListener('click', () => window.scrollTo({ top: 0, behavior: 'smooth' }));
  }

  // วิดีโอ: คลิกที่โปสเตอร์แล้วค่อยโหลด iframe
  const videoBox = document.getElementById('videoBox');
  if (videoBox) {
    videoBox.addEventListener('click', () => {
      const id = videoBox.dataset.youtube;
      if (!id) return;
      videoBox.innerHTML = '<iframe src="https://www.youtube.com/embed/' + encodeURIComponent(id) +
        '?autoplay=1&rel=0" title="BTT United introduction video" allow="autoplay; encrypted-media; picture-in-picture" allowfullscreen></iframe>';
    }, { once: true });
  }
})();
