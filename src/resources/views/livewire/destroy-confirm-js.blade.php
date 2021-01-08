@section('scripts')
    <script>
        window.addEventListener('destroy-confirm', event => {
            Swal.fire({
                title:"{{ __('trans.Destroy Confirm.Title') }}",
                text:"{{ __('trans.Destroy Confirm.Text') }}",
                icon:"warning",
                showCancelButton: true,
                confirmButtonColor:"#f46a6a",
                cancelButtonColor:"#34c38f",
                cancelButtonText:"{{ __('trans.Back Button') }}",
                confirmButtonText:"{{ __('trans.Yes Button') }}"
            })
            .then(function(t){  
                if(t.value) {
                    @this.destroy(event.detail.row);
                }
            })
        });
    </script>
@endsection