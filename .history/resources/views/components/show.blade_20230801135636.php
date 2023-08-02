<script>
  $(function()) {
    $("#button").bind("click",function()) {
      var month;
      month = $("#month").val();
      re = new RegExp(month);
    }
  }
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
    <table class="table table-striped">
      <h2>支出明細</h2>
      <thead>
        <tr>
          <th class="col-xs-1 col-ma-1 col-lg-1">カテゴリー</th>
          <th class="col-xs-1 col-ma-1 col-lg-1">項目</th>
          <th class="col-xs-1 col-ma-1 col-lg-1">年</th>
          <th class="col-xs-1 col-ma-1 col-lg-1">月</th>
          <th class="col-xs-1 col-ma-1 col-lg-1">金額</th>
        </tr>
      </thead>
      <tbody>
        @foreach($outgos as $outgo)
        <tr>
          <td class="col-xs-1 col-ma-1 col-lg-1">{{ $outgo->major_subject_name }}</td>
          <td class="col-xs-1 col-ma-1 col-lg-1">{{ $outgo->subject }}</td>
          <td class="col-xs-1 col-ma-1 col-lg-1">{{ $outgo->year }}</td>
          <td class="col-xs-1 col-ma-1 col-lg-1">{{ $outgo->month }}</td>
          <td class="col-xs-1 col-ma-1 col-lg-1"> {{ $outgo->amount }}</td>
          <td class="col-xs-1 col-ma-1 col-lg-1"><a href="{{ route('posts.edit') }}" class="btn btn-info">編集</a></td>
        </tr>
        @endforeach
      </tbody>
    </table>
    </div>
    {{ $outgos->appends(request()->query())->links() }}
  
   
