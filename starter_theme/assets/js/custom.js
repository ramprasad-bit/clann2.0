(function ($) {
// "use strict";


/* ----------------------------------------------
   Utility helpers
---------------------------------------------- */
function isFunc(fn) {
  return typeof fn === "function";
}

function safeFocus($el) {
  if ($el && $el.length) {
    try { $el.focus(); } catch (e) { /* silent */ }
  }
}

/* ----------------------------------------------
   Skip to main content
---------------------------------------------- */
$(".skip-to-main-content-link").on("focus", function () {
  $(this).addClass("focused");
});

$(".skip-to-main-content-link").on("focusout", function () {
  $(this).removeClass("focused");
});

$(".skip-to-main-content-link").on("click", function (e) {
  e.preventDefault();
  var $main = $("#main");
  if ($main.length) {
    $("html,body").animate({ scrollTop: $main.offset().top }, "slow");
    safeFocus($main);
  }
});

$("#wpadminbar .screen-reader-shortcut").attr("tabindex", "-1");

/* ----------------------------------------------
   Accessibility Desktop Menu (accordion-style)
---------------------------------------------- */
$(".sub-menu").slideUp(0);
$(".nav_arrowdown").attr("aria-expanded", "false");

let touchHandled = false;

$(".nav_arrowdown").on("touchend", function () {
  touchHandled = true;
  handleMenuToggle($(this));
});

$(".nav_arrowdown").on("click", function () {
  if (touchHandled) {
    touchHandled = false;
    return;
  }
  handleMenuToggle($(this));
});

function handleMenuToggle($arrow) {
  var $submenu = $arrow.next(".sub-menu");
  var $parentLi = $arrow.closest("li");
  var isSubmenuVisible = $submenu.is(":visible");

  // Close sibling submenus
  $parentLi.siblings().each(function () {
    $(this).find("> .sub-menu").slideUp().removeClass("active");
    $(this).find("> .nav_arrowdown").attr("aria-expanded", "false");
  });

  // Toggle current submenu
  if (!isSubmenuVisible) {
    $submenu.slideDown().addClass("active");
    $arrow.attr("aria-expanded", "true");
  } else {
    $submenu.slideUp().removeClass("active");
    $arrow.attr("aria-expanded", "false");
  }
}


/* ---------------------------------------------search bar--------------------------------------------- */

$(function () {

  var $overlay = $("#search-overlay");
  var $openBtn = $("#search_icon");
  var $closeBtn = $("#close-btn");
  var $firstInput = $overlay.find(".subs_frm_control");
  var lastFocusedElement = null;

  function getFocusableElements() {
    return $overlay.find(
      'a[href], button:not([disabled]), input:not([disabled]), ' +
      'select:not([disabled]), textarea:not([disabled]), [tabindex]:not([tabindex="-1"])'
    ).filter(':visible');
  }

  function openSearch() {
    lastFocusedElement = document.activeElement;

    $overlay.show().attr("aria-hidden", "false");
    $openBtn.attr("aria-expanded", "true");

    setTimeout(function () {
      $firstInput.focus();
    }, 50);
  }

  function closeSearch() {
    $overlay.hide().attr("aria-hidden", "true");
    $openBtn.attr("aria-expanded", "false");

    if (lastFocusedElement) {
      lastFocusedElement.focus();
    }
  }

  /* Open modal */
  $openBtn.on("click keydown", function (e) {
    if (e.type === "click" || e.key === "Enter" || e.key === " ") {
      e.preventDefault();
      openSearch();
    }
  });

  /* Close modal */
  $closeBtn.on("click keydown", function (e) {
    if (e.type === "click" || e.key === "Enter" || e.key === " ") {
      e.preventDefault();
      closeSearch();
    }
  });

  /* ESC key closes modal */
  $(document).on("keydown", function (e) {
    if (e.key === "Escape" && $overlay.is(":visible")) {
      closeSearch();
    }
  });

  /* Focus trap */
  $overlay.on("keydown", function (e) {
    if (e.key !== "Tab") return;

    var $focusable = getFocusableElements();
    var first = $focusable.first()[0];
    var last = $focusable.last()[0];

    if (e.shiftKey && document.activeElement === first) {
      e.preventDefault();
      last.focus();
    } else if (!e.shiftKey && document.activeElement === last) {
      e.preventDefault();
      first.focus();
    }
  });

});
// setTimeout(function () {
//   $firstInput.focus();
// }, 50);


// $(document).ready(function() {  
//  $('#close-btn').click(function() { 
//  $('#search-overlay').fadeOut(); 
//  $('body').removeClass('modal_open'); 
// });

// $('#search_icon').click(function() { 
//  $('#search-overlay').fadeIn();
//  $('#search_icon').toggleClass('search-open'); 
//  $('body').addClass('modal_open'); 
//  });
// });



/* ----------------------------------------------
   Shrink Header on scroll
---------------------------------------------- */
$(document).on("scroll", function () {
  if ($(document).scrollTop() > $(".header_top").outerHeight()) {
    $(".site-header").addClass("shrink");
  } else {
    $(".site-header").removeClass("shrink");
  }
});

/* ----------------------------------------------
   Mobile Menu toggles
---------------------------------------------- */
$(".menuTrigger").on("click", function () {
  $("body").toggleClass("menu_active");
});

$(".overly").on("click", function () {
  $("body").removeClass("menu_active");
});

/* ----------------------------------------------
   Popup close
---------------------------------------------- */
$(".modal_cross").on("click", function () {
  $("body").removeClass("modal-open");
  $(".modal").removeClass("active");
});

/* ----------------------------------------------
   Accessible Accordion
---------------------------------------------- */
$(".answer").hide().attr("tabindex", "-1");
$(".accordion-list > li.active > .answer").show().attr("tabindex", "0");

$(".accord_trigger").on("click", function (e) {
  e.preventDefault();
  var $parent = $(this).parent();
  if ($parent.hasClass("active")) {
    $parent.removeClass("active").find(".answer").stop().slideUp();
    $(this).attr("aria-expanded", "false");
    $(this).next(".answer").attr("tabindex", "-1");
    $(this).find("i").removeClass("fa-minus").addClass("fa-plus");
  } else {
    $(".accordion-list > li.active .answer").stop().slideUp();
    $(".accordion-list > li.active").removeClass("active");
    $(".accord_trigger").attr("aria-expanded", "false");
    $(".answer").attr("tabindex", "-1");
    $(".accord_trigger").find("i").removeClass("fa-minus").addClass("fa-plus");

    $parent.addClass("active").find(".answer").stop().slideDown();
    $(this).attr("aria-expanded", "true");
    $(this).next(".answer").attr("tabindex", "0");
    $(this).find("i").addClass("fa-minus").removeClass("fa-plus");
  }
  return false;
});


 /*---------------------------------------------
Accessible tab
--------------------------------------------- 
 *   This content is licensed according to the W3C Software License at
 *   https://www.w3.org/Consortium/Legal/2015/copyright-software-and-document
 *   File:   tabs-automatic.js
 *   Desc:   Tablist widget that implements ARIA Authoring Practices
 */
//'use strict';
class TabsAutomatic {
  constructor(groupNode) {
    this.tablistNode = groupNode;
    this.tabs = [];
    this.firstTab = null;
    this.lastTab = null;

    this.tabs = Array.from(this.tablistNode.querySelectorAll('[role=tab]'));
    this.tabpanels = [];

    for (var i = 0; i < this.tabs.length; i += 1) {
      var tab = this.tabs[i];
      var tabpanel = document.getElementById(tab.getAttribute('aria-controls'));

      tab.tabIndex = -1;
      tab.setAttribute('aria-selected', 'false');
      this.tabpanels.push(tabpanel);

      tab.addEventListener('keydown', this.onKeydown.bind(this));
      tab.addEventListener('click', this.onClick.bind(this));

      if (!this.firstTab) {
        this.firstTab = tab;
      }
      this.lastTab = tab;
    }

    this.setSelectedTab(this.firstTab, false);
  }
  setSelectedTab(currentTab, setFocus) {
    if (typeof setFocus !== 'boolean'){
      setFocus = true;
    }
    for (var i = 0; i < this.tabs.length; i += 1) {
      var tab = this.tabs[i];
      if (currentTab === tab) {
        tab.setAttribute('aria-selected', 'true');
        tab.removeAttribute('tabindex');
        this.tabpanels[i].classList.remove('is-hidden');
        if (setFocus) {
          tab.focus();
        }
      } else {
        tab.setAttribute('aria-selected', 'false');
        tab.tabIndex = -1;
        this.tabpanels[i].classList.add('is-hidden');
      }
    }
  }
  setSelectedToPreviousTab(currentTab) {
    var index;

    if (currentTab === this.firstTab) {
      this.setSelectedTab(this.lastTab);
    } else {
      index = this.tabs.indexOf(currentTab);
      this.setSelectedTab(this.tabs[index - 1]);
    }
  }
  setSelectedToNextTab(currentTab) {
    var index;

    if (currentTab === this.lastTab) {
      this.setSelectedTab(this.firstTab);
    } else {
      index = this.tabs.indexOf(currentTab);
      this.setSelectedTab(this.tabs[index + 1]);
    }
  }
  /* EVENT HANDLERS */
  onKeydown(event) {
    var tgt = event.currentTarget,
      flag = false;

    switch (event.key) {
      case 'ArrowLeft':
        this.setSelectedToPreviousTab(tgt);
        flag = true;
        break;

      case 'ArrowRight':
        this.setSelectedToNextTab(tgt);
        flag = true;
        break;

      case 'Home':
        this.setSelectedTab(this.firstTab);
        flag = true;
        break;

      case 'End':
        this.setSelectedTab(this.lastTab);
        flag = true;
        break;

      default:
        break;
    }

    if (flag) {
      event.stopPropagation();
      event.preventDefault();
    }
  }
  onClick(event) {
    this.setSelectedTab(event.currentTarget);
  }
}
// Initialize tablist
window.addEventListener('load', function () {
  var tablists = document.querySelectorAll('[role=tablist].automatic');
  for (var i = 0; i < tablists.length; i++) {
    new TabsAutomatic(tablists[i]);
  }
});


/* ----------------------------------------------
   Video play/pause toggle
---------------------------------------------- */
var ban_video = document.getElementById("ban_video");
if ($("#video-play-toggle").length) {
  // Set initial button state depending on video state (safe check)
  if (ban_video && !ban_video.paused) {
    $("#video-play-toggle").html('<i class="fa-solid fa-pause" aria-hidden="true"></i> Pause Video');
    $("#video-play-toggle").addClass("pause-bt").removeClass("play-bt");
    $("#video-play-toggle").attr("aria-label", "Pause Video");
  } else {
    $("#video-play-toggle").html('<i class="fa-solid fa-play" aria-hidden="true"></i> Play Video');
    $("#video-play-toggle").addClass("play-bt").removeClass("pause-bt");
    $("#video-play-toggle").attr("aria-label", "Play Video");
  }

  $("#video-play-toggle").on("click", function (ev) {
    ev.preventDefault();
    if (!ban_video) return;
    if (!ban_video.paused) {
      ban_video.pause();
      $(this).html('<i class="fa-solid fa-play" aria-hidden="true"></i> Play Video');
      $(this).addClass("play-bt").removeClass("pause-bt");
      $(this).attr("aria-label", "Play Video");
    } else {
      ban_video.play();
      $(this).html('<i class="fa-solid fa-pause" aria-hidden="true"></i> Pause Video');
      $(this).removeClass("play-bt").addClass("pause-bt");
      $(this).attr("aria-label", "Pause Video");
    }
  });
}

/* ----------------------------------------------
   Accessible Dropdown (vanilla)
---------------------------------------------- */
(function initAccessibleDropdowns() {
  const dropdowns = Array.from(document.querySelectorAll(".dropdown"));

  dropdowns.forEach((dropdown) => {
    const btn = dropdown.querySelector(".dropdown-button");
    const menu = dropdown.querySelector(".dropdown-menu");
    const items = Array.from(dropdown.querySelectorAll(".dropdown-menu-item"));
    const content = dropdown.querySelector(".dropdown-content");

    if (!btn || !menu || !content) return;

    btn.setAttribute("aria-haspopup", "true");
    btn.setAttribute("aria-expanded", "false");
    if (btn.classList.contains("disabled")) btn.setAttribute("aria-disabled", "true");
    else btn.removeAttribute("aria-disabled");

    menu.setAttribute("role", "menu");
    menu.setAttribute("aria-hidden", "true");

    items.forEach((i) => {
      i.setAttribute("role", "menuitem");
      i.setAttribute("tabindex", "-1");
    });

    const open = () => {
      dropdowns.forEach((d) => {
        if (d !== dropdown) closeDropdown(d);
      });
      dropdown.setAttribute("data-open", "true");
      btn.setAttribute("aria-expanded", "true");
      menu.setAttribute("aria-hidden", "false");
      if (items.length) {
        setTabIndex(items, 0);
        items[0].focus();
      }
    };

    const closeDropdown = (d = dropdown) => {
      const b = d.querySelector(".dropdown-button");
      const m = d.querySelector(".dropdown-menu");
      const its = Array.from(d.querySelectorAll(".dropdown-menu-item"));
      d.setAttribute("data-open", "false");
      if (b) b.setAttribute("aria-expanded", "false");
      if (m) m.setAttribute("aria-hidden", "true");
      its.forEach((it) => it.setAttribute("tabindex", "-1"));
    };

    const setTabIndex = (list, activeIndex) => {
      list.forEach((el, idx) => el.setAttribute("tabindex", idx === activeIndex ? "0" : "-1"));
    };

    const moveFocus = (currentIndex, delta) => {
      if (!items.length) return;
      let next = (currentIndex + delta + items.length) % items.length;
      setTabIndex(items, next);
      items[next].focus();
      return next;
    };

    const selectItem = (item) => {
      const text = (item.textContent || "").trim();
      if (text) content.textContent = text;
      closeDropdown();
      btn.focus();

      // enable next dropdown if present
      const nextDropdown = dropdown.nextElementSibling;
      if (nextDropdown && nextDropdown.classList.contains("dropdown")) {
        const nextButton = nextDropdown.querySelector(".dropdown-button");
        if (nextButton && nextButton.classList.contains("disabled")) {
          nextButton.classList.remove("disabled");
          nextButton.removeAttribute("aria-disabled");
        }
      }
    };

    btn.addEventListener("click", (ev) => {
      ev.stopPropagation();
      if (btn.classList.contains("disabled")) return;
      const expanded = btn.getAttribute("aria-expanded") === "true";
      expanded ? closeDropdown() : open();
    });

    btn.addEventListener("keydown", (ev) => {
      if (btn.classList.contains("disabled")) return;
      const key = ev.key;
      if (key === "ArrowDown" || key === "Down") {
        ev.preventDefault();
        open();
      } else if (key === "Enter" || key === " " || key === "Spacebar") {
        ev.preventDefault();
        const expanded = btn.getAttribute("aria-expanded") === "true";
        expanded ? closeDropdown() : open();
      } else if (key === "Escape") {
        closeDropdown();
        btn.focus();
      }
    });

    items.forEach((item, idx) => {
      item.addEventListener("click", (e) => {
        e.stopPropagation();
        selectItem(item);
      });

      item.addEventListener("keydown", (e) => {
        const key = e.key;
        if (key === "Enter" || key === " " || key === "Spacebar") {
          e.preventDefault();
          selectItem(item);
        } else if (key === "ArrowDown" || key === "Down") {
          e.preventDefault();
          moveFocus(idx, +1);
        } else if (key === "ArrowUp" || key === "Up") {
          e.preventDefault();
          moveFocus(idx, -1);
        } else if (key === "Escape") {
          e.preventDefault();
          closeDropdown();
          btn.focus();
        } else if (key === "Tab") {
          closeDropdown();
        }
      });

      item.addEventListener("focus", () => {
        const current = items.indexOf(item);
        setTabIndex(items, current);
      });
    });
  });

  document.addEventListener("click", (e) => {
    document.querySelectorAll(".dropdown").forEach((d) => {
      if (d.getAttribute("data-open") === "true" && !d.contains(e.target)) {
        const b = d.querySelector(".dropdown-button");
        const m = d.querySelector(".dropdown-menu");
        d.setAttribute("data-open", "false");
        if (b) b.setAttribute("aria-expanded", "false");
        if (m) m.setAttribute("aria-hidden", "true");
        Array.from(d.querySelectorAll(".dropdown-menu-item")).forEach((i) => i.setAttribute("tabindex", "-1"));
      }
    });
  });

  document.addEventListener("keydown", (e) => {
    if (e.key === "Escape") {
      document.querySelectorAll(".dropdown").forEach((d) => {
        const b = d.querySelector(".dropdown-button");
        const m = d.querySelector(".dropdown-menu");
        d.setAttribute("data-open", "false");
        if (b) b.setAttribute("aria-expanded", "false");
        if (m) m.setAttribute("aria-hidden", "true");
        Array.from(d.querySelectorAll(".dropdown-menu-item")).forEach((i) => i.setAttribute("tabindex", "-1"));
      });
    }
  });
})();



/* ----------------------------------------------
   Trap focus for modal (safe add/remove)
---------------------------------------------- */
function createTrapHandlers(modalId) {
  var modal = document.getElementById(modalId);
  if (!modal) return null;

  function trapFocusHandler(event) {
    var isTabPressed = event.key === "Tab" || event.keyCode === 9;
    if (!isTabPressed) return;

    var focusableElements = 'button, [href], input, select, textarea, iframe, [tabindex]:not([tabindex="-1"])';
    var focusableContent = Array.from(modal.querySelectorAll(focusableElements)).filter(function (el) {
      return el.offsetParent !== null;
    });

    var firstFocusableElement = focusableContent[0];
    var lastFocusableElement = focusableContent[focusableContent.length - 1];

    if (event.shiftKey) {
      if (document.activeElement === firstFocusableElement) {
        lastFocusableElement.focus();
        event.preventDefault();
      }
    } else {
      if (document.activeElement === lastFocusableElement) {
        firstFocusableElement.focus();
        event.preventDefault();
      }
    }
  }

  function touchFocusHandler(/* event */) {
    // fallback: ensure some element is focused inside modal (no default preventing)
    var focusableElements = 'button, [href], input, select, textarea, iframe, [tabindex]:not([tabindex="-1"])';
    var focusableContent = Array.from(modal.querySelectorAll(focusableElements)).filter(function (el) {
      return el.offsetParent !== null;
    });

    var firstFocusableElement = focusableContent[0];
    var lastFocusableElement = focusableContent[focusableContent.length - 1];

    if (document.activeElement === firstFocusableElement && lastFocusableElement) {
      lastFocusableElement.focus();
    } else if (document.activeElement === lastFocusableElement && firstFocusableElement) {
      firstFocusableElement.focus();
    }

    // Add a small ARIA live region to notify screen readers (then remove)
    var liveRegion = document.createElement("div");
    liveRegion.setAttribute("role", "alert");
    liveRegion.setAttribute("aria-live", "assertive");
    liveRegion.style.position = "absolute";
    liveRegion.style.clip = "rect(1px, 1px, 1px, 1px)";
    modal.appendChild(liveRegion);
    setTimeout(function () { modal.removeChild(liveRegion); }, 1000);
  }

  return {
    trapFocusHandler: trapFocusHandler,
    touchFocusHandler: touchFocusHandler
  };
}

function initTrapFocus(modalId) {
  var modal = document.getElementById(modalId);
  if (!modal) return;
  var handlers = createTrapHandlers(modalId);
  if (!handlers) return;

  modal.addEventListener("keydown", handlers.trapFocusHandler);
  modal.addEventListener("touchstart", handlers.touchFocusHandler, true);

  // Hide other content for screen readers
  var elementsToHide = document.querySelectorAll('main, header, .logo a, footer, .banner, .skip-to-main-content-link, .header_btns a, .page_hidewrap a');
  elementsToHide.forEach(function (element) {
    element.setAttribute("aria-hidden", "true");
    element.setAttribute("tabindex", "-1");
  });

  modal.setAttribute("role", "dialog");
  modal.setAttribute("aria-modal", "true");
  modal.setAttribute("tabindex", "-1");
  safeFocus($(modal));
  // store handlers reference on element so we can remove later
  modal._trapHandlers = handlers;
}

function closeTrapFocus(modalId) {
  var modal = document.getElementById(modalId);
  if (!modal || !modal._trapHandlers) return;

  modal.removeEventListener("keydown", modal._trapHandlers.trapFocusHandler);
  modal.removeEventListener("touchstart", modal._trapHandlers.touchFocusHandler, true);

  var elementsToHide = document.querySelectorAll('main, header, .logo a, footer, .banner, .skip-to-main-content-link, .header_btns a, .page_hidewrap a');
  elementsToHide.forEach(function (element) {
    element.removeAttribute("aria-hidden");
    element.removeAttribute("tabindex");
  });

  modal.removeAttribute("role");
  modal.removeAttribute("tabindex");
  modal.removeAttribute("aria-modal");
  if (modal._previousTrigger) {
    safeFocus($(modal._previousTrigger));
  }
  delete modal._trapHandlers;
}

function openModal(modalId, trigger) {
  var modal = document.getElementById(modalId);
  if (!modal) return;
  modal._previousTrigger = trigger || null;
  initTrapFocus(modalId);
}

function closeModal(modalId) {
  closeTrapFocus(modalId);
}

//***** Added aria-label dynamic in input field

document.addEventListener("DOMContentLoaded", function () {

  // Select all newsletter input fields
  const newsInputs = document.querySelectorAll(".newsltr-box input");

  newsInputs.forEach(input => {

      let ariaLabel = "";
      
      // 1. If label exists, use label text
      if (input.id) {
          const label = document.querySelector(`label[for="${input.id}"]`);
          if (label) {
              ariaLabel = label.textContent.trim();
          }
      }

      // 2. If no label → use placeholder text
      if (!ariaLabel && input.placeholder) {
          ariaLabel = input.placeholder.trim();
      }

      // 3. Apply aria-label only if found
      if (ariaLabel) {
          input.setAttribute("aria-label", ariaLabel);
      }
  });
});

// ===== How to apply slider home page-

  $('#apply-slider').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    arrows: true,
    infinite: false,
    prevArrow: '<button class="slide-arrow prev-arrow"><img src="assets/images/arrow-prev.png" aria-hidden="true" alt="previous arrow" /></button>',
    nextArrow: '<button class="slide-arrow next-arrow"><img src="assets/images/arrow-next.png" aria-hidden="true" alt="next arrow" /></button>',
    adaptiveHeight: true,
    responsive: [
      {
        breakpoint: 1365,
        settings: {
          slidesToShow: 3
        }
      },
      {
        breakpoint: 979,
        settings: {
          slidesToShow: 2
        }
      },
      {
        breakpoint: 767,
        settings: {
          slidesToShow: 1
        }
      },
    ]
  })
  // ===== stories-slider slider home page-

  $('#stories-slider').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    arrows: true,
    infinite: false,
    prevArrow: '<button class="slide-arrow prev-arrow"><img src="assets/images/arrow-prev.png" aria-hidden="true" alt="previous arrow" /></button>',
    nextArrow: '<button class="slide-arrow next-arrow"><img src="assets/images/arrow-next.png" aria-hidden="true" alt="next arrow" /></button>',
    adaptiveHeight: true,
    responsive: [
      {
        breakpoint: 1365,
        settings: {
          slidesToShow: 3
        }
      },
      {
        breakpoint: 979,
        settings: {
          slidesToShow: 2
        }
      },
      {
        breakpoint: 767,
        settings: {
          slidesToShow: 1
        }
      },
    ]
  });

  // ===== news-slider slider home page-

  $('#news-slider').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    arrows: true,
    infinite: true,
    autoplay: true,
    loop:true,
    autoplaySpeed: 2000,
    appendArrows:'.newsSlick-control',
    useAutoplayToggleButton:false,
    //pauseOnHover: false, // Disables the default pause-on-hover behavior
    //pauseOnFocus: true,
    prevArrow: '<button class="slide-arrow prev-arrow"><img src="assets/images/arrow-prev.png" aria-hidden="true" alt="previous arrow" /></button>',
    nextArrow: '<button class="slide-arrow next-arrow"><img src="assets/images/arrow-next.png" aria-hidden="true" alt="next arrow" /></button>',
    adaptiveHeight: true,
    responsive: [
      {
        breakpoint: 1365,
        settings: {
          slidesToShow: 3
        }
      },
      {
        breakpoint: 979,
        settings: {
          slidesToShow: 2
        }
      },
      {
        breakpoint: 767,
        settings: {
          slidesToShow: 1
        }
      },
    ]
  });


