<script>
  var arr = [
    {cd:"", label:"▼カテゴリー"},
    {cd:"1", label:"食費"},
    {cd:"2", label:"住宅費"},
    {cd:"3", label:"光熱費"},
    {cd:"4", label:"日用品"},
    {cd:"5", label:"交際費"},
    {cd:"6", label:"交通費"},
    {cd:"7", label:"通信費"},
    {cd:"8", label:"娯楽費"},
    {cd:"9", label:"医療費"},
    {cd:"10", label:"教養・教育費"},
    {cd:"11", label:"衣服・美容費"},
    {cd:"12", label:"特別な支出"},
    {cd:"13", label:"雑費・その他"},
  ];

  var arrFood = [
    {cd:"", label:"▼項目選択"},
    {cd:"1", label:"食料品"},
    {cd:"2", label:"外食"},
    {cd:"3", label:"カフェ"},
    {cd:"4", label:"その他食費"},
  ];
 
  var arrHome = [
    {cd:"", label:"▼項目選択"},
    {cd:"1", label:"家賃"},
    {cd:"2", label:"地震・火災保険"},
    {cd:"3", label:"その他住宅費"},
  ];

  var arrEnergy = [
    {cd:"", label:"▼項目選択"},
    {cd:"1", label:"電気代"},
    {cd:"2", label:"水道代"},
    {cd:"3", label:"ガス代"},
  ];

  var arrDaily = [
    {cd:"", label:"▼項目選択"},
    {cd:"1", label:"ドラッグストア"},
    {cd:"2", label:"その他日用品"},
  ];
      
  var arrDate = [
    {cd:"", label:"▼項目選択"},
    {cd:"1", label:"飲み会"},
    {cd:"2", label:"プレゼント代"},
    {cd:"3", label:"交際費"},
    {cd:"4", label:"冠婚葬祭"},
    {cd:"5", label:"その他交際費"},
  ];

  var arrTraffic = [
    {cd:"", label:"▼項目選択"},
    {cd:"1", label:"電車"},
    {cd:"2", label:"バス"},
    {cd:"3", label:"タクシー"},
    {cd:"4", label:"飛行機"},
    {cd:"5", label:"その他交通費"},
  ];
        
  var arrTelecommunication = [
    {cd:"", label:"▼項目選択"},
    {cd:"1", label:"携帯電話"},
    {cd:"2", label:"インターネット"},
    {cd:"3", label:"固定電話"},
    {cd:"4", label:"放送視聴料"},
    {cd:"5", label:"宅配便"},
  ];

  var arrFavorite = [
    {cd:"", label:"▼項目選択"}, 
    {cd:"1", label:"本"},
    {cd:"2", label:"CD"},
    {cd:"3", label:"Blu-ray"},
    {cd:"4", label:"映画"},
    {cd:"5", label:"アウトドア"},
    {cd:"6", label:"旅行"},
    {cd:"7", label:"秘密の趣味"},
    {cd:"8", label:"その他娯楽費"},
  ];

  var arrMedical = [
    {cd:"", label:"▼項目選択"},
    {cd:"1", label:"医療費"},
    {cd:"2", label:"薬"},
    {cd:"3", label:"その他医療費"},
  ];

  var arrEducation = [
    {cd:"", label:"▼項目選択"},
    {cd:"1", label:"書籍"},
    {cd:"2", label:"習い事"},
    {cd:"3", label:"学費"},
    {cd:"4", label:"その他教養・教育費"},
  ];

  var arrFashion = [
    {cd:"", label:"▼項目選択"},
    {cd:"1", label:"服"},
    {cd:"2", label:"靴"},
    {cd:"3", label:"クリーニング"},
    {cd:"4", label:"美容院・エステ"},
    {cd:"5", label:"化粧品"},
    {cd:"6", label:"アクセサリー"},
    {cd:"7", label:"その他衣服・美容費"},
  ];

  var arrSpecial = [
    {cd:"", label:"▼項目選択"},
    {cd:"1", label:"家電"},
    {cd:"2", label:"家具"},
    {cd:"3", label:"その他特別な支出"},
  ];

  var arrUnclassified = [
    {cd:"", label:"▼項目選択"},
    {cd:"1", label:"雑費"},
    {cd:"2", label:"寄付金"},
    {cd:"3", label:"仕送り"},
    {cd:"4", label:"用途不明金"},
  ];

  window.onload = function(){
    for(var i=0;i<arr.length; i++){
      let op = document.createElement("option");
      op.value = arr[i].cd;
      op.text = arr[i].label;
      document.getElementById('category').appendChild(op);
    }
  }

  function category(obj){
    var targetArr;
    if(obj.value == "1"){
      targetArr = arrFood;
    } else if(obj.value == "2") {
      targetArr = arrHome;
    } else if(obj.value == "3") {
      targetArr = arrEnergy;
    } else if(obj.value == "4") {
      targetArr = arrDaily;
    } else if(obj.value == "5") {
      targetArr = arrDate;
    } else if(obj.value == "6") {
      targetArr = arrTraffic
    } else if(obj.value == "7") {
      targetArr = arrTelecommunication
    } else if(obj.value == "8") {
      targetArr = arrFavorite
    } else if(obj.value == "9") {
      targetArr = arrMedical
    } else if(obj.value == "10") {
      targetArr = arrEducation
    } else if(obj.value == "11") {
      targetArr = arrSFation
    } else if(obj.value == "12") {
      targetArr = arrSpecial
    } else if(obj.value == "13") {
      targetArr = arrUnclassified
    } else {
      targetArr = new Array();
    }
    var selObj = document.getElementById('subject');
    while(selObj.lastChild){
      selObj.removeChild(selObj.lastChild);
    }
    for(var i=0;i<targetArr.length;i++){
      let op = document.createElement("option");
      op.value = targetArr[i].cd;
      op.text = targetArr[i].label;
      selObj.appendChild(op);
    }
  }
</script>

<body>
  <select id="category" onchange="category(this);">
  <select id="subject"></select>
</body>