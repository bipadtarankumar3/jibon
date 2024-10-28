<!DOCTYPE html>
<html lang="en" class="mmenu-open-fade">

<head>
    <title>Sahaj Jibon Service</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" type="{{ URL::TO('public/assets/image/x-icon') }}" href="images/favicon.png" />
    <link rel="stylesheet" href="{{ URL::TO('public/assets/css/bootstrap.min.css') }}" />
    <link href="{{ URL::TO('public/assets/css/material-design-iconic-font.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link rel="stylesheet" id="jqueryfancyboxmin-css-css"
        href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css?ver=6.0.1" media="all" />
    <link rel="stylesheet" href="{{ URL::TO('public/assets/css/slick.css') }}" />
    <link rel="stylesheet" href="{{ URL::TO('public/assets/css/slick-theme.css') }}" />
    <link rel="stylesheet" href="{{ URL::TO('public/assets/css/aos.css') }}" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css" />
    <link href="{{ URL::TO('public/assets/css/style.css') }}" rel="stylesheet" type="text/css" />
</head>
<!-- laravel CRUD token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- Canonical SEO -->

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
<link rel="stylesheet" type="text/css" href=" https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href=" https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<style>
    span.select2.select2-container.select2-container--classic {
        width: 100% !important;
    }
</style>


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.1.0/main.css">

</head>


<body>
    <div class="wrapper mm-page" id="page">


        @include('admin.layouts.header')
        <main class="site-main">
            <div class="main_hldr">
                @include('admin.layouts.sidebar')



                @yield('content')
            </div>
        </main>
    </div>



    <!-- Modal market-->
    <div class="modal fade" id="systemInfoModal" tabindex="-1" aria-labelledby="createindent" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="marketLabel">System Info</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="common_form" id="systemInfoForm" enctype="multipart/form-data">

                    </form>

                </div>
            </div>
        </div>
    </div>



    <div class="modal fade" id="restore" tabindex="-1" aria-labelledby="restore" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="marketLabel">Restore Database</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row gy-3">
                            <div class="col-12">
                                <label>Upload Sql file</label>
                                <input type="file" class="form-control">
                            </div>
                            <p>Note: pls upload sql file only.</p>
                            <div class="col-12 text-end">
                                <input type="submit" value="Restore" class="btn btn-primary">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- create indent modal end-->
    <span class="screen-darken"></span>
    <script src="{{ URL::TO('public/assets/js/jquery-3.3.1.min.js') }}"></script>
    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <!-- <script src="js/bootstrap.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js?ver=3.5.7"
        id="fancyboxmin-js-js"></script>
    <script src="{{ URL::TO('public/assets/js/jquery.steps.min.js') }}"></script>
    <script src="{{ URL::TO('public/assets/js/slick.js') }}"></script>

    <script src="{{ URL::TO('public/assets/js/webcamjs/webcam.min.js') }}"></script>
    <script src="{{ URL::TO('public/assets/js/customScript.js') }}"></script>
    <script src="{{ URL::TO('public/assets/js/custom.js') }}"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    @include('admin.layouts.validation')
    <script>
        $('#zero_config').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'excel'
            ]

        });


        $('#printDatatable').DataTable({
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'excel',
                    footer: true // Include footer in Excel export
                },
                {
                    extend: 'print',
                    footer: true, // Include footer in print view
                    customize: function (win) {
                        $(win.document.body).css('font-size', '10pt');
                        $(win.document.body).find('table').addClass('compact').css('font-size', 'inherit');
                    }
                }
            ]
        });


        $('#dropout_table').DataTable({
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'excel',
                    footer: true // Include footer in Excel export
                },
                {
                    extend: 'csv',
                    footer: true // Include footer in Excel export
                },
                {
                    extend: 'print',
                    footer: true, // Include footer in print view
                    customize: function (win) {
                        $(win.document.body).css('font-size', '10pt');
                        $(win.document.body).find('table').addClass('compact').css('font-size', 'inherit');
                    }
                }
            ]
        });



        $('#report').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'excel', 'pdf'
            ]
        });
    </script>
    <script>
        function deleteConfirmation(ev) {

            ev.preventDefault();
            var urlToRedirect = ev.currentTarget.getAttribute(
                'href'
            );

            swal({
                title: "Delete?",
                text: "Please ensure and then confirm!",
                type: "warning",
                showCancelButton: !0,
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel!",
                reverseButtons: !0
            }).then(function(e) {

                if (e.value === true) {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                    $.ajax({
                        type: 'POST',
                        url: urlToRedirect,
                        data: {
                            _token: CSRF_TOKEN
                        },
                        dataType: 'JSON',
                        success: function(results) {

                            if (results.success === true) {
                                swal("Done!", results.message, "success");
                                setTimeout(() => {
                                    location.reload(true);
                                }, 1000);
                            } else {
                                swal("Error!", results.message, "error");
                            }
                        }
                    });

                } else {
                    e.dismiss;
                }

            }, function(dismiss) {
                return false;
            })
        }
    </script>

    <script>
        function showSystemInfo() {
            $.ajax({
                url: "{{ URL::to('admin/system-info/show') }}", // Endpoint to get the existing data
                type: 'GET',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}' // CSRF token for Laravel
                },
                success: function(data) {

                    $('#systemInfoForm').html(data);
                    $('#systemInfoModal').modal('show');
                },
                error: function(error) {
                    console.log('Error fetching data:', error);
                }
            });
        }


        function saveSystemInfo() {
            var formData = new FormData($('#systemInfoForm')[0]); // Collect form data

            $.ajax({
                url: "{{ URL::to('admin/system-info/save') }}",
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}' // CSRF token for Laravel
                },
                success: function(response) {
                    if (response.success) {
                        alert('Data saved successfully!');
                        $('#systemInfoModal').modal('hide');
                    } else {
                        alert('Failed to save data.');
                    }
                },
                error: function(error) {
                    console.log('Error:', error);
                }
            });
        }
    </script>

    @yield('js')
</body>

</html>






<!-- END: Page JS-->
