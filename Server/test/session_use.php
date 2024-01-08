<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>DateRangePicker Apply Event</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- DateRangePicker CSS -->
    <link href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">
        <h1>Date Range Selection</h1>

        <div class="row">
            <div class="col-md-6">
                <label for="dateRangePicker" class="form-label">Select Date Range:</label>
                <input type="text" class="form-control" id="dateRangePicker" name="dateRangePicker" />
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-6">
                <label class="form-label">Selected Date Range:</label>
                <p id="selectedDateRange"></p>
            </div>
        </div>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Moment.js (Required for DateRangePicker) -->
    <script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <!-- DateRangePicker JS -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script>
    $(document).ready(function() {
        var start = moment().startOf('week');
        var end = moment().endOf('week');

        function cb(start, end) {
            $('#reportrange span').html(start.format('YYYY/MM/DD') + ' - ' + end.format('YYYY/MM/DD'));
        }

        $('#dateRangePicker').daterangepicker({
            startDate: start,
            endDate: end,
            locale: {
                format: 'YYYY-MM-DD', // 날짜 표시 형식
                separator: ' ~ ', // 날짜 범위 구분자
                applyLabel: '적용', // 적용 버튼 레이블
                cancelLabel: '취소', // 취소 버튼 레이블
                fromLabel: '부터', // 시작일 레이블
                toLabel: '까지', // 종료일 레이블
                customRangeLabel: '직접 선택', // 사용자 정의 범위 레이블
                weekLabel: '주', // 주 레이블
                daysOfWeek: ['일', '월', '화', '수', '목', '금', '토'], // 요일 배열
                monthNames: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월',
                    '12월'
                ], // 월 배열
                firstDay: 0 // 주의 시작 요일 (0: 일요일, 1: 월요일, ...)
            },
            ranges: {
                '오늘': [moment(), moment()],
                '어제': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                '지난 7일': [moment().subtract(6, 'days'), moment()],
                '지난주': [moment().subtract(1, 'weeks').startOf('week'), moment().subtract(1, 'weeks')
                    .endOf(
                        'week')
                ],
                '이번주': [moment().startOf('week'), moment().endOf('week')],
                '다음주': [moment().add(1, 'weeks').startOf('week'), moment().add(1, 'weeks').endOf(
                    'week')],
                '지난 30일': [moment().subtract(29, 'days'), moment()],
                '이번달': [moment().startOf('month'), moment().endOf('month')],
                '지난달': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month')
                    .endOf(
                        'month')
                ]
            }
        }, cb);

        // Apply event handler
        $('#dateRangePicker').on('apply.daterangepicker', function(ev, picker) {
            $('#selectedDateRange').text('Selected Range: ' + picker.startDate.format('YYYY-MM-DD') +
                ' to ' + picker.endDate.format('YYYY-MM-DD'));
        });
    });
    </script>
</body>

</html>