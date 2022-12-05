@if (session('hello'))
<div class="modal fade" id="subscribeModal" tabindex="-1" aria-labelledby="subscribeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-bottom-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="text-center mb-4">
                    <div class="row justify-content-center">
                        <div class="col-xl-10">
                            <h4 class="text-primary">Xin chào {{ Auth::user()->name }} !</h4>
                            <p class="text-muted font-size-14 mb-4">Chúc bạn có một ngày làm việc tuyệt vời ❤</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