$('#newsSlick-toggle').click( function() {
    if ($(this).html() == '<i aria-hidden="true" class="fas fa-pause"></i> Pause') {
    $('#news-slider').slick('slickPause');
    $(this).html('<i aria-hidden="true" class="fas fa-play"></i> Play');
    $(this).attr({'aria-label':'Click here to play slider', 'title':'Play Slider'});

    } else {

    $('#news-slider').slick('slickPlay');
    $(this).html('<i aria-hidden="true" class="fas fa-pause"></i> Pause');
    $(this).attr({'aria-label':'Click here to pause slider', 'title':'Pause Slider'});
    }
});



// ===== Partner supports slider

  $('#partner-support-slider').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: true,
    infinite: true,
    autoplay: false,
    loop:false,
    autoplaySpeed: 2000,
    //appendArrows:'.newsSlick-control',
    //useAutoplayToggleButton:false,
    //pauseOnHover: false, // Disables the default pause-on-hover behavior
    //pauseOnFocus: true,
    prevArrow: '<button class="slide-arrow prev-arrow"><img src="assets/images/arrow-prev.png" aria-hidden="true" alt="previous arrow" /></button>',
    nextArrow: '<button class="slide-arrow next-arrow"><img src="assets/images/arrow-next.png" aria-hidden="true" alt="next arrow" /></button>',
    adaptiveHeight: true,
    responsive: [
      {
        breakpoint: 767,
        settings: {
          slidesToShow: 1
        }
      },
    ]
  });

