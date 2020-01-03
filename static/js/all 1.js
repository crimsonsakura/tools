// map
function initMap() {
  var map = new google.maps.Map(document.getElementById("map"), {
    zoom: 11,
    center: {
      lat: 23,
      lng: 120.3
    }
  });
  var marker = new google.maps.Marker({
    position: { lat: 23, lng: 120.3 },
    map: map
  });
  let contentString = "假設的使用者目前位置";
  let infowindow = new google.maps.InfoWindow({
    content: contentString
  });
  infowindow.open(map, marker);
  marker.addListener("click", function() {
    infowindow.open(map, marker);
  });
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var pos = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
      };
      let icon_path = "static/img/";
      let icons = {
        pin: {
          name: "pin",
          icon: icon_path + "pin.png"
        }
      };
      var marker = new google.maps.Marker({
        position: pos,
        icon: icons.pin.icon,
        map: map
      });
      map.setZoom(14);
      map.setCenter(pos);
      let contentString = "<p class='h6' style='color:red;'>您的位置</p>";
      let infowindow = new google.maps.InfoWindow({
        content: contentString
      });
      infowindow.open(map, marker);
      marker.addListener("click", function() {
        infowindow.open(map, marker);
      });
    });

    let geocoder = new google.maps.Geocoder();

    window.onload = function() {
      geocodeAddress(geocoder, map);
    };
  } else {
    // Browser doesn't support Geolocation
    alert("未允許或遭遇錯誤！");
  }
}
function geocodeAddress(geocoder, resultsMap) {
  var locationArray = [];

  let icon_path = "static/img/";
  let icons = {
    tool: {
      name: "tool",
      icon: icon_path + "toolicon.png"
    }
  };
  for (let i = 0; i < allOrder.length; i++) {
    let address = allOrder[i].allAddress;
    geocoder.geocode(
      {
        address: address
      },
      function(results, status) {
        if (status === "OK") {
          let lat = results[0].geometry.location.lat();
          let lng = results[0].geometry.location.lng();
          locationArray.push([lat, lng]);
          // resultsMap.setCenter(results[0].geometry.location);
          let marker = new google.maps.Marker({
            map: resultsMap,
            icon: icons.tool.icon,
            position: results[0].geometry.location
          });
          let contentString =
            "<ul class='list-unstyled'><li class='h2 text-center'>" +
            allOrder[i].orderTitle +
            "</li><br><li><img class='img-thumbnail img-fluid' style=' max-width:100%;,height:auto;' src='static/img/" +
            allOrder[i].orderImg +
            "'></li><br><li class='text-center'><a class='btn btn-primary drop-shadow' href='product_order.php?order_id=" +
            allOrder[i].orderId +
            "'>查看更多</a></li></ul>";
          let infowindow = new google.maps.InfoWindow({
            content: contentString
          });
          marker.addListener("click", function() {
            infowindow.open(map, marker);
          });
        } else {
          // alert('Geocode was not successful for the following reason: ' + status);
        }
      }
    );
  }
}
// index顯示
var guide = [
  "<p>您可使用「首頁」或「搜尋結果頁」的搜尋列進行工具搜尋<br><br><img src='static/img/guide.gif' class='img-fluid guideimg img-thumbnail'><br><br>點擊任一處進行下一步</p>",
  "<p>搜尋列可使用「下拉式選單」選擇搜尋「工具類別」<br><br><img src='static/img/guide_class.gif' class='img-fluid guideimg img-thumbnail'><br><br>點擊任一處進行下一步</p>",
  "<p>也可輸入「關鍵字」進行關鍵字搜尋<br><br><img src='static/img/guide_keyword.gif' class='img-fluid guideimg img-thumbnail'><br><br>點擊任一處進行下一步</p>",
  "<p>您也可以以上「兩種皆使用進行交叉比對搜尋」<br><br><img src='static/img/guide_btw.gif' class='img-fluid guideimg img-thumbnail'><br><br>點擊任一處進行下一步</p>",
  "<p>若皆無選擇將進行所有商品之搜尋<br><img src='static/img/guide_all.gif' class='img-fluid guideimg img-thumbnail'><br><br>點擊任一處進行下一步</p>",
  "<p>導覽結束，請點擊任一處離開導覽</p>"
];

$(document).ready(function() {
  let i = 0;
  $(".guide").click(function(e) {
    e.preventDefault();
    if (i > 5) {
      $(".guide").remove();
    } else if (i == 0) {
      $(".guide-content")
        .empty()
        .prepend(guide[i]);
    } else {
      $(".guide-content")
        .empty(guide[i - 1])
        .prepend(guide[i]);
    }
    i += 1;
  });
});
var signupStopSub = document.querySelector("#signupStopSub");
signupStopSub.addEventListener("click", function(e) {
  e.preventDefault();
  if (signupFrom.user_mail.value == "") {
    alert("未輸入信箱");
  } else if (signupFrom.user_pass.value == "") {
    alert("未輸入密碼");
  } else if (
    signupFrom.user_pass.value.length > 16 ||
    signupFrom.user_pass.value.length < 8
  ) {
    alert("密碼請介於16到8字元間");
  } else if (signupFrom.user_nick.value == "") {
    alert("未輸入暱稱");
  } else if (signupFrom.user_phone.value == "") {
    alert("未輸入通訊電話");
  } else if (signupFrom.user_name.value == "") {
    alert("未輸入真實姓名");
  } else if (signupFrom.user_address.value == "") {
    alert("未輸入通訊地址");
  } else signupFrom.submit();
});
