@extends('layouts.app')

@section('content')

<section class="content-header">
    <h1>
        Bet Management
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Game Lists</li>
        <li class="active">Game Details</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">
        <!-- Chat box -->
        <div class="box box-success">
            <div class="box-header">
                <i class="fa fa-comments-o"></i>

                <h3 class="box-title">Game Details</h3>

                <div class="box-tools pull-right" data-toggle="tooltip" title="Status">
                    <div class="btn-group" data-toggle="btn-toggle">
                        <button type="button" class="btn btn-default btn-sm active"><i class="fa fa-square text-green"></i>
                        </button>
                        <button type="button" class="btn btn-default btn-sm"><i class="fa fa-square text-red"></i></button>
                    </div>
                </div>
            </div>

            <div class="box-body chat">

                <div class="row">
                    <div class="col-md-12">

                        <table id="example1" class="display table table-stripped table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th style="text-align:center;">#</th>
                                    <th style="text-align:center;">Game Provider</th>
                                    <th style="text-align:center;">Total Bet</th>
                                    <th style="text-align:center;">Field</th>
                                    <th style="text-align:center;">Field</th>
                                    <th style="text-align:center;">Field</th>
                                    <th style="text-align:center;">Field</th>
                                    <th style="text-align:center;">Field</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td width="5">1</td>
                                    <td><a href="http://localhost/testing_seamless/public/gamedetails_userlist">ASC</a></td>
                                    <td style="text-align:right;">0.00</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td width="5">2</td>
                                    <td><a href="" data-toggle="modal" data-target="#betlist">CMD</a></td>
                                    <td style="text-align:right;">0.00</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td width="5">3</td>
                                    <td><a href="" data-toggle="modal" data-target="#betlist">SBO</a></td>
                                    <td style="text-align:right;">0.00</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>

            </div>

        </div>

        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script>

    function change_date(date)
    {
        //today
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
        var yyyy = today.getFullYear();
        today = yyyy + '-' + mm + '-' + dd;

        //yesterday
        var yesterday = new Date();
        var yes_dd = String(yesterday.getDate()-1).padStart(2, '0');
        var yes_mm = String(yesterday.getMonth() + 1).padStart(2, '0'); //January is 0!
        var yes_yyyy = yesterday.getFullYear();
        yesterday = yes_yyyy + '-' + yes_mm + '-' + yes_dd;

        //this week
        var dt = new Date(); // current date of week
        var currentWeekDay = dt.getDay();
        var lessDays = currentWeekDay == 0 ? 6 : currentWeekDay - 1;
        var wkStart = new Date(new Date(dt).setDate(dt.getDate() - lessDays));
        var wkEnd = new Date(new Date(wkStart).setDate(wkStart.getDate() + 6));

        firstDay = wkStart.getFullYear() + "-" + (wkStart.getMonth() + 1) + "-" + wkStart.getDate();
        lastDay = wkEnd.getFullYear() + "-" + (wkEnd.getMonth() + 1) + "-" + wkEnd.getDate();

        //last week
        var lastWeek_firstday = new Date(wkStart.getFullYear(), wkStart.getMonth(), wkStart.getDate() - 7);
        var lastWeekMonth_firstday = String(lastWeek_firstday.getMonth() + 1).padStart(2, '0');
        var lastWeekDay_firstday = String(lastWeek_firstday.getDate()).padStart(2, '0');
        var lastWeekYear_firstday = lastWeek_firstday.getFullYear();

        var lastWeek_lastday = new Date(wkStart.getFullYear(), wkStart.getMonth(), wkStart.getDate() - 1);
        var lastWeekMonth_lastday = String(lastWeek_lastday.getMonth() + 1).padStart(2, '0');
        var lastWeekDay_lastday = String(lastWeek_lastday.getDate()).padStart(2, '0');
        var lastWeekYear_lastday = lastWeek_lastday.getFullYear();

        lastweek_firstDay = lastWeekYear_firstday + "-" + lastWeekMonth_firstday + "-" + lastWeekDay_firstday;
        lastweek_lastDay = lastWeekYear_lastday + "-" + lastWeekMonth_lastday + "-" + lastWeekDay_lastday;

        //this month
        var this_month = new Date();
        var first_thismonth = new Date(this_month.getFullYear(), this_month.getMonth(), 1);
        var thismonth_fisrtday_month = String(first_thismonth.getMonth() + 1).padStart(2, '0');
        var thismonth_fisrtday_day = String(first_thismonth.getDate()).padStart(2, '0');
        var thismonth_fisrtday_year = first_thismonth.getFullYear();

        var last_thismonth = new Date(this_month.getFullYear(), this_month.getMonth() + 1, 0);
        var thismonth_lastday_month = String(last_thismonth.getMonth() + 1).padStart(2, '0');
        var thismonth_lastday_day = String(last_thismonth.getDate()).padStart(2, '0');
        var thismonth_lastday_year = last_thismonth.getFullYear();

        thismonth_firstDay = thismonth_fisrtday_year + "-" + thismonth_fisrtday_month + "-" + thismonth_fisrtday_day;
        thismonth_lastDay = thismonth_lastday_year + "-" + thismonth_lastday_month + "-" + thismonth_lastday_day;

        //last month
        var last_month = new Date();
        var first_lastmonth = new Date(last_month.getFullYear(), last_month.getMonth()-1, 1);
        var lastmonth_fisrtday_month = String(first_lastmonth.getMonth() + 1).padStart(2, '0');
        var lastmonth_fisrtday_day = String(first_lastmonth.getDate()).padStart(2, '0');
        var lastmonth_fisrtday_year = first_lastmonth.getFullYear();

        var last_lastmonth = new Date(last_month.getFullYear(), last_month.getMonth() - 1, 1);
        var lastmonth_lastday_month = String(last_lastmonth.getMonth() + 1).padStart(2, '0');
        var lastmonth_lastday_day = String(last_lastmonth.getDate()).padStart(2, '0');
        var lastmonth_lastday_year = last_lastmonth.getFullYear();

        lastmonth_firstDay = lastmonth_fisrtday_year + "-" + lastmonth_fisrtday_month + "-" + lastmonth_fisrtday_day;
        lastmonth_lastDay = lastmonth_lastday_year + "-" + lastmonth_lastday_month + "-" + lastmonth_lastday_day;

        if(date == 'today')
        {
            document.getElementById("date-from").value = today;
            document.getElementById("date-to").value = today;
        }
        else if(date == 'yesterday')
        {
            document.getElementById("date-from").value = yesterday;
            document.getElementById("date-to").value = yesterday;
        }
        else if(date == 'this_week')
        {
            document.getElementById("date-from").value = firstDay;
            document.getElementById("date-to").value = lastDay;
        }
        else if(date == 'last_week')
        {
            document.getElementById("date-from").value = lastweek_firstDay;
            document.getElementById("date-to").value = lastweek_lastDay;
        }
        else if(date == 'this_month')
        {
            document.getElementById("date-from").value = thismonth_firstDay;
            document.getElementById("date-to").value = thismonth_lastDay;
        }
        else if(date == 'last_month')
        {
            document.getElementById("date-from").value = lastmonth_firstDay;
            document.getElementById("date-to").value = lastmonth_lastDay;
        }
    }
</script>
@endsection