// ===== our culture slider

  $('#culture-slider').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    arrows: true,
    infinite: false,
    prevArrow: '<button class="slide-arrow prev-arrow"><img src="assets/images/arrow-prev.png" aria-hidden="true" alt="previous arrow" /></button>',
    nextArrow: '<button class="slide-arrow next-arrow"><img src="assets/images/arrow-next.png" aria-hidden="true" alt="next arrow" /></button>',
    adaptiveHeight: true,
    responsive: [
      {
        breakpoint: 1365,
        settings: {
          slidesToShow: 4
        }
      },
      {
        breakpoint: 979,
        settings: {
          slidesToShow: 3
        }
      },
      {
        breakpoint: 767,
        settings: {
          slidesToShow: 2
        }
      },
      {
        breakpoint: 640,
        settings: {
          slidesToShow: 1
        }
      },
    ]
  });

// ===== our culture slider

  $('#publications-slider').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    arrows: true,
    infinite: false,
    prevArrow: '<button class="slide-arrow prev-arrow"><img src="assets/images/arrow-prev.png" aria-hidden="true" alt="previous arrow" /></button>',
    nextArrow: '<button class="slide-arrow next-arrow"><img src="assets/images/arrow-next.png" aria-hidden="true" alt="next arrow" /></button>',
    adaptiveHeight: true,
    responsive: [
      {
        breakpoint: 1365,
        settings: {
          slidesToShow: 4
        }
      },
      {
        breakpoint: 1199,
        settings: {
          slidesToShow: 3
        }
      },
      {
        breakpoint: 767,
        settings: {
          slidesToShow: 2
        }
      },
      {
        breakpoint: 640,
        settings: {
          slidesToShow: 1
        }
      },
    ]
  });


