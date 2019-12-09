// map
function initMap() {
  // 某點經緯度
  var orderXY = {
    lat: 23.219835,
    lng: 120.328806
  };
  //
  var map = new google.maps.Map(document.getElementById("map"), {
    zoom: 16, //設定map預設區域大小
    center: orderXY //初始化中心點
  });
  //抓取自定義icon
  var icon_path = "static/img/";
  var icons = {
    tool: {
      name: "tool",
      icon: icon_path + "toolicon.png"
    }
  };
  //設定標記
  var marker = new google.maps.Marker({
    position: {
      lat: 23.219835,
      lng: 120.328806
    }, //marker的放置位置
    map: map, //map指的是上面map變數
    icon: icons.tool.icon, //改變icon
    title: "小明的位置" //說明文字(選擇性填寫)
  });
  var marker = new google.maps.Marker({
    position: {
      lat: 23.219737,
      lng: 120.329557
    }, //marker的放置位置
    map: map, //map指的是上面map變數
    icon: icons.tool.icon, //改變icon
    title: "小明的位置" //說明文字(選擇性填寫)
  });
}

// index顯示
var guide = [
  "您可使用「首頁」或「搜尋結果頁」的搜尋列進行工具搜尋<br><br><img src='static/img/guide.gif' class='img-fluid guideimg img-thumbnail'><br><br>點擊任一處進行下一步",
  "搜尋列可使用「下拉式選單」選擇搜尋「工具類別」<br><br><img src='static/img/guide_class.gif' class='img-fluid guideimg img-thumbnail'><br><br>點擊任一處進行下一步",
  "也可輸入「關鍵字」進行關鍵字搜尋<br><br><img src='static/img/guide_keyword.gif' class='img-fluid guideimg img-thumbnail'><br><br>點擊任一處進行下一步",
  "您也可以以上「兩種皆使用進行交叉比對搜尋」<br><br><img src='static/img/guide_btw.gif' class='img-fluid guideimg img-thumbnail'><br><br>點擊任一處進行下一步",
  "若皆無選擇將進行所有商品之搜尋<br><img src='static/img/guide_all.gif' class='img-fluid guideimg img-thumbnail'><br><br>點擊任一處進行下一步",
  "導覽結束，請點擊任一處離開導覽"
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
