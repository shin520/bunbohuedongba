<style>
    #truycap {
        width: 100%;
        height: 350px !important;
    }

</style>
<div class="card">
    <div class="card-header color-box bg-primary bg-soft">
        <div class="row ">
            <div class="col-md-9">
                <h3 class="card-title has-success">
                    <i class="bx bx-line-chart "></i>
                    <label class="control-label">{{ __('Thống kê truy cập') }}</label>
                </h3>
            </div>

            <div class="col-md-3">
                <ul  class="nav nav-pills ml-auto">
                    <li>
                        <select class="form-control select2" onchange="access(value);">
                            <option value="access_updateCharttoday">{{ __('Hôm nay') }}</option>
                            <option value="access_updateChartyesterday">{{ __('Hôm qua') }}</option>
                            <option value="access_updateChart7day">{{ __('7 Ngày qua') }}</option>
                            <option value="access_updateChartweek">{{ __('Tuần này') }}</option>
                            <option value="access_updateChart30day">{{ __('30 Ngày qua') }}</option>
                            <option value="access_updateChartmonth">{{ __('Tháng này') }}</option>
                            <option value="access_updateChartyear">{{ __('1 Năm') }} </option>
                        </select>
                    </li>

                </ul>
            </div>

        </div>

    </div>
    <div class="card-body">
        <canvas id="truycap">
        </canvas>
    </div>
</div>

@include('be.api-google-analytics.js-page.js-truycap')
