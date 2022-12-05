<style>
    #quocgia {
        width: 100%;
        height: 350px !important;
    }

</style>
<div class="card collapsed-card">
    <div class="card-header  color-box bg-primary bg-soft">
        <div class="row">
            <div class="col-md-9">
                <h3 class="card-title has-success">
                    <i class="bx bx-world"></i>
                    <label class="control-label">Quốc gia</label>
                </h3>
            </div>

            <div class="col-md-3">
                <ul class="nav nav-pills ml-auto">
                    <li>
                        <select class="select2 form-control" onchange="country(value);">
                            <option value="country_updateCharttoday">{{ __('Hôm nay') }}</option>
                            <option value="country_updateChartyesterday">{{ __('Hôm qua') }}</option>
                            <option value="country_updateChart7day">{{ __('7 Ngày qua') }}</option>
                            <option value="country_updateChartweek">{{ __('Tuần này') }}</option>
                            <option value="country_updateChart30day">{{ __('30 Ngày qua') }}</option>
                            <option value="country_updateChartmonth">{{ __('Tháng này') }}</option>
                        </select>
                    </li>

                </ul>
            </div>

        </div>
    </div>
    <div class="card-body">
        <canvas id="quocgia">
        </canvas>
    </div>
</div>

    @include('be.api-google-analytics.js-page.js-quocgia')
