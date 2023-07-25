@extends('layouts.app')

@section('content')

<a href = " {{ route('posts.create') }}" class="btn btn-info text-white ml-10">新規登録</a


  <div id="app" class="container p-3">
  
    <!--円グラフを表示するキャンバス -->
     <canvas id="myChart" width="400" height="400"></canvas>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
 
     <div class="form-group">
       <label for="month">月</label>
       <select class="form-control" v-model="month" @change="getOutgos">
          <option v-for="month in months" :key="month" :value="month">@{{ month }} 月</option>
       </select>
     </div>
  </div>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.11"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.15/lodash.min.js"></script>
 <script>

            new Vue({
            el: '#app',
            data: {
                outgo: [],
                month: '{{ date('m') }}',
                months: [],
                chart: null
            },
    
    methods: {
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
                fontsize: 45,
                text: '支出統計'
            },
            /*tooltips: {
                callbacks: {
                    label(tooltipItem,data) {

                        const dataseshow = tootipItem.datasetShow;
                        const show = tooltipItem.show;
                        const amount = data.datasets[datasetShow].data[show];
                        const amountText = amount.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
                        const subjectName = data.labels[show];
                        return ' '+ subjectName +' '+amountText +' 円';
                    }
                  }
              }*/
            }
        });

    });

    }
  },
  mounted() {

  this.getUTCMonth();
  this.getOutgos();  
  }
});
</script>
           
<table class="subject-detail">
  <thead>
     <tr>
       <th>支出詳細</th>
       <th>合計</th>
     </tr>
  </thead>
  <tbody>
     @foreach($outgos as $outgo)
     <tr>
        <td>{{ $outgo->major_subject_name}}</td>
        <td>¥{{ $outgo->amount }}</td>
     </tr>
     @endforeach
  </tbody>
</table>

  <footer>
    <p class="copyright">&copy; 家計簿アプリ　All rights reserved.</p>
  </footer>
@endsection