/* ----------------------------------------------
   Accessible slider focus and keyboard handling
---------------------------------------------- */

var $sliders = $('#stories-slider, #partner-support-slider, #culture-slider, #publications-slider');

// Bind afterChange ONCE
$sliders.on('afterChange', function (event, slick, currentSlide) {
  $('.single-box, .partner-support-box, .culture-box').removeAttr('tabindex');

  var $currentSlide = $(slick.$slides[currentSlide])
    .find('.single-box, .partner-support-box, .culture-box')
    .first();

  $currentSlide.attr('tabindex', '0').focus();
});

// Handle BOTH keyboard and mouse
$('.prev-arrow, .next-arrow').on('click keydown', function (e) {
  if (
    e.type === 'click' ||
    e.key === 'Enter' ||
    e.key === ' ' ||
    e.keyCode === 13
  ) {
    e.preventDefault();
  }
});



// ===== news slider focus and keyboard handling**

let manualSlideChange = false;
// When user presses Enter on nav arrows, trigger click and set flag
$('.newsSlick-control .prev-arrow, .newsSlick-control .next-arrow').on('keydown', function(e) {
    if (e.key === 'Enter' || e.keyCode === 13) {
        manualSlideChange = true; // Set the flag
        $(this).click(); // Trigger slide change
    }
});

