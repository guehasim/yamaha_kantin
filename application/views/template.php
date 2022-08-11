<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Yamaha</title>

    <!-- Bootstrap 4.0-->
    <link
      rel="stylesheet"
      href="<?= base_url('assets') ?>/vendor_components/bootstrap/dist/css/bootstrap.min.css"
    />

    <!-- Bootstrap extend-->
    <!-- <link rel="stylesheet" href="<?= base_url('assets') ?>/css/bootstrap-extend.css"> -->

    <!-- Theme style -->
    <link
      rel="stylesheet"
      href="<?=base_url('assets')?>/css/master_style.css"
    />
    <link
      rel="stylesheet"
      href="<?=base_url('assets')?>/css/style_bootstrap.css"
    />

    <!-- skins -->
    <!-- <link rel="stylesheet" href="<?= base_url('assets') ?>/css/skins/_all-skins.css"> -->

    <!-- main-nav -->
    <!-- <link href="<?= base_url('assets') ?>/css/main-nav.css" rel="stylesheet" /> -->

    <!-- bootstrap datepicker -->
    <link
      rel="stylesheet"
      href="<?= base_url('assets') ?>/vendor_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css"
    />

    <!-- toast CSS -->
    <link
      href="<?= base_url('assets') ?>/vendor_components/jquery-toast-plugin-master/src/jquery.toast.css"
      rel="stylesheet"
    />
  </head>

  <?php if ($this->uri->segment(1) == 'home' || $this->uri->segment(1) == '') { ?>
    <body class="hold-transition bg-img" style="background-image: url(<?=base_url('assets')?>/images/bg.jpg)" data-overlay="6">
  <?php }else { ?>
    <body class="hold-transition bg-img">
  <?php } ?>

    <div class="home-ui">
      <nav class="navbar navbar-light navbar-title bg-light">
        <div class="button-and-calendar">
          <button type="button" id="sidebarCollapse" class="navbar-btn">
            <span></span>
            <span></span>
            <span></span>
          </button>
          <?php if ($this->uri->segment(1) == 'dashboard') : ?>
            <form action="<?=site_url('dashboard')?>" method="POST" id="form_date">
              <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
              <div class="input-group ml-2 datefilter">
                <select name="tahun" id="" class="form-control filtertgl">
                  <?php 
                    for ($i=date('Y'); $i >= 2010; $i--) { 
                      echo '<option value="'.$i.'" '.(!empty($tahun) ? ($tahun == $i ? 'selected="selected"' : '') : '').'>'.$i.'</option>';
                    }
                  ?>
                </select>
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </form>
          <?php endif; ?>
        </div>
        <h1 class="navbar-brand mb-0 h1 text-uppercase" style="white-space: inherit !important;">
          <?=(!empty($title) ? $title : 'Pengecekan LUX Meter')?>
        </h1>
      </nav>
      <div class="wrapper">
        <!-- Sidebar Holder -->
        <nav id="sidebar">
          <div class="sidebar-header">
            <img
              src="<?=base_url('assets/images/logo_putih.png')?>"
              alt=""
              height="40"
            />
          </div>

          <ul class="list-unstyled components">
            <li
              class="<?=$this->uri->segment(1) == 'home'? 'active' : ''?>"
            >
              <a href="<?=site_url('home')?>">Home</a>
            </li>
            <li
              class="<?=$this->uri->segment(1) == 'dashboard'? 'active' : ''?>"
            >
              <a href="<?=site_url('dashboard')?>">Dashboard</a>
            </li>
          </ul>
        </nav>

        <!-- Page Content Holder -->
        <div id="content" class="home-page">
          <?php
            if (!empty($content)) {
                $this->load->view($content);
            } else {
                $this->load->view('home/index');
            } 
          ?>
        </div>
      </div>
    </div>

    <!-- jQuery 3 -->
    <script src="<?= base_url('assets') ?>/vendor_components/jquery-3.3.1/jquery-3.3.1.js"></script>

    <!-- popper -->
    <script src="<?= base_url('assets') ?>/vendor_components/popper/dist/popper.min.js"></script>

    <!-- Bootstrap 4.0-->
    <script src="<?= base_url('assets') ?>/vendor_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- toast -->
    <script src="<?= base_url('assets') ?>/vendor_components/jquery-toast-plugin-master/src/jquery.toast.js"></script>

    <!-- bootstrap datepicker -->
    <script src="<?= base_url('assets') ?>/vendor_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

    <!-- Chart JS -->
    <script src="<?=base_url('assets')?>/vendor_plugins/chartjs/chart.js"></script>

    <!-- Autocomplete -->
    <link
      rel="stylesheet"
      href="<?=base_url('assets')?>/vendor_plugins/autocomplete/jquery-ui.css"
    />
    <script src="<?=base_url('assets')?>/vendor_plugins/autocomplete/jquery-ui.js"></script>

    <script src="<?=base_url('assets')?>/js/jquery-datatable/jquery.dataTables.js"></script>
  <script src="<?=base_url('assets')?>/js/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>

  
  <!-- <script src="https://cdn.datatables.net/plug-ins/1.10.21/pagination/input.js"></script> -->
  <script src="<?=base_url('assets')?>/js/custom.js"></script>


    <!-- JQuery Validate -->
    <script src="<?= base_url('assets') ?>/vendor_components/jquery-validation-1.17.0/dist/jquery.validate.min.js"></script>
    <!-- This is data table -->
    <script type="text/javascript">
      window.siteUrl = '<?=site_url()?>';
    </script>

    <script type="text/javascript">
      $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
          $('#sidebar').toggleClass('active');
          $(this).toggleClass('active');
        });

        var notif = '<?= get_notif() ?>';

        if (notif != '') {
          notif = notif.split('#');
          switch (notif[0]) {
            case 'info':
              buildNotif('warning', notif[1]);
              break;
            case 'success':
              buildNotif('success', notif[1]);
              break;
            case 'error':
              buildNotif('error', notif[1]);
              break;
          }
        }

        function buildNotif(colorName, text) {
          $.toast({
            heading: 'Notifications',
            text: text,
            position: 'top-right',
            loaderBg: '#ff6849',
            icon: colorName,
            hideAfter: 3500,
            stack: 6,
          });
        }

        $('.datepickerhome').datepicker({
          autoclose: true,
          dateFormat: 'dd/mm/yy',
        });
      });
    </script>

    <script type="text/javascript">
      $(document).ready(function() {
          localStorage.clear();
          if (document.getElementById('chartSurvey')) {
              let datasets   = JSON.parse('<?=json_encode((!empty($statistik) ? $statistik : []))?>');
              

              const data = {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agust', 'Sept', 'Nov', 'Des'],
                datasets: datasets
              };

              const config = {
                type: 'line',
                data: data,
                options: {
                  maintainAspectRatio: false,
                  plugins: {
                    legend: {
                      position: 'bottom',
                    },
                    title: {
                      display: false,
                    }
                  },
                  scales: {
                    x: {  // <-- axis is not array anymore, unlike before in v2.x: '[{'
                        grid: {
                          color: '#ffffff14',
                          borderColor: 'green'  // <-- this line is answer to initial question
                        },
                        ticks: {
                          color: "#fff", // this here
                        }
                    },
                    y: {  // <-- axis is not array anymore, unlike before in v2.x: '[{'
                        grid: {
                          color: '#ffffff14',
                          borderColor: 'green'  // <-- this line is answer to initial question
                        },
                        ticks: {
                          color: "#fff", // this here
                        }
                    }
                  },
                  plugins: {
                    legend: {
                        display: true,
                        labels: {
                            color: '#fff'
                        }
                    }
                  },
                  elements: {
                    line: {
                        backgroundColor: '#fff'
                    }
                  }
                },
              };

              const myChart = new Chart(
                document.getElementById('chartSurvey'),
                config
              );
          }

          if (document.getElementById('answerType')) {
            let labels = JSON.parse('<?=json_encode(!empty($get_answer_by_type) ? $get_answer_by_type['kategori'] : [])?>');
            let data_chart   = JSON.parse('<?=json_encode((!empty($get_answer_by_type) ? $get_answer_by_type['data'] : []))?>');
              

            const data = {
              labels: labels,
              datasets: [{
                backgroundColor: [
                  "#4caf50",
                  "#f44336",
                ],
                data: [data_chart.ok, data_chart.ng]
              }]
            };

            const config = {
              type: 'pie',
              data: data,
              options: {
                responsive: true,
                borderWidth: 1,
                animation: {
                  onComplete: function(animation) {
                    var firstSet = animation.chart.config.data.datasets[0].data,
                      dataSum = firstSet.reduce((accumulator, currentValue) => accumulator + currentValue);

                    if (typeof firstSet !== "object" || dataSum === 0) {
                      document.getElementById('no_data_answer_type').style.display = 'block';
                      document.getElementById('answerType').style.display = 'none'
                    }
                  }
                },
                plugins: {
                  legend: {
                      display: true,
                      labels: {
                          color: '#fff'
                      }
                  }
                },
                elements: {
                  line: {
                      backgroundColor: '#fff'
                  }
                }
              },
            };

            const myChart = new Chart(
              document.getElementById('answerType'),
              config
            );

            myChart.canvas.parentNode.style.height = '300px';
            myChart.canvas.parentNode.style.width = '300px';


          }
      });
    </script>

    <!-- Custom Script -->
    <?php
    if (!empty($script)) {
        $this->load->view($script);
    } ?>
  </body>
</html>
