<x-layouts.clean :title="__('trans.403 Page Title')">

    <div class="row">
        <div class="col-lg-12">
            <div class="text-center mb-5">
                <h1 class="display-2 font-weight-medium">3<i class="bx bx-buoy bx-spin text-primary display-3"></i>4</h1>
                <h4 class="text-uppercase">{{ __('trans.403 Page Desc') }}</h4>
                <div class="mt-5 text-center">
                    <a class="btn btn-primary waves-effect waves-light" href="{{ route('home') }}">{{ __('trans.Back To Home') }}</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8 col-xl-6">
            <div>
                <img src="{{ url('assets/images/error-img.png') }}" alt="" class="img-fluid">
            </div>
        </div>
    </div>
    
</x-layouts.clean>