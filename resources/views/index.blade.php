@extends('layouts/mainLayout')
@section('content')
  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

      <div class="carousel-inner" role="listbox">

        <!-- Slide 1 -->
        <div class="carousel-item active" style="background-image: url(assets/img/slide/SWM.png);">
          <div class="carousel-container">
            <div class="carousel-content animate__animated animate__fadeInUp">
              <h2>Welcome to <span>Wall-E Site</span></h2>
              <p>Website Wall-E merupakan sebuah website yang berkolaborasi dengan perangkat IoT. Web ini digunakan untuk memonitoring volume tiap tempat sampah serta truk yang sedang beroperasi</p>
              <div class="text-center"><a href="" class="btn-get-started">Read More</a></div>
            </div>
          </div>
        </div>


      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
      </a>

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Us Section ======= -->
    <section id="about-us" class="about-us">
      <div class="container" data-aos="fade-up">

        <div class="row content mt-5">
          <div class="col-lg-6 " data-aos="fade-right">
            <div>
                <select class="form-select-sm" name="month" id="month" onchange="changeMonth(this.value)">
                    <option value="1">January</option>
                    <option value="2">February</option>
                    <option value="3">March</option>
                    <option value="4">April</option>
                    <option value="5">May</option>
                    <option value="6">June</option>
                    <option value="7">July</option>
                    <option value="8">August</option>
                    <option value="9">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                </select>
            </div>
                <div id="chart" style="height: 300px;"></div>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0" data-aos="fade-left">
            <div>
                <select class="form-select-sm" name="binName" id="binName" onchange="changeBin(this.value)">
                    <option value="1">Trash-Bin-1</option>
                    <option value="2">Esp_test</option>
                    <option value="3">Trash-Bin1-ESP</option>
                </select>
            </div>

            <div id="chart2" style="height: 300px;"></div>
          </div>
        </div>
      </div>
    </section><!-- End About Us Section -->

  </main><!-- End #main -->
  <!-- Charting library -->
  <script src="https://unpkg.com/chart.js@2.9.3/dist/Chart.js"></script>
  <!-- Chartisan -->
  <script src="https://unpkg.com/@chartisan/chartjs@^2.1.0/dist/chartisan_chartjs.umd.js"></script>
  <!-- Your application script -->
  <script>
      var date = new Date();
      var month = date.getMonth()+1;
      console.log(month);
      document.getElementById('month').value = month;
      binName = 1;
      document.getElementById('binName').value = binName;

      const graph = new Chartisan({
          el: '#chart',
          url: "@chart('my_2ndchart')"+ "?month="+month,
          hooks: new ChartisanHooks()
              .beginAtZero()
              .colors()
              .datasets('bar'),
      })

        const graph2 = new Chartisan({
            el: '#chart2',
            // url: "@chart('my_chart')"+ "?month="+month,
            // url: "@chart('my_chart')"+ "?binName="+binName,
            url: "@chart('my_chart')"+ "?month="+month+"&binName="+binName,
            hooks: new ChartisanHooks()
                .beginAtZero()
                .colors()
                // .datasets('bar'),
                .datasets([{
                    type: 'line',
                    fill: false,
                    borderColor: "#FF0000",
                    tension: 0.1
                }]),
        })

        function changeMonth(month) {
            graph.update({ url: "@chart('my_2ndchart')"+ "?month="+month});
            graph2.update({ url: "@chart('my_chart')"+ "?month="+month+"&binName="+binName})
        }

        function changeBin(binName) {
            graph2.update({ url: "@chart('my_chart')"+ "?month="+month+"&binName="+binName})
            // graph.update({ url: "@chart('my_chart')"+ "?binName="+binName})
        }
    </script>

@endSection
