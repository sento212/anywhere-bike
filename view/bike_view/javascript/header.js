$(document).ready(function () {
  // updatebarsize();

  // $(window).resize(function () {
  //   updatebarsize();
  // });

  $(".menura").click(function (e) {
    $(".side, .sides").css("transition", "ease-in-out 0.3s");
    $(".exit-mark").css("display", "inline");
    $(".side").removeClass("hide");
    $(".side").removeClass("shide");
    $(".mama").css("display", "inline");
    $(".side-icon").css("display", "inline");
    $(".list-item").css("display", "flex");
    // $(".side, .hide, .hides").css("transition", "ease-in-out 0.3s");
    setTimeout(() => {
      $(".juduloy").css("display", "inline");
      $(".side, .sides").css("transition", "");
    }, 300);
  });

  $(".exit-mark").click(function () {
    var screenWidth = $(window).width();
    $(".side, .sides").css("transition", "ease-in-out 0.3s");
    $(".exit-mark").css("display", "none");
    $(".juduloy").css("display", "none");
    $(".side-icon").css("display", "none");
    if (screenWidth <= 515) {
      $(".mama").css("display", "none");
      $(".side").addClass("shide");
      $(".sides").addClass("shide");
      $(".list-item").css("display", "none");
    } else if (screenWidth <= 850) {
      $(".side").addClass("hide");
      $(".sides").addClass("hide");
      $(".side-icon").css("display", "inline");
      $(".list-item").css("display", "flex");
    }
    setTimeout(() => {
      $(".side, .sides").css("transition", "");
    }, 300);
  });

  // function updatebarsize() {
  //   $(".periodshow").css("width", "10px");
  //   // $(".table-container").css("width", "10px");
  //   $(".side, .sides").css("transition", "");
  //   var screenWidth = $(window).width();
  //   var screenHeight = $(window).height();
  //   $(".exit-mark").css("display", "none");
  //   $(".guting").addClass("gap-2");
  //   // console.log(screenWidth);
  //   let kurangi = 0;
  //   if (screenWidth <= 515) {
  //     kurangi = 0;
  //     $(".side").removeClass("hide");
  //     $(".sides").removeClass("hide");
  //     $(".side").addClass("shide");
  //     $(".sides").addClass("shide");
  //     $(".guting").removeClass("flex-row");
  //     $(".guting").addClass("flex-column");
  //     $(".guting").removeClass("my-2");
  //     $(".guting").addClass("my-3");
  //     $(".sidegtg").addClass("flex-row");
  //     $(".sidegtg").addClass("flex-column");
  //     $(".sidegtg").addClass("my-1");
  //     $(".guting .isi").removeClass("w-75");
  //     $(".guting .isi").addClass("w-100");
  //     $(".gutang .isi").removeClass("w-75");
  //     $(".gutang .isi").addClass("w-50");
  //     $(".reform").addClass("w-100");
  //     $(".special").addClass("flex-fill");
  //     $(".guting .name").removeClass("w-25");
  //     $(".guting .name").addClass("w-100");
  //     $(".gutang .name").removeClass("w-25");
  //     $(".gutang .name").addClass("w-50");
  //     $(".usera").addClass("d-none");
  //     $(".menura").removeClass("d-none");
  //     $(".juduloy").css("display", "none");
  //     $(".side-icon").css("display", "none");
  //     $(".list-item").css("display", "none");
  //     $(".mama").css("display", "none");
  //   } else if (screenWidth <= 850) {
  //     kurangi = 60;
  //     $(".side").removeClass("shide");
  //     $(".sides").removeClass("shide");
  //     $(".side").addClass("hide");
  //     $(".sides").addClass("hide");
  //     $(".guting").addClass("flex-row");
  //     $(".guting").removeClass("flex-column");
  //     $(".guting").addClass("my-2");
  //     $(".guting").removeClass("my-3");
  //     $(".sidegtg").addClass("flex-row");
  //     $(".sidegtg").removeClass("flex-column");
  //     $(".sidegtg").removeClass("my-1");
  //     $(".isi").addClass("w-75");
  //     $(".isi").removeClass("w-100");
  //     $(".gutang .isi").removeClass("w-50");
  //     $(".gutang .isi").addClass("w-75");
  //     $(".reform").removeClass("w-100");
  //     $(".name").addClass("w-25");
  //     $(".name").removeClass("w-100");
  //     $(".gutang .name").removeClass("w-50");
  //     $(".gutang .name").addClass("w-25");
  //     $(".special").removeClass("flex-fill");
  //     $(".usera").addClass("d-none");
  //     $(".menura").removeClass("d-none");
  //     $(".side-icon").css("display", "inline");
  //     $(".list-item").css("display", "flex");
  //     $(".mama").css("display", "inline");
  //     $(".juduloy").css("display", "none");
  //   } else {
  //     kurangi = 200;
  //     $(".exit-mark").css("display", "none");
  //     $(".side").removeClass("hide");
  //     $(".sides").removeClass("hide");
  //     $(".guting").addClass("flex-row");
  //     $(".guting").removeClass("flex-column");
  //     $(".guting").addClass("my-2");
  //     $(".guting").removeClass("my-3");
  //     $(".sidegtg").addClass("flex-row");
  //     $(".sidegtg").removeClass("flex-column");
  //     $(".sidegtg").removeClass("my-1");
  //     $(".special").removeClass("flex-fill");
  //     $(".reform").removeClass("w-100");
  //     $(".gutang .isi").removeClass("w-50");
  //     $(".gutang .isi").addClass("w-75");
  //     $(".gutang .name").removeClass("w-50");
  //     $(".gutang .name").addClass("w-25");
  //     $(".isi").addClass("w-75");
  //     $(".isi").removeClass("w-100");
  //     $(".name").addClass("w-25");
  //     $(".name").removeClass("w-100");
  //     $(".side").removeClass("shide");
  //     $(".sides").removeClass("shide");
  //     $(".usera").removeClass("d-none");
  //     $(".menura").addClass("d-none");
  //     $(".side-icon").css("display", "inline");
  //     $(".list-item").css("display", "flex");
  //     $(".mama").css("display", "inline");
  //     $(".juduloy").css("display", "inline");
  //   }

  //   let divWidth = $(".side-main").width();
  //   console.log(divWidth);
  //   $(".top-head").css("width", divWidth);
  // }
});
