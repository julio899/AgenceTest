<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
  <link href="{{ asset('/css/material-dashboard.css?v=2.1.1') }}" rel="stylesheet" />
  <!-- CSS personalizado -->
  <link href="{{ asset('/css/personalizado.css') }}" rel="stylesheet" />

</head>
<body>

    @yield('content')
@auth
    <!--   Core JS Files   -->
  <script src="{{ asset('/js/core/jquery.min.js') }}"></script>
  <script src="{{ asset('/js/core/popper.min.js') }}"></script>
  <script src="{{ asset('/js/core/bootstrap-material-design.min.js') }}"></script>
  <script src="{{ asset('/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
  <!-- Plugin for the momentJs  -->
  <script src="{{ asset('/js/plugins/moment.min.js') }}"></script>
  <!--  Plugin for Sweet Alert -->
  <script src="{{ asset('/js/plugins/sweetalert2.js') }}"></script>
  <!-- Forms Validations Plugin -->
  <script src="{{ asset('/js/plugins/jquery.validate.min.js') }}"></script>
  <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
  <script src="{{ asset('/js/plugins/jquery.bootstrap-wizard.js') }}"></script>
  <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="{{ asset('/js/plugins/bootstrap-selectpicker.js') }}"></script>
  <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
  <script src="{{ asset('/js/plugins/bootstrap-datetimepicker.min.js') }}"></script>
  <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
  <script src="{{ asset('/js/plugins/jquery.dataTables.min.js') }}"></script>
  <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
  <script src="{{ asset('/js/plugins/bootstrap-tagsinput.js') }}"></script>
  <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
  <script src="{{ asset('/js/plugins/jasny-bootstrap.min.js') }}"></script>
  <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
  <script src="{{ asset('/js/plugins/fullcalendar.min.js') }}"></script>
  <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
  <script src="{{ asset('/js/plugins/jquery-jvectormap.js') }}"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="{{ asset('/js/plugins/nouislider.min.js') }}"></script>
  <!-- Library for adding dinamically elements -->
  <script src="{{ asset('/js/plugins/arrive.min.js') }}"></script>
   <!-- Chartist JS -->
  <script src="{{ asset('/js/plugins/chartist.min.js') }}"></script>
  <!--  Notifications Plugin    -->
  <script src="{{ asset('/js/plugins/bootstrap-notify.js') }}"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('/js/material-dashboard.js?v=2.1.1') }}" type="text/javascript"></script>
  <!-- Material Dashboard inicio methods -->
  <script src="{{ asset('/js/inicio.js') }}"></script>
  <style>

  </style>
  <script>
    $(document).ready(function() {
      $().ready(function() {
        $sidebar = $('.sidebar');

        $sidebar_img_container = $sidebar.find('.sidebar-background');

        $full_page = $('.full-page');

        $sidebar_responsive = $('body > .navbar-collapse');

        window_width = $(window).width();

        fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

        if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
          if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
            $('.fixed-plugin .dropdown').addClass('open');
          }

        }

        $('.fixed-plugin a').click(function(event) {
          // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
          if ($(this).hasClass('switch-trigger')) {
            if (event.stopPropagation) {
              event.stopPropagation();
            } else if (window.event) {
              window.event.cancelBubble = true;
            }
          }
        });

        $('.fixed-plugin .active-color span').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-color', new_color);
          }

          if ($full_page.length != 0) {
            $full_page.attr('filter-color', new_color);
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr('data-color', new_color);
          }
        });

        $('.fixed-plugin .background-color .badge').click(function() {
          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('background-color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-background-color', new_color);
          }
        });

        $('.fixed-plugin .img-holder').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).parent('li').siblings().removeClass('active');
          $(this).parent('li').addClass('active');


          var new_image = $(this).find("img").attr('src');

          if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            $sidebar_img_container.fadeOut('fast', function() {
              $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
              $sidebar_img_container.fadeIn('fast');
            });
          }

          if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $full_page_background.fadeOut('fast', function() {
              $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
              $full_page_background.fadeIn('fast');
            });
          }

          if ($('.switch-sidebar-image input:checked').length == 0) {
            var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
            $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
          }
        });

        $('.switch-sidebar-image input').change(function() {
          $full_page_background = $('.full-page-background');

          $input = $(this);

          if ($input.is(':checked')) {
            if ($sidebar_img_container.length != 0) {
              $sidebar_img_container.fadeIn('fast');
              $sidebar.attr('data-image', '#');
            }

            if ($full_page_background.length != 0) {
              $full_page_background.fadeIn('fast');
              $full_page.attr('data-image', '#');
            }

            background_image = true;
          } else {
            if ($sidebar_img_container.length != 0) {
              $sidebar.removeAttr('data-image');
              $sidebar_img_container.fadeOut('fast');
            }

            if ($full_page_background.length != 0) {
              $full_page.removeAttr('data-image', '#');
              $full_page_background.fadeOut('fast');
            }

            background_image = false;
          }
        });

        $('.switch-sidebar-mini input').change(function() {
          $body = $('body');

          $input = $(this);

          if (md.misc.sidebar_mini_active == true) {
            $('body').removeClass('sidebar-mini');
            md.misc.sidebar_mini_active = false;

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

          } else {

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

            setTimeout(function() {
              $('body').addClass('sidebar-mini');

              md.misc.sidebar_mini_active = true;
            }, 300);
          }

          // we simulate the window Resize so the charts will get updated in realtime.
          var simulateWindowResize = setInterval(function() {
            window.dispatchEvent(new Event('resize'));
          }, 180);

          // we stop the simulation of Window Resize after the animations are completed
          setTimeout(function() {
            clearInterval(simulateWindowResize);
          }, 1000);

        });
      });
    });
  </script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in public/js/inicio.js
      md.initDashboardPageCharts();

    });

    (async function(){
        const url_api_consultores = "{{ url('/api/consultores') }}";
        const tablaConsultores = document.getElementById("body-table-consultores");
        fetch(url_api_consultores)
            .then((r) => { return r.json(); })
            .then( (dataRespuesta) => {
                var contador = tablaConsultores.rows.length;
                dataRespuesta.map((consultor)=>{
                    contador++;
                    var tr = document.createElement('tr');
                    var td  = document.createElement('td');
                        td.innerText = contador;
                    var td2 = document.createElement('td');
                        td2.innerText = consultor.no_usuario;
                    var td3 = document.createElement('td');
                        td3.innerText = 'R$ ' + consultor.brut_salario;
                    var td4 = document.createElement('td');
                        td4.innerHTML = `
                              <div class="form-check radioEstilo">
                                <label class="form-radio-label">
                                  <input name="consultorCheck" data-user="${consultor.co_usuario}" data-name="${consultor.no_usuario}" class="form-radio-input consultorCheck" type="radio" value="">
                                  <span class="form-radio-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>`+consultor.co_usuario;
                   
                    tr.append(td);
                    tr.append(td2);
                    tr.append(td3);
                    tr.append(td4);
                    tablaConsultores.append(tr);
                });

                  var consultores = document.getElementsByClassName('consultorCheck');
                  if(consultores.length > 0)
                  {
                    for (let index = 0; index < consultores.length; index++) {
                      let consultorUser = consultores[index].getAttribute('data-user');
                      let consultorCheck = consultores[index];
                          consultorCheck.addEventListener('change',checkActivador);
                    }
                  }
                  loaderOff();
                  
            });
    })();
    
    var __current_consultor = null;
    var __current_consultor_name = null;
    async function checkActivador(e)
    {
      loaderRun();
      limpiarFondo();
      var tr = e.target.parentElement.parentElement.parentElement.parentElement;
          tr.classList.add('fondoGris');
      console.log('Usuario: ',e.target.dataset.user);
      __current_consultor = e.target.dataset.user;
      __current_consultor_name = e.target.dataset.name;
      document.getElementById('lblNameConsultor').innerText = __current_consultor_name;
      return busquedaDataConsultor(e.target.dataset.user);
    }

    function busquedaDataConsultor( userConsultor )
    {
        const year = document.getElementById('year').value;
        const month = document.getElementById('month').value;
        
        const url_api_consultores_ganancias = "{{ url('/api/consultores/') }}/"+userConsultor+'/ganancia';
        const tablaResultadoParaConsultor = document.getElementById("tableDataConsultor");

      var data = {fecha: year+'-'+month};
      fetch(url_api_consultores_ganancias,
            { 
              method: 'POST',
              body: JSON.stringify(data), 
              headers:{'Content-Type': 'application/json'}
            })
            .then((r) => { return r.json(); })
            .then( (dataRespuesta) => {
              console.log(dataRespuesta);
              document.getElementById('consultorLabel').innerHTML = userConsultor;
              tablaResultadoParaConsultor.innerHTML = '';
              // Titulo
              var trTitulos = document.createElement('tr');
              var th1  = document.createElement('th');
                  th1.innerText = 'Descripcion';
              var thValor  = document.createElement('th');
                  thValor.innerText = 'Valor';
              var thComi  = document.createElement('th');
                  thComi.innerText = 'Comision';
                  thComi.classList.add('toRight');
              var th2  = document.createElement('th');
                  th2.innerText = 'Total';
                  th2.classList.add('toRight');
              var th3  = document.createElement('th');
                  th3.classList.add('toRight');
                  th3.innerText = 'Imp';
              var th4  = document.createElement('th');
                  th4.innerText = 'Fecha';

              trTitulos.append(th1);
              trTitulos.append(thValor);
              trTitulos.append(thComi);
              trTitulos.append(th2);
              trTitulos.append(th3);
              trTitulos.append(th4);
              tablaResultadoParaConsultor.append(trTitulos);
              var totalAcumulado = 0;
              var totalAcumuladoComision = 0;
              dataRespuesta.forEach((registro) => {
                  var tr = document.createElement('tr');
                  var td  = document.createElement('td');
                  var tdValor  = document.createElement('td');
                  var tdComi  = document.createElement('td');
                  var tdTotalImp  = document.createElement('td');
                  var tdTotal  = document.createElement('td');
                  var tdFecha  = document.createElement('td');

                      td.innerText = registro.ds_os+' '+registro.ds_caracteristica;
                      tdValor.innerText = Number(registro.valor).toFixed(2);
                      totalAcumulado = (Number(totalAcumulado) + Number(registro.valor)).toFixed(2);
                      tdValor.classList.add('toRight');
                      tdFecha.innerText = registro.dt_inicio;
                      tdTotalImp.innerText = registro.total_imp_inc+'%';
                      tdTotalImp.classList.add('toRight');
                      tdTotal.innerText = Number(registro.total).toFixed(2);
                      tdTotal.classList.add('toRight');
                      
                      //(VALOR – (VALOR*TOTAL_IMP_INC))*COMISSAO_
                      // La formula provista tenia un pelon xD
                      // BASE   -> 6925/1.27
                      // add %  -> 6925*1.10

                      // 5040-(5370.27/1.27)
                      // registro.valor - ( registro.total / (registro.total_imp_inc/100) ) 
                      
                      var comisionGanada = 0;
                      if(registro.total_imp_inc>0)
                      {
                        comisionGanada = registro.valor - ( registro.total /( (registro.total_imp_inc/100) +1) ) ;
                        console.log(registro.valor+' - ('+registro.total+'/(('+registro.total_imp_inc+'/100)+1)) = '+comisionGanada);
                        totalAcumuladoComision = totalAcumuladoComision + Number(comisionGanada);
                      }

                      tdComi.innerText = Number(comisionGanada).toFixed(2);
                      tdComi.classList.add('toRight');
                      
                      tr.append(td);
                      tr.append(tdValor);
                      tr.append(tdComi);
                      tr.append(tdTotal);
                      tr.append(tdTotalImp);
                      tr.append(tdFecha);
                  tablaResultadoParaConsultor.append(tr);
              });
              totalAcumuladoComision = Number(totalAcumuladoComision).toFixed(2);
              console.log('Acumilado Comision: '+totalAcumuladoComision);
              document.getElementById('totalAcumulado').innerText = 'R$ '+ totalAcumuladoComision;
              loaderOff();
            });

    }


  </script>
@endauth
  <div id="loader">
    <div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
  </div>
  <script src="{{ asset('/js/funciones.js') }}"></script>
</body>
</html>
