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

function startHideTimer() {
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
  startHideTimer();
  setStartTime(videoId, userId);
  updateProgressTimer(videoId, userId);
}

function updateProgressTimer(videoId, userId) {
  addDuration(videoId, userId);

  var timer;
  $("video")
    .on("playing", function (event) {
      window.clearInterval(timer);
      timer = window.setInterval(function () {
        updateProgress(videoId, userId, event.target.currentTime);
      }, 2000);
    })
    .on("ended", function () {
      setVideoSeen(videoId, userId);
      window.clearInterval(timer);
    });
}

function addDuration(videoId, userId) {
  $.post(
    "../../public/ajax/addDuration.php",
    { video_id: videoId, user_id: userId },
    function (data) {
      if (data !== null && data !== "") {
        alert(data);
      }
    }
  );
}

function updateProgress(videoId, userId, progress) {
  $.post(
    "../../public/ajax/updateDuration.php",
    { video_id: videoId, user_id: userId, video_progress: progress },
    function (data) {
      if (data !== null && data !== "") {
        alert(data);
      }
    }
  );
}

function setVideoSeen(videoId, userId) {
  $.post(
    "../../public/ajax/setVideoSeen.php",
    { video_id: videoId, user_id: userId },
    function (data) {
      if (data !== null && data !== "") {
        alert(data);
      }
    }
  );
}

function setStartTime(videoId, userId) {
  $.post(
    "../../public/ajax/getStartTime.php",
    { video_id: videoId, user_id: userId },
    function (data) {
      if (isNaN(data)) {
        alert(data);
        return;
      }

      $("video").on("canplay", function () {
        this.currentTime = data;
        $("video").off("canplay");
      });
    }
  );
}

function restartVideo() {
  $("video")[0].currentTime = 0;
  $("video")[0].play();
  $(".up_next").fadeOut();
}

function playNext(videoId) {
  window.location.href = "http://localhost/netflix/series/watch/" + videoId;
}

function showUpNextNav() {
  $(".up_next").fadeIn();
}