// After slide change, check if it was manual before focusing
$('#news-slider').on('afterChange', function(event, slick, currentSlide) {
    $('#news-slider .single-box').removeAttr('tabindex');
    if (manualSlideChange) {
        let currentSlideElement = $(slick.$slides[currentSlide]).find('.single-box');
        currentSlideElement.attr('tabindex', '0').focus();
        manualSlideChange = false; // Reset flag
    }
});


//======= Scrolling Back to Top button with Smooth Scroll 
$(document).ready(function () {
  var $btn = $("#scroll");

  $(window).on("scroll", function () {
    if ($(this).scrollTop() > 50) {
      $btn.fadeIn().attr("aria-hidden", "false");
    } else {
      $btn.fadeOut().attr("aria-hidden", "true");
    }
  });

  $btn.on("click keydown", function (e) {
    if (e.type === "click" || e.key === "Enter" || e.key === " ") {
      e.preventDefault();
      $("html, body").animate({ scrollTop: 0 }, 900, function () {
        $("body").attr("tabindex", "-1").focus();
      });
    }
  });
});


//===== Effect of Show more button WCAG
$(".show-more").on("click keydown", function (e) {
  if (e.type === "keydown" && e.key !== "Enter" && e.key !== " ") return;
  e.preventDefault();
  var $btn = $(this);
  var $content = $("#" + $btn.attr("aria-controls"));
  var expanded = $btn.attr("aria-expanded") === "true";
  // Update button state
  $btn
    .attr("aria-expanded", !expanded)
    .text(expanded ? "Read More" : "Read Less");
  // Toggle content
  $content.prop("hidden", expanded);
  // 🔹 WCAG focus handling
  if (!expanded) {
    // Make content focusable temporarily
    $content.attr("tabindex", "-1").focus();
  } else {
    // Return focus to button when collapsed
    $btn.focus();
  }
});



