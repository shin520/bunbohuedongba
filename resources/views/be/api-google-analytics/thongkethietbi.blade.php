<style>
    #thietbi {
        width: 100%;
        height: 350px !important;
    }
</style>
<div class="card">
    <div class="card-header color-box bg-primary bg-soft">
        <div class="row">
            <div class="col-md-8">
                <h3 class="card-title has-success">
                    <i class="bx bx-devices"></i>
                    <label class="control-label">Thiết bị</label>
                </h3>
            </div>

            <div class="col-md-4">
                <ul class="nav nav-pills ml-auto">
                    <li>
                        <select class="form-control select2" onchange="device(value);">
                            <option value="updateDevicetoday">{{ __('Hôm nay') }}</option>
                            <option value="updateDeviceyesterday">{{ __('Hôm qua') }}</option>
                            <option value="updateDevice7day">{{ __('7 Ngày qua') }}</option>
                            <option value="updateDeviceweek">{{ __('Tuần này') }}</option>
                            <option value="updateDevice30day">{{ __('30 Ngày qua') }}</option>
                            <option value="updateDevicemonth">{{ __('Tháng này') }}</option>
                            <option value="updateDeviceyear">{{ __('1 Năm') }} </option>
                        </select>
                    </li>

                </ul>
            </div>

        </div>
    </div>
    <div class="card-body">
        <canvas id="thietbi">
        </canvas>
    </div>
</div>
@include('be.api-google-analytics.js-page.js-thietbi')
