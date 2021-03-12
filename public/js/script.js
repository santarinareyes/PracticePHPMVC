"use strict";

function volumeToggle(button) {
  const muted = $(".preview_video").prop("muted");
  $(".preview_video").prop("muted", !muted);

  $(button).find("i").toggleClass("fa-volume-mute");
  $(button).find("i").toggleClass("fa-volume-up");
}