/* ----------------------------------------------
   Accessible slider focus and keyboard handling
---------------------------------------------- */
// var $slider = $("#stories-slider");
// if ($slider.length && $.fn.slick) {
//   // ensure afterChange only registered once
//   $slider.on("afterChange", function (event, slick, currentSlide) {
//     try {
//       $slider.find(".single-box").removeAttr("tabindex");
//       var $currentSlide = $(slick.$slides[currentSlide]).find(".single-box");
//       $currentSlide.attr("tabindex", "0").focus();
//     } catch (err) {
//       // ignore
//     }
//   });
// }
// // navigation button keyboard activation
// $(document).on("keydown", "#stories-slider .prev-arrow, #stories-slider .next-arrow", function (e) {
//   var code = e.key || e.keyCode;
//   if (code === "Enter" || code === 13) {
//     e.preventDefault();
//     $(this).trigger("click");
//   }
// });

// fix aria-label on any carousel that was given "carousel" role label earlier
$(function () {
  $('[aria-label="carousel"]').each(function () {
    var id = this.id || "slider";
    var cleanLabel = id.replace(/[\W_]+/g, " ").trim();
    $(this).attr("aria-label", cleanLabel);
  });
});

/* ----------------------------------------------
   Menu Accordion (mobile & desktop combined)
---------------------------------------------- */
$(document).ready(function () {
  // Helper to toggle accordion content
  function toggleAccordion($trigger, $content, isOpen) {
    $trigger.attr("aria-expanded", isOpen);
    $content.attr("aria-hidden", !isOpen);
    if (isOpen) {
      $content.slideDown(300);
    } else {
      $content.slideUp(300);
    }
  }

  // Main menu
  $(".menu-list > li > .menu_list_content").hide();
  $(".menu-list > li.active > .menu_list_content").show().attr("aria-hidden", "false");

  $(".menu_list_trigger").each(function () {
    var $this = $(this);
    var $content = $this.next(".menu_list_content");
    var id = $content.attr("id") || "content-" + Math.random().toString(36).substr(2, 9);
    $content.attr("id", id);
    $this.attr({
      role: "button",
      tabindex: "0",
      "aria-expanded": $this.parent().hasClass("active"),
      "aria-controls": id
    });
    $content.attr({ role: "region", "aria-hidden": !$this.parent().hasClass("active") });
  });

  $(".menu_list_trigger").on("click keydown", function (e) {
    var isActivation = e.type === "click" || e.key === "Enter" || e.key === " ";
    if (!isActivation) return;
    e.preventDefault();
    var $this = $(this);
    var $parent = $this.parent();
    var $content = $this.next(".menu_list_content");

    if ($parent.hasClass("active")) {
      $parent.removeClass("active");
      toggleAccordion($this, $content, false);
    } else {
      var $open = $(".menu-list > li.active");
      toggleAccordion($open.find(".menu_list_trigger"), $open.find(".menu_list_content"), false);
      $open.removeClass("active");

      $parent.addClass("active");
      toggleAccordion($this, $content, true);

      setTimeout(function () {
        $("html, body").animate({ scrollTop: $this.offset().top - 100 }, 400);
      }, 400);
    }
  });

  // Child menu (nested) - same pattern
  $(".child-menu-list > li > .child_menu_content").hide();
  $(".child-menu-list > li.active > .child_menu_content").show().attr("aria-hidden", "false");

  $(".child_menu_trigger").each(function () {
    var $this = $(this);
    var $content = $this.next(".child_menu_content");
    var id = $content.attr("id") || "child-" + Math.random().toString(36).substr(2, 9);
    $content.attr("id", id);
    $this.attr({
      role: "button",
      tabindex: "0",
      "aria-expanded": $this.parent().hasClass("active"),
      "aria-controls": id
    });
    $content.attr({ role: "region", "aria-hidden": !$this.parent().hasClass("active") });
  });

  $(".child_menu_trigger").on("click keydown", function (e) {
    var isActivation = e.type === "click" || e.key === "Enter" || e.key === " ";
    if (!isActivation) return;
    e.preventDefault();
    var $this = $(this);
    var $parent = $this.parent();
    var $content = $this.next(".child_menu_content");

    if ($parent.hasClass("active")) {
      $parent.removeClass("active");
      toggleAccordion($this, $content, false);
    } else {
      var $open = $(".child-menu-list > li.active");
      toggleAccordion($open.find(".child_menu_trigger"), $open.find(".child_menu_content"), false);
      $open.removeClass("active");

      $parent.addClass("active");
      toggleAccordion($this, $content, true);

      setTimeout(function () {
        $("html, body").animate({ scrollTop: $this.offset().top - 100 }, 400);
      }, 400);
    }
  });
});


