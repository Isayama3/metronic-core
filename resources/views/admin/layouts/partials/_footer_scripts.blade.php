<script src="{{ asset('dashboard/js/scripts.bundle.js') }}"></script>
<script src="{{ asset('dashboard/plugins/global/plugins.bundle.js') }}"></script>
<script src={{ asset('dashboard/extensions/jquery/jquery.min.js') }}></script>
@include('admin.layouts.partials.scripts.delete')
@include('admin.layouts.partials.scripts.plugins')
@include('admin.layouts.partials.scripts.custom')
@stack('scripts')
<script>
    @if (session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: "{{ session('success') }}",
            timer: 3000,
            showConfirmButton: false
        });
    @endif
    @if (session('error'))
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: "{{ session('error') }}",
            timer: 3000,
            showConfirmButton: false
        });
    @endif

    @if (session('warning'))
        Swal.fire({
            icon: 'warning',
            title: 'Warning',
            text: "{{ session('warning') }}",
            timer: 3000,
            showConfirmButton: false
        });
    @endif

    @if (session('info'))
        Swal.fire({
            icon: 'info',
            title: 'Info',
            text: "{{ session('info') }}",
            timer: 3000,
            showConfirmButton: false
        });
    @endif
</script>
