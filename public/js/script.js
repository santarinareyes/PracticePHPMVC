"use strict";

function volumeToggle(button) {
  const muted = $(".preview_video").prop("muted");
  $(".preview_video").prop("muted", !muted);

  $(button).find("i").toggleClass("fa-volume-mute");
  $(button).find("i").toggleClass("fa-volume-up");
}

function previewEnded() {
  $(".preview_video").toggle();
  $(".preview_image").toggle();
}

function goBack() {
  window.history.back();
}

function hideTimer() {
  let timer = null;

  $(document).on("mousemove", function () {
    clearTimeout(timer);
    $(".watch_nav").fadeIn();

    timer = setTimeout(function () {
      $(".watch_nav").fadeOut();
    }, 700);
  });
}

function initVideo(videoId, userId) {
  hideTimer();
  console.log(videoId);
  console.log(userId);
}
