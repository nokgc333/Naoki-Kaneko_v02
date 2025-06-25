(function() {
  const fontUrls = [
    'https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;700&display=swap',
  ];
  const addFont = function(fontUrl) {
    var link = document.createElement('link');
    link.href = fontUrl;
    link.rel = 'stylesheet';
    link.type = 'text/css';
    var head = document.getElementsByTagName('head')[0];
    head.appendChild(link);
  };
  setTimeout(function() {
    fontUrls.forEach(addFont);
  }, 5000);
})();

jQuery(function ($) {
  //スムーススクロール
  $('a[href^="#"]').click(function (e) {
    const headerHeight = $("header").outerHeight();
    const speed = 500;
    const id = $(this).attr("href");
    const target = $("#" == id ? "html" : id);
    const position = $(target).offset().top - headerHeight;
    $.when(
      $("html, body").animate({ scrollTop: position }, speed),
      setTimeout(function () {
        //モーダルを閉じる
        $("body, .c-hamburger, .c-nav").removeClass(
          "is-fixed is-show is-open is-active"
        );
      }, 1000),
      // return false;
      e.preventDefault()
    ).done(function () {
      const diff = target.offset().top - headerHeight;
      if (diff === position) {
      } else {
        $("html,body").animate({ scrollTop: diff }, 300);
      }
          history.pushState(null, null, id);
    });
  });

  //ページ遷移スムーススクロール
  $(document).ready(function () {
    //URLのハッシュ値を取得
    const urlHash = location.hash;
    //ハッシュ値があればページ内スクロール
    if (urlHash) {
      //スクロールを0に戻す
      $("body,html").stop().scrollTop(0);
      setTimeout(function () {
        //ロード時の処理を待ち、時間差でスクロール実行
        scrollToAnker(urlHash);
      }, 500);
    }

    function scrollToAnker(hash) {
      const headerHeight = $("header").outerHeight();
      const target = $(hash);
      const position = target.offset().top - headerHeight; // ヘッダーの高さ
      $("body,html").stop().animate({ scrollTop: position }, 500);
    }
  });

  $('.accordion-head').on("click",function() {
    $(this).toggleClass('is-active');
    $(this).next().slideToggle();
  });

  $("#menu-btn").on("click", function () {
    $("#menu-btn, #contents, #nav, body").toggleClass("is-active");
    $(".l-header").toggleClass("is-menu-open");
  });

  $(window).on("load scroll", function () {
    const headerLogo = document.querySelector('.l-header__logo');
    const headerInner = document.querySelector('.l-header__inner');
    if ($(window).scrollTop() < 200) {
      const headerLogoHeight = 52 * $(window).scrollTop() / 200;
      const headerInnerHeight = 88 * $(window).scrollTop() / 200;
      $(".l-header").removeClass("is-active");
      headerLogo.style.setProperty('--header-height', headerLogoHeight + 'px');
      headerInner.style.setProperty('--header-inner-height', headerInnerHeight + 'px');
    } else {
      $(".l-header").addClass("is-active");
      headerLogo.style.setProperty('--header-height', '52px');
      headerInner.style.setProperty('--header-inner-height','88px');
    }
  });

});

const fadeItems = document.querySelectorAll('.fade-item');
fadeItems.forEach((block, index) => {
  gsap.to(block, {
    duration: 0,
    scrollTrigger: {
      trigger: block,
      start: 'top 66%', 
      end: 'bottom 33%', 
      once: true,
      toggleClass: "is-active",
    },
  });
});

const scrollItems = document.querySelectorAll('.scroll-item');
scrollItems.forEach((block, index) => {
  gsap.to(block, {
    duration: 0,
    scrollTrigger: {
      trigger: block,
      start: 'top 66%', 
      end: 'bottom 33%', 
      once: true,
      toggleClass: "is-active",
    },
  });
});

document.addEventListener('DOMContentLoaded', function() {
  const popup = document.getElementById('popup');
  const closeBtn = document.getElementById('popup-close');
  const openBtn = document.getElementById('popup-open');

  if (popup) {
    const closePopUp = () => {
      popup.classList.remove('is-active');
    };

    // ポップアップを閉じる関数を呼び出し、初期状態では非表示にする
    closePopUp();

    // ブラウザの戻るボタンがクリックされたときのイベントリスナー
    // window.addEventListener("popstate", function(e) {
    //   const popupImagePc = document.querySelector('.c-popup__link source');
    //   const popupImageSp = document.querySelector('.c-popup__link img');
    //   const imageUrlSp = popupImageSp.getAttribute('data-src');
    //   const imageUrlPc = popupImagePc.getAttribute('data-srcset');
    //   popupImageSp.setAttribute('src', imageUrlSp);
    //   popupImagePc.setAttribute('srcset', imageUrlPc);
    //   popup.classList.add('is-active');
    // });

    if (closeBtn) {
      closeBtn.addEventListener('click', () => {
        closePopUp(); // ポップアップを閉じる
      });
    }
    if (openBtn) {
      openBtn.addEventListener('click', () => {
      const popupImagePc = document.querySelector('.c-popup__link source');
      const popupImageSp = document.querySelector('.c-popup__link img');
      const imageUrlSp = popupImageSp.getAttribute('data-src');
      const imageUrlPc = popupImagePc.getAttribute('data-srcset');
      popupImageSp.setAttribute('src', imageUrlSp);
      popupImagePc.setAttribute('srcset', imageUrlPc);
      popup.classList.add('is-active');
      });
    }
   // ブラウザの履歴に新しいエントリを追加
    // history.pushState(null, null, location.href);
  }
});


window.addEventListener(
  "DOMContentLoaded",
  () => {
    const breakPoint = 768;
    const options1 = {
      loop: true,
      slidesPerView: "auto",
      spaceBetween: 20,
      centeredSlides: true,
      allowTouchMove: false,
      speed: 6000,
      autoplay: {
        delay: 0,
      },
      breakpoints: {
        breakPoint: {
          spaceBetween: 27,
        },
      },
    };

    let eventSwiper = document.getElementById("top-slider");
    if (eventSwiper) {
      eventSwiper = new Swiper("#top-slider", options1);
    }
  },
  false
);