$(".prev-arrow").attr({
  title: "Previous slider",
  "aria-label": "Navigate to the previous slide"
});

$(".next-arrow").attr({
  title: "Next slider",
  "aria-label": "Navigate to the next slide"
});





/* ----------------------------------------------
   Accessible Mobile Menu behavior & modal integration
---------------------------------------------- */
function setupMobileMenu() {
  if ($(window).width() < 1200) {
    $(".sub-menu").css("display", "none");
    $("#menu-main-menu, #menu-main-menu a, .toggle-close, .nav_arrowdown, #menu-notice").attr({ tabindex: "-1", "aria-hidden": "true" });

    $(".toggle-open").on("click", function () {
      $("#menu-main-menu").removeAttr("tabindex aria-hidden");
      $("#menu-main-menu a").removeAttr("tabindex aria-hidden");
      $(this).attr({ tabindex: "-1", "aria-hidden": "true" });
      $(".toggle-close").removeAttr("tabindex aria-hidden");
      $(".nav_arrowdown").removeAttr("tabindex aria-hidden");
      $("#menu-notice").html("navigation opened");
      openModal("site-navigation", this);
    });

    $(".menuTrigger.toggle-close").on("click", function () {
      $("#menu-main-menu").attr({ tabindex: "-1", "aria-hidden": "true" });
      $("#menu-main-menu a").attr({ tabindex: "-1", "aria-hidden": "true" });
      $(this).attr({ tabindex: "-1", "aria-hidden": "true" });
      $(".nav_arrowdown").attr({ tabindex: "-1", "aria-hidden": "true" });
      $("#menu-notice").html("navigation closed");
      closeModal("site-navigation");
      $(".toggle-open").focus();
    });
  }
}

