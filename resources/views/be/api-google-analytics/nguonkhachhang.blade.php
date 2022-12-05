<div class="card collapsed-card">
    <div class="card-header color-box bg-primary bg-soft">

        <div class="row ">
            <div class="col-md-8">
                <h3 class="card-title has-success">
                    <i class="bx bx-link"></i>
                    <label class="control-label">Nguồn truy cập</label>
                </h3>
            </div>

            <div class="col-md-4">
                <ul class="nav nav-pills ml-auto">
                    <li>
                        <select class="form-control select2" onchange="ref(value);">
                            <option value="updateReftoday">{{ __('Hôm nay') }}</option>
                            <option value="updateRefyesterday">{{ __('Hôm qua') }}</option>
                            <option value="updateRef7day">{{ __('7 Ngày qua') }}</option>
                            <option value="updateRefweek">{{ __('Tuần này') }}</option>
                            <option value="updateRef30day">{{ __('30 Ngày qua') }}</option>
                            <option value="updateRefmonth">{{ __('Tháng này') }}</option>
                            <option value="updateRefyear">{{ __('1 Năm') }} </option>
                        </select>
                    </li>

                </ul>
            </div>

        </div>
    </div>
    <div class="card-body">

        <div class="w-100">
            <table id="tableRef" class="display table table-bordered w-100">
                <thead>
                    <tr>
                        <th>Nguồn</th>
                        <th>Lượt Truy Cập</th>

                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Nguồn</th>
                        <th>Lượt Truy Cập</th>

                    </tr>
                </tfoot>
            </table>

        </div>

    </div>
</div>

@include('be.api-google-analytics.js-page.js-ref')
