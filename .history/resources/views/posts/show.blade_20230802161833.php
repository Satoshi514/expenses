@extends('layouts.app')

@section('content')

<h1 class="detail">支出詳細</h1>

<a href = " {{ route('posts.create') }}" class="btn btn-info text-white ml-10">新規登録</a


  <div id="app" class="container">
    <div class="row">
    <div class="col-md-6">
        
  
    <!--円グラフを表示するキャンバス -->
     <canvas id="myChart" width="400" height="400"></canvas>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
     
    <div class="form-group col-md-5"> 
      <label for="year">年</label>
      <select class="form-control" v-model="year" @change="getOutgos">
        <option v-for="year in years" :value="year">@{{ year }} 年</option>
      </select>
    </div>
    
     <div class="form-group mt-2 col-md-5">
       <label for="month">月</label>
       <select class="form-control" v-model="month" @change="getOutgos">
          <option v-for="month in months" :key="month" :value="month">@{{ month }} 月</option>
       </select>
     </div>
    </div>  

    <div class=col-md-5>
      <h2>支出明細</h2>
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<script>
$(function() {
    $("#button").bind("click",function() {
      var month;
      month = $("#month").val();
      re = new RegExp(month);

        $("#data tbody tr").each(function() {
          var txt = $(this).find("td:eq(3)").text();
          if(txt.match(re) != null) {
            $(this).show();
          } else {
            $(this).hide();
          }
        });
    });

  $("#button2").bind("click",function(){
    $("#data tr").show();
  });
});
</script>

<div class="search-area">
  <div>
    Sort By
    @sortablelink('year','年')
  </div>
    <form action="get" action="">
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
      <input type="button" value="絞りこむ" id="button">
      <input type="button" value="全て表示" id="button2">
    </form>
  </div>
    
      
      <table id = "data" border="0" cellspacing="0"class="table table-striped">
      <thead>
        <tr>
          <th class="col-xs-1 col-ma-1 col-lg-1">カテゴリー</th>
          <th class="col-xs-1 col-ma-1 col-lg-1">項目</th>
          <th class="col-xs-1 col-ma-1 col-lg-1">年</th>
          <th class="col-xs-1 col-ma-1 col-lg-1">月</th>
          <th class="col-xs-1 col-ma-1 col-lg-1">日</th>
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
          <td class="col-xs-1 col ma-1 col-lg-1">{{ $outgo->day }}
          <td class="col-xs-1 col-ma-1 col-lg-1"> {{ $outgo->amount }}</td>
          <td class="col-xs-1 col-ma-1 col-lg-1"><a href="{{ route('posts.edit') }}" class="btn btn-info">編集</a></td>
        <form action="{{ Route('posts.destroy,$outgo) }}" method="post">
          @csrf
          @method('delete')
          <td class="col-xs-1 col-ma-1 col-lg-1"><button type="submit" class="btn btn-danger">削除</button>
        </form>
        </tr>
        @endforeach
      </tbody>
    </table>
    {{ $outgos->links() }}
    </div>
  
    <form action="{{ Route('posts.destroy,$outgo) }}" method="post">
          @csrf
          @method('delete')
          <td class="col-xs-1 col-ma-1 col-lg-1"><button type="submit" class="btn btn-danger">削除</button>
        </form>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.11"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.15/lodash.min.js"></script>
    <script>
  
  new Vue({
  el: '#app',
  data: {
      outgo: [],
      year: '{{ date('Y') }}',
      years: [],
      month: '{{ date('m') }}',
      months: [],
      chart: null
  },
    
  methods: {
     getYear() {

      //支出年リストを習得
      fetch('/expenses/public/ajax/posts/years')
           .then(response => response.json())
           .then(data => this.years = data);
     },

     getUTCMonth() {

        // 支出月リストを取得
        fetch('/expenses/public/ajax/posts/months')
             .then(response => response.json())
             .then(data => this.months = data);
     },
   
    getOutgos() {
     // 支出データを取得
     fetch('/expenses/public/ajax/outgos?month='+ this.month)
          .then(response => response.json())
          .then(data => {
              if(this.chart) { // チャートが存在していれば初期化

                 this.chart.destroy();

              }

     // lodashでデータを加工
               const groupedOutgos = _.groupBy(data, 'major_subject_name'); // 項目ごとにグループ化
               const amounts = _.map(groupedOutgos, subjectOutgos => {

                 return _.sumBy(subjectOutgos, 'amount'); // 金額合計

              });
               const subjectNames = _.keys(groupedOutgos); 
   
              const ctx = document.getElementById("myChart").getContext("2d");
              this.chart = new Chart(ctx, {
    type: 'pie',
    data: { 
        datasets: [{
            data: amounts,
            backgroundColor: [
                'rgb(255, 99, 132)',
                'rgb(255, 159, 64)',
                'rgb(255, 205, 86)',
                'rgb(75, 192, 192)',
                'rgb(54, 162, 235)',
                'rgb(153, 102, 255)',
                'rgb(201, 203, 207)'
            ]
        }],
        labels: subjectNames
    },
        options: {
            title: {
                display: true,
                fontsize: 60,
                text: '支出統計'
            },
        }
     });

    });

   }
  },
  mounted() {
  
  this.getYear();
  this.getUTCMonth();
  this.getOutgos();  
  }
});
</script>
           
@endsection

