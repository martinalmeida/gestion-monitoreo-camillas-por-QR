              </main> <!-- main -->
              </div> <!-- .wrapper -->
              <!-- modal logout -->
              <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                  <div class="modal-content">
                    <div class="modal-body">
                      Que desea hacer? <a href="../php/logout.php" class="btn btn-primary text-white text-nowrap">Salir</a> <a class="btn btn-secondary text-white text-nowrap" data-dismiss="modal">cancelar</a>
                    </div>
                  </div>
                </div>
              </div>
              <script src="js/jquery.min.js"></script>
              <script src="js/popper.min.js"></script>
              <script src="js/moment.min.js"></script>
              <script src="js/bootstrap.min.js"></script>
              <script src="js/simplebar.min.js"></script>
              <script src='js/daterangepicker.js'></script>
              <script src='js/jquery.stickOnScroll.js'></script>
              <script src="js/tinycolor-min.js"></script>
              <script src="js/config.js"></script>
              <script src="js/d3.min.js"></script>
              <script src="js/topojson.min.js"></script>
              <script src="js/datamaps.all.min.js"></script>
              <script src="js/datamaps-zoomto.js"></script>
              <script src="js/datamaps.custom.js"></script>
              <script src="js/Chart.min.js"></script>
              <script>
                /* defind global options */
                Chart.defaults.global.defaultFontFamily = base.defaultFontFamily;
                Chart.defaults.global.defaultFontColor = colors.mutedColor;
              </script>
              <script src="js/gauge.min.js"></script>
              <script src="js/jquery.sparkline.min.js"></script>
              <script src="js/apexcharts.min.js"></script>
              <script src="js/apexcharts.custom.js"></script>
              <script src='js/jquery.mask.min.js'></script>
              <script src='js/select2.min.js'></script>
              <script src='js/jquery.steps.min.js'></script>
              <script src='js/jquery.validate.min.js'></script>
              <script src='js/jquery.timepicker.js'></script>
              <script src='js/dropzone.min.js'></script>
              <script src='js/uppy.min.js'></script>
              <script src='js/quill.min.js'></script>
              <script>
                $('.select2').select2({
                  theme: 'bootstrap4',
                });
                $('.select2-multi').select2({
                  multiple: true,
                  theme: 'bootstrap4',
                });
                $('.drgpicker').daterangepicker({
                  singleDatePicker: true,
                  timePicker: false,
                  showDropdowns: true,
                  locale: {
                    format: 'MM/DD/YYYY'
                  }
                });
                $('.time-input').timepicker({
                  'scrollDefault': 'now',
                  'zindex': '9999' /* fix modal open */
                });
                /** date range picker */
                if ($('.datetimes').length) {
                  $('.datetimes').daterangepicker({
                    timePicker: true,
                    startDate: moment().startOf('hour'),
                    endDate: moment().startOf('hour').add(32, 'hour'),
                    locale: {
                      format: 'M/DD hh:mm A'
                    }
                  });
                }
                var start = moment().subtract(29, 'days');
                var end = moment();

                function cb(start, end) {
                  $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                }
                $('#reportrange').daterangepicker({
                  startDate: start,
                  endDate: end,
                  ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                  }
                }, cb);
                cb(start, end);
                $('.input-placeholder').mask("00/00/0000", {
                  placeholder: "__/__/____"
                });
                $('.input-zip').mask('00000-000', {
                  placeholder: "____-___"
                });
                $('.input-money').mask("#.##0,00", {
                  reverse: true
                });
                $('.input-phoneus').mask('(000) 000-0000');
                $('.input-mixed').mask('AAA 000-S0S');
                $('.input-ip').mask('0ZZ.0ZZ.0ZZ.0ZZ', {
                  translation: {
                    'Z': {
                      pattern: /[0-9]/,
                      optional: true
                    }
                  },
                  placeholder: "___.___.___.___"
                });
                // editor
                var editor = document.getElementById('editor');
                if (editor) {
                  var toolbarOptions = [
                    [{
                      'font': []
                    }],
                    [{
                      'header': [1, 2, 3, 4, 5, 6, false]
                    }],
                    ['bold', 'italic', 'underline', 'strike'],
                    ['blockquote', 'code-block'],
                    [{
                        'header': 1
                      },
                      {
                        'header': 2
                      }
                    ],
                    [{
                        'list': 'ordered'
                      },
                      {
                        'list': 'bullet'
                      }
                    ],
                    [{
                        'script': 'sub'
                      },
                      {
                        'script': 'super'
                      }
                    ],
                    [{
                        'indent': '-1'
                      },
                      {
                        'indent': '+1'
                      }
                    ], // outdent/indent
                    [{
                      'direction': 'rtl'
                    }], // text direction
                    [{
                        'color': []
                      },
                      {
                        'background': []
                      }
                    ], // dropdown with defaults from theme
                    [{
                      'align': []
                    }],
                    ['clean'] // remove formatting button
                  ];
                  var quill = new Quill(editor, {
                    modules: {
                      toolbar: toolbarOptions
                    },
                    theme: 'snow'
                  });
                }
                // Example starter JavaScript for disabling form submissions if there are invalid fields
                (function() {
                  'use strict';
                  window.addEventListener('load', function() {
                    // Fetch all the forms we want to apply custom Bootstrap validation styles to
                    var forms = document.getElementsByClassName('needs-validation');
                    // Loop over them and prevent submission
                    var validation = Array.prototype.filter.call(forms, function(form) {
                      form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                          event.preventDefault();
                          event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                      }, false);
                    });
                  }, false);
                })();
              </script>

              <script src="js/apps.js"></script>
              <!-- Global site tag (gtag.js) - Google Analytics -->
              <script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>
              <script>
                window.dataLayer = window.dataLayer || [];

                function gtag() {
                  dataLayer.push(arguments);
                }
                gtag('js', new Date());
                gtag('config', 'UA-56159088-1');
              </script>
              <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.3.1/dt-1.10.25/datatables.min.js"></script>
              <script type="text/javascript">
                $(document).ready(function() {
                  tabla = $("#tabla").DataTable({
                    "language": {
                      "lengthMenu": "Mostrar _MENU_ registros",
                      "zeroRecords": "No se encontraron resultados",
                      "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                      "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                      "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                      "sSearch": "Buscar:",
                      "oPaginate": {
                        "sFirst": "Primero",
                        "sLast": "Último",
                        "sNext": "Siguiente",
                        "sPrevious": "Anterior"
                      },
                      "sProcessing": "Procesando...",
                    }
                  });

                });
              </script>
              <!-- plugins modal js -->
              <script src="../plugins/sweetalert2/sweetalert2.all.min.js"></script>

              <!-- insertar -->
              <script>
                const $form = document.querySelector('#form')

                $form.addEventListener('submit', handleSubmit)

                async function handleSubmit(event) {
                  event.preventDefault()
                  const form = new FormData(this)
                  const response = await fetch(this.action, {
                    method: this.method,
                    body: form,
                    headers: {
                      'Accept': 'application/json'
                    }
                  })
                  if (response.ok) {
                    this.reset()
                    Swal.fire(
                      'Enviado!',
                      'El mensaje fue enviado con exito!',
                      'success'
                    ), location.reload.bind(location = 'index.php');
                  } else {
                    Swal.fire({
                      icon: 'error',
                      title: 'Oops...',
                      text: 'Ocurrio algun error en el envio!'
                    })
                  }
                }
              </script>

              <!-- FIN SCRIPT -->
              <!-- script eliminar usuarios-->
              <script type="text/javascript">
                $(document).on("click", ".borrar", function(e) {
                  e.preventDefault();

                  url = $(this).attr("href");

                  Swal.fire({
                    title: '¿Quieres Eliminar?',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Si, Borralo!',
                    cancelButtonText: 'Cancelar',
                  }).then((result) => {
                    if (result.value) {
                      $.ajax({
                        url: url,
                        type: "POST",
                        success: function() {
                          window.location.href = "usuarios.php";
                          Swal.fire({
                            type: 'success',
                            title: 'Eliminado Correctamente',
                            showConfirmButton: false,
                            timer: 1500
                          })
                        }
                      });
                    }
                  });
                  return false;
                });
              </script>
              <!-- script eliminar camillas-->
              <script type="text/javascript">
                $(document).on("click", ".borrar_camillas", function(e) {
                  e.preventDefault();

                  url = $(this).attr("href");

                  Swal.fire({
                    title: '¿Quieres Eliminar?',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Si, Borralo!',
                    cancelButtonText: 'Cancelar',
                  }).then((result) => {
                    if (result.value) {
                      $.ajax({
                        url: url,
                        type: "POST",
                        success: function() {
                          window.location.href = "camillas.php";
                          Swal.fire({
                            type: 'success',
                            title: 'Eliminado Correctamente',
                            showConfirmButton: false,
                            timer: 1500
                          })
                        }
                      });
                    }
                  });
                  return false;
                });
              </script>
              <!-- script eliminar modelos-->
              <script type="text/javascript">
                $(document).on("click", ".borrar_modelo", function(e) {
                  e.preventDefault();

                  url = $(this).attr("href");

                  Swal.fire({
                    title: '¿Quieres Eliminar?',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Si, Borralo!',
                    cancelButtonText: 'Cancelar',
                  }).then((result) => {
                    if (result.value) {
                      $.ajax({
                        url: url,
                        type: "POST",
                        success: function() {
                          window.location.href = "modelo.php";
                          Swal.fire({
                            type: 'success',
                            title: 'Eliminado Correctamente',
                            showConfirmButton: false,
                            timer: 1500
                          })
                        }
                      });
                    }
                  });
                  return false;
                });
              </script>
              <!-- script eliminar sector-->
              <script type="text/javascript">
                $(document).on("click", ".borrar_sector", function(e) {
                  e.preventDefault();

                  url = $(this).attr("href");

                  Swal.fire({
                    title: '¿Quieres Eliminar?',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Si, Borralo!',
                    cancelButtonText: 'Cancelar',
                  }).then((result) => {
                    if (result.value) {
                      $.ajax({
                        url: url,
                        type: "POST",
                        success: function() {
                          window.location.href = "sectores.php";
                          Swal.fire({
                            type: 'success',
                            title: 'Eliminado Correctamente',
                            showConfirmButton: false,
                            timer: 1500
                          })
                        }
                      });
                    }
                  });
                  return false;
                });
              </script>
              <!-- script eliminar complejidad-->
              <script type="text/javascript">
                $(document).on("click", ".borrar_complejo", function(e) {
                  e.preventDefault();

                  url = $(this).attr("href");

                  Swal.fire({
                    title: '¿Quieres Eliminar?',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Si, Borralo!',
                    cancelButtonText: 'Cancelar',
                  }).then((result) => {
                    if (result.value) {
                      $.ajax({
                        url: url,
                        type: "POST",
                        success: function() {
                          window.location.href = "complejidad.php";
                          Swal.fire({
                            type: 'success',
                            title: 'Eliminado Correctamente',
                            showConfirmButton: false,
                            timer: 1500
                          })
                        }
                      });
                    }
                  });
                  return false;
                });
              </script>
              <!-- script eliminar tamaño-->
              <script type="text/javascript">
                $(document).on("click", ".borrar_tamaño", function(e) {
                  e.preventDefault();

                  url = $(this).attr("href");

                  Swal.fire({
                    title: '¿Quieres Eliminar?',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Si, Borralo!',
                    cancelButtonText: 'Cancelar',
                  }).then((result) => {
                    if (result.value) {
                      $.ajax({
                        url: url,
                        type: "POST",
                        success: function() {
                          window.location.href = "tamaño.php";
                          Swal.fire({
                            type: 'success',
                            title: 'Eliminado Correctamente',
                            showConfirmButton: false,
                            timer: 1500
                          })
                        }
                      });
                    }
                  });
                  return false;
                });
              </script>
              <!-- script eliminar paciente-->
              <script type="text/javascript">
                $(document).on("click", ".borrar_paciente", function(e) {
                  e.preventDefault();

                  url = $(this).attr("href");

                  Swal.fire({
                    title: '¿Quieres Eliminar?',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Si, Borralo!',
                    cancelButtonText: 'Cancelar',
                  }).then((result) => {
                    if (result.value) {
                      $.ajax({
                        url: url,
                        type: "POST",
                        success: function() {
                          window.location.href = "pacientes.php";
                          Swal.fire({
                            type: 'success',
                            title: 'Eliminado Correctamente',
                            showConfirmButton: false,
                            timer: 1500
                          })
                        }
                      });
                    }
                  });
                  return false;
                });
              </script>

              <script type="text/javascript">

                $(document).ready(function() {

                  $(".formulario-update").bind("submit", function(){

                    $.ajax({
                      type: $(this).attr("method"),
                      url: $(this).attr("action"),
                      data: $(this).serialize(),
                      success:function(){
                        Swal.fire({
                              type:'success',
                              title:' Paciente Asignado Correctamente',
                              allowOutsideClick: false
                          }).then((result) => {
                              if(result.value){
                                  window.location.href = "camillas.php";
                              }
                          })
                      },
                      error:function(){
                        Swal.fire({
                          type:'error',
                          title:'¡Error al realizar la Asignación!'
                          });
                      }

                    });

                    return false;
                  });
                });
              </script>

              </body>

              </html>