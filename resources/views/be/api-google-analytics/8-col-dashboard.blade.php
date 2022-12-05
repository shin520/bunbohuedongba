<div class="mb-2 col-md-12 form-group">
    <div class="card-tools">
        <ul class="nav nav-pills ml-auto">
            <li>
                <select class="form-control select2" onchange="dashboard(value);">
                    <option value="dashboard_today">{{ __('Hôm nay') }}</option>
                    <option value="dashboard_yesterday">{{ __('Hôm qua') }}</option>
                    <option value="dashboard_7day">{{ __('7 Ngày qua') }}</option>
                    <option value="dashboard_week">{{ __('Tuần này') }}</option>
                    <option value="dashboard_30day">{{ __('30 Ngày qua') }}</option>
                    <option value="dashboard_month">{{ __('Tháng này') }}</option>
                    <option value="dashboard_year">{{ __('1 Năm') }} </option>
                </select>
            </li>
        </ul>
    </div>
</div>

<div class="col-lg-3">
    <div class="card mini-stats-wid color-box bg-danger bg-soft">
        <div class="card-body">
            <div class="d-flex flex-wrap">
                <div class="me-3">
                    <p class="text-muted mb-2">{{ __('PHIÊN TRUY CẬP') }}</p>
                    <h5 id="dashboard_session" class="mb-0"></h5>
                </div>
                <div class="avatar-sm ms-auto">
                    <div class="avatar-title bg-light rounded-circle text-primary font-size-20">
                        <i class="bx bx-log-in"></i>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="col-lg-3">
    <div class="card mini-stats-wid color-box bg-success bg-soft">
        <div class="card-body">
            <div class="d-flex flex-wrap">
                <div class="me-3">
                    <p class="text-muted mb-2">{{ __('KHÁCH') }}</p>
                    <h5 id="dashboard_visitors" class="mb-0"></h5>
                </div>
                <div class="avatar-sm ms-auto">
                    <div class="avatar-title bg-light rounded-circle text-primary font-size-20">
                        <i class="bx bx-street-view"></i>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="col-lg-3">
    <div class="card mini-stats-wid color-box bg-info bg-soft">
        <div class="card-body">
            <div class="d-flex flex-wrap">
                <div class="me-3">
                    <p class="text-muted mb-2">{{ __('KHÁCH MỚI') }}</p>
                    <h5 id="dashboard_new_visitors" class="mb-0"></h5>
                </div>
                <div class="avatar-sm ms-auto">
                    <div class="avatar-title bg-light rounded-circle text-primary font-size-20">
                        <i class="bx bx-user-plus"></i>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="col-lg-3">
    <div class="card mini-stats-wid color-box bg-warning bg-soft">
        <div class="card-body">
            <div class="d-flex flex-wrap">
                <div class="me-3">
                    <p class="text-muted mb-2">{{ __('LƯỢT XEM TRANG') }}</p>
                    <h5 id="dashboard_pageviews" class="mb-0"></h5>
                </div>
                <div class="avatar-sm ms-auto">
                    <div class="avatar-title bg-light rounded-circle text-primary font-size-20">
                        <i class="bx bx-show"></i>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="col-lg-3">
    <div class="card mini-stats-wid color-box bg-danger bg-soft">
        <div class="card-body">
            <div class="d-flex flex-wrap">
                <div class="me-3">
                    <p class="text-muted mb-2">{{ __('TỈ LỆ THOÁT') }}</p>
                    <h5 id="dashboard_exit_rate" class="mb-0"></h5>
                </div>
                <div class="avatar-sm ms-auto">
                    <div class="avatar-title bg-light rounded-circle text-primary font-size-20">
                        <i class="bx bx-log-out"></i>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="col-lg-3">
    <div class="card mini-stats-wid color-box bg-success bg-soft">
        <div class="card-body">
            <div class="d-flex flex-wrap">
                <div class="me-3">
                    <p class="text-muted mb-2">{{ __('PHIÊN MỚI') }}</p>
                    <h5 id="dashboard_new_sessions" class="mb-0"></h5>
                </div>
                <div class="avatar-sm ms-auto">
                    <div class="avatar-title bg-light rounded-circle text-primary font-size-20">
                        <i class="bx bx-map-pin"></i>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="col-lg-3">
    <div class="card mini-stats-wid color-box bg-info bg-soft">
        <div class="card-body">
            <div class="d-flex flex-wrap">
                <div class="me-3">
                    <p class="text-muted mb-2">{{ __('THỜI GIAN XEM TB') }}</p>
                    <h5 id="dashboard_avg_time" class="mb-0"></h5>
                </div>
                <div class="avatar-sm ms-auto">
                    <div class="avatar-title bg-light rounded-circle text-primary font-size-20">
                        <i class="bx bx-time"></i>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="col-lg-3">
    <div class="card mini-stats-wid color-box bg-warning bg-soft">
        <div class="card-body">
            <div class="d-flex flex-wrap">
                <div class="me-3">
                    <p class="text-muted mb-2">{{ __('TRANG/PHIÊN') }}</p>
                    <h5 id="dashboard_page_per_session" class="mb-0"></h5>
                </div>
                <div class="avatar-sm ms-auto">
                    <div class="avatar-title bg-light rounded-circle text-primary font-size-20">
                        <i class="bx bx-stopwatch"></i>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


@include('be.api-google-analytics.js-page.js-dashboard')