// Run on ready and on resize (debounced)
$(document).ready(function () {
  setupMobileMenu();
});

var resizeTimer;
$(window).on("resize", function () {
  clearTimeout(resizeTimer);
  resizeTimer = setTimeout(function () {
    setupMobileMenu();
  }, 150);
});

/* ----------------------------------------------
   Sidemenu On Scroll and floating sidemenu
---------------------------------------------- */
$(function () {
  $(document).scroll(function () {
    if ($("#lacarte_menu").length) {
      if ($(this).scrollTop() >= $("#lacarte_menu").offset().top - 100) {
        $(".floating_sidemenu").addClass("visible");
      } else {
        $(".floating_sidemenu").removeClass("visible");
      }
    }
  });

  $(".floating_sidemenu li a").on("click", function (e) {
    var href = $(this).attr("href");
    if (!href || href.charAt(0) !== "#") return;
    e.preventDefault();
    if ($(href).length) {
      $("html, body").animate({ scrollTop: $(href).offset().top - 90 }, 1200);
    }
  });

  // Scrollspy
  var sectionIds = $("a.sdmenu_link");
  $(document).on("scroll", function () {
    sectionIds.each(function () {
      var container = $(this).attr("href");
      if (!container || $(container).length === 0) return;
      var containerOffset = $(container).offset().top;
      var containerHeight = $(container).outerHeight();
      var containerBottom = containerOffset + containerHeight;
      var scrollPosition = $(document).scrollTop();

      if (scrollPosition < containerBottom - 100 && scrollPosition >= containerOffset - 100) {
        $(this).parent().addClass("active");
      } else {
        $(this).parent().removeClass("active");
      }
    });
  });

  // show/hide popup based on cookie (getCookie should exist on your site)
  try {
    var is_show = typeof getCookie === "function" ? getCookie("open_book_a_table") : null;
    if (is_show === "do_not_show") {
      $(".book_table_modal").removeClass("active");
      $("body").removeClass("modal-open");
    } else {
      if ($(".book_table_modal").length) {
        $(".book_table_modal").addClass("active");
        $("body").addClass("modal-open");
      }
    }
  } catch (err) {
    // If getCookie isn't defined, ignore
  }
});

// Menu trigger for mobile
$(".flmenu_mob_trigger").on("click", function () {
  $(this).parent().toggleClass("menu_open");
});

// END IIFE


})(jQuery);
