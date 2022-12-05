<style>
    #trinhduyet {
        width: 100%;
        height: 350px !important;
    }
</style>
<div class="card">
    <div class="card-header color-box bg-primary bg-soft">
        <div class="row">
            <div class="col-md-8">
                <h3 class="card-title has-success">
                    <i class="bx bxl-chrome"></i>
                    <label class="control-label">{{ __('Trình duyệt') }}</label>
                </h3>
            </div>

            <div class="col-md-4">
                <ul class="nav nav-pills ml-auto">
                    <li>
                        <select class="form-control select2" onchange="browser(value);">
                            <option value="updateCharttoday">{{ __('Hôm nay') }}</option>
                            <option value="updateChartyesterday">{{ __('Hôm qua') }}</option>
                            <option value="updateChart7day">{{ __('7 Ngày qua') }}</option>
                            <option value="updateChartweek">{{ __('Tuần này') }}</option>
                            <option value="updateChart30day">{{ __('30 Ngày qua') }}</option>
                            <option value="updateChartmonth">{{ __('Tháng này') }}</option>
                            <option value="updateChartyear">{{ __('1 Năm') }} </option>
                        </select>
                    </li>

                </ul>
            </div>

        </div>
    </div>
    <div class="card-body">
        <canvas  id="trinhduyet">
        </canvas>
    </div>
</div>
    @include('be.api-google-analytics.js-page.js-trinhduyet')


