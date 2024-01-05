@extends('dashboard.admin.layouts.app')
@section('home', '/')
@section('subtitle', __('words.admin_dashboard'))
@section('content')
    <div class="mt-2">
        @include('dashboard.admin.layouts.messages')
    </div>
        <div class="row container my-5">
            <div class="card">
                <div class="card-body">
                    <!--start -->
                    <div class="row row-cols-1 row-cols-md-3 row-cols-xl-2 row-cols-xxl-4">
                        <div class="col">
                            <div class="card radius-10 bg-gradient-cosmic">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="me-auto">
                                            <p class="mb-0 text-white">Company Ratio</p>
                                            <h4 class="my-1 text-white" id="companyRatio">-</h4>
                                            {{-- <p class="mb-0 font-13 text-white">+{{$orders_last_week}} from last week</p> --}}
                                        </div>
                                        {{-- <div id="chart1"></div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card radius-10 bg-gradient-ibiza">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="me-auto">
                                            <p class="mb-0 text-white">Number of Scannes</p>
                                            <h4 class="my-1 text-white" id="scan">-</h4>
                                            {{-- <p class="mb-0 font-13 text-white">+{{$users_last_week}} from last week</p> --}}
                                        </div>
                                        {{-- <div id="chart2"></div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card radius-10 bg-gradient-ohhappiness">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="me-auto">
                                            <p class="mb-0 text-white">Money Before Discount</p>
                                            <h4 class="my-1 text-white" id="priceBeforeDiscount">-</h4>
                                            {{-- <p class="mb-0 font-13 text-white">+{{$drivers_last_week}} from last week</p> --}}
                                        </div>
                                        {{-- <div id="chart3"></div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card radius-10 bg-gradient-cosmic">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="me-auto">
                                            <p class="mb-0 text-white">Money After Discount</p>
                                            <h4 class="my-1 text-white" id="priceAfterDiscount">-</h4>
                                            {{-- <p class="mb-0 font-13 text-white">+{{$drivers_last_week}} from last week</p> --}}
                                        </div>
                                        {{-- <div id="chart3"></div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <script>
        function reservation(medicine) {
            $.ajax({
                url: 'Reservations/' + medicine.id,
                type: 'get',
                dataType: 'json',
                success: function(result) {
                    console.log(result);
                    document.getElementById("scan").innerHTML = result.reservationCount;
                    let total_price = 0;
                    let price_after_discount = 0
                    result.reservations.forEach(reservation => {
                        total_price += reservation['info'].price;
                        price_after_discount += reservation['info'].price_after_discount
                    });
                    document.getElementById("priceBeforeDiscount").innerHTML = total_price;
                    document.getElementById("priceAfterDiscount").innerHTML = price_after_discount;
                    document.getElementById("companyRatio").innerHTML = total_price * (result.company_ratio /
                        100);

                },
            });
        }
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementsByClassName('calendar');
            for (let i = 0; i < calendarEl.length; i++) {
                var currentDate = new Date();
                var formattedDate = currentDate.toISOString().slice(0, 10); // Format as 'YYYY-MM-DD'
                var calendar = new FullCalendar.Calendar(calendarEl[i], {
                    headerToolbar: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
                    },
                    initialView: 'dayGridMonth',
                    initialDate: formattedDate,
                    navLinks: true,
                    selectable: true,
                    nowIndicator: true,
                    dayMaxEvents: true,
                    editable: true,
                    selectable: true,
                    businessHours: true,

                    dateClick: function(info) {
                        var activeTab = $('.nav-link.active');
                        var medicineType = activeTab.attr('href').substring(4);
                        var clickedDate = info.dateStr;
                        $('#myModal').modal('show');
                        $.ajax({
                            url: 'getReservations/' + medicineType + '/' + clickedDate,
                            type: 'get',
                            dataType: 'json',
                            success: function(result) {
                                console.log(result.reservations);
                                $('#reservationTableBody').empty();

                                $.each(result.reservations, function(index, reservation) {
                                    var userName = reservation.user ? reservation
                                        .user.name ?? '-' : '-';
                                    var serviceName = reservation.service ?
                                        reservation.service.name ?? '-' : '-';
                                    var price = reservation.info ? reservation.info
                                        .price ?? '-' : '-';
                                    var total_price = reservation.info ? reservation
                                        .info.total_price ?? '-' : '-';
                                    var discount = reservation.info ? reservation
                                        .info.discount ?? '-' : '-';
                                    var date = reservation.date ?? '-';
                                    var time = reservation.time ?? '-';
                                    var status = reservation.status ?? '-';
                                    var company_ratio = reservation.info ?
                                        reservation.service.offers[1].discount -
                                        reservation.service.offers[0].discount :
                                        '-';
                                    console.log(company_ratio)
                                    var company_price = (price *company_ratio) / 100;

                                    var row = '<tr>' +
                                        '<td>' + (index + 1) + '</td>' +
                                        '<td>' + userName + '</td>' +
                                        '<td>' + serviceName + '</td>' +
                                        '<td>' + date + '</td>' +
                                        '<td>' + time + '</td>' +
                                        '<td>' + status + '</td>' +
                                        '<td>' + price + 'L.E</td>' +
                                        '<td>' + discount + '%</td>' +
                                        '<td>' + total_price + 'L.E</td>' +
                                        '<td>' + company_ratio + '%</td>' +
                                        '<td>' + company_price + 'L.E</td>' +
                                        '</tr>';

                                    $('#reservationTableBody').append(row);
                                });

                                $('#myModal').modal('show');
                            },
                        });
                    },
                });
                calendar.render();
            }
            $('.nav-link').on('shown.bs.tab', function(e) {
                window.dispatchEvent(new Event('resize'));
            });
            window.dispatchEvent(new Event('resize'));
        });
    </script>

    <!-- Bootstrap Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Day Details</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ __('words.user') }}</th>
                                    <th>{{ __('words.service') }}</th>
                                    <th>{{ __('words.date') }}</th>
                                    <th>{{ __('words.time') }}</th>
                                    <th>{{ __('words.status') }}</th>
                                    <th>{{ __('words.price') }}</th>
                                    <th>{{ __('words.discount_ratio') }}</th>
                                    <th>{{ __('words.price_after_discount') }}</th>
                                    <th>{{ __('words.company_ratio') }}</th>
                                    <th>{{ __('words.company_due') }}</th>
                                </tr>
                            </thead>
                            <tbody id="reservationTableBody">
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection