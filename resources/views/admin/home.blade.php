@extends('admin.main')

@section('content')
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>{{ $totalInvoices }}</h3>

              <p>Order</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="admin/orders/list" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>{{ $totalProducts }}</h3>

              <p>Product</p>
            </div>
            <div class="icon">
              <i class="ion ion-cube"></i>
            </div>
            <a href="admin/products/list" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>{{ $totalUsers }}</h3>

              <p>User Registrations</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="admin/users/list" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>{{ $totalComments }}</h3>

              <p>Comment</p>
            </div>
            <div class="icon">
              <i class="ion ion-chatbox"></i>
            </div>
            <a href="admin/comments/list" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>

       <!-- Custom tabs (Charts with tabs)-->
       <div class="card">
        <div class="card-header">
          <h3 class="card-title">
            <i class="fas fa-chart-pie mr-1"></i>
            Statistical
          </h3>
          <div class="card-tools">
          </div>
            </div><!-- /.card-header -->
            <div class="card-body">
                <div class="tab-content p-0">
                    <!-- Bar Chart - Total Invoices and Total Users -->
                    <div class="chart tab-pane active" id="bar-chart" style="position: relative; width: 1200px; height: 500px;">
                        <canvas id="bar-chart-canvas" height="500" style="width: 100%; height: 100%;"></canvas>
                    </div>
                </div>
            </div>
      </div>
      <!-- /.card -->

      <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Lấy dữ liệu từ PHP
            var totalInvoices = {{ $totalInvoices }};
            var totalUsers = {{ $totalUsers }};
            var totalProducts = {{ $totalProducts }};
            var totalComments = {{ $totalComments }};

            // Lấy thẻ canvas và context
            var ctx = document.getElementById('bar-chart-canvas').getContext('2d');

            // Tạo biểu đồ cột
            var barChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Total Invoices', 'Total Users', 'Total Products', 'Total Comments'],
                    datasets: [{
                        label: 'Quantity',
                        data: [totalInvoices, totalUsers, totalProducts, totalComments],
                        backgroundColor: [
                            'rgba(75, 192, 192, 0.2)', // Màu nền cho dữ liệu tổng hóa đơn
                            'rgba(255, 99, 132, 0.2)',  // Màu nền cho dữ liệu số account
                            'rgba(255, 205, 86, 0.2)', // Màu nền cho dữ liệu tổng product
                            'rgba(54, 162, 235, 0.2)'  // Màu nền cho dữ liệu tổng comment
                        ],
                        borderColor: [
                            'rgba(75, 192, 192, 1)',   // Màu đường viền cho dữ liệu tổng hóa đơn
                            'rgba(255, 99, 132, 1)',    // Màu đường viền cho dữ liệu số account
                            'rgba(255, 205, 86, 1)',   // Màu đường viền cho dữ liệu tổng product
                            'rgba(54, 162, 235, 1)'    // Màu đường viền cho dữ liệu tổng comment
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>

@endsection()
