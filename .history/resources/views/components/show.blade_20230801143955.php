<script>
  $(function() {
    $("#button").bind("click",function() {
      var month;
      month = $("#month").val();
      re = new RegExp(month);

        $("#data tbody tr").each(function() {
          varv txt = $(this).find("td").text();
          if(txt.match(re) != null) {
            $(this).show();
          } else {
            $(this).hide();
          }
        });
    });
  })
<form action="get" action="">
    <div>
      <select id="month" name="">
        <option value="">月を選択</option>
        <option value="1">1月</option>
        <option value="2">2月</option>
        <option value="3">3月</option>
        <option value="4">4月</option>
        <option value="5">5月</option>
        <option value="6">6月</option>
        <option value="7">7月</option>
        <option value="8">8月</option>
        <option value="9">9月</option>
        <option value="10">10月</option>
        <option value="11">11月</option>
        <option value="12">12月</option>
      </select>
      <input type="button" value="絞りこむ" id="button"></button>
      <input type="button" value="全て表示" id="button2">
      <button>
        <a href="{{ route('posts.show') }}" class="text-white">クリア</a>
    </div>
    