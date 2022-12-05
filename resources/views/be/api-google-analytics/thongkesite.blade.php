<div class="card collapsed-card">
    <div class="card-header color-box bg-primary bg-soft">
        <div class="row">
            <div class="col-md-9">
                <h3 class="card-title has-success">
                    <i class="bx bx-bar-chart-alt"></i>
                    <label class=" control-label">Trang xem nhiều</label>
                </h3>
            </div>
            <div  class="col-md-3">
                <ul class="nav nav-pills ml-auto">
                    <li>
                        <select class="select2 form-control" onchange="site(value);">
                            <option value="updateSitetoday">{{ __('Hôm nay') }}</option>
                            <option value="updateSiteyesterday">{{ __('Hôm qua') }}</option>
                            <option value="updateSite7day">{{ __('7 Ngày qua') }}</option>
                            <option value="updateSiteweek">{{ __('Tuần này') }}</option>
                            <option value="updateSite30day">{{ __('30 Ngày qua') }}</option>
                            <option value="updateSitemonth">{{ __('Tháng này') }}</option>
                            <option value="updateSiteyear">{{ __('1 Năm') }} </option>
                        </select>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="w-100">
            <table id="tablesite" class="display table table-bordered w-100">
                <thead>
                    <tr>
                        <th>Tên Trang</th>
                        <th>Lượt Xem</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Tên Trang</th>
                        <th>Lượt Xem</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
@include('be.api-google-analytics.js-page.js-site')
