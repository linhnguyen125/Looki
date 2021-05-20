@if(session('error'))
    <div class="example-alert mb-1">
        <div class="alert alert-pro alert-danger alert-dismissible">
            <div class="alert-text">
                <h6>Thất bại</h6>
                <p>{{session('error')}}</p>
            </div>
            <button class="close" data-dismiss="alert"></button>
        </div>
    </div>
@endif
@if(session('success'))
    <div class="example-alert mb-1">
        <div class="alert alert-pro alert-success alert-dismissible">
            <div class="alert-text">
                <h6>Thành công</h6>
                <p>{{session('success')}}</p>
            </div>
            <button class="close" data-dismiss="alert"></button>
        </div>
    </div>
@endif
