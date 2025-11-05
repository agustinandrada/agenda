@include('app')
@yield('content')
@if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if (session('success'))
    <div class="alert alert-success">
        <span>{{ session('success') }}</span>
    </div>
@endif
<div class="container d-flex justify-content-center align-items-middle">
    <div class="card shadow-lg mt-3 mb-3" style="width: auto;">
        <div class="card-header d-flex justify-content-between">
            <h5>AGENDA</h5>
            <a href="{{ route('new') }}" class='btn btn-primary'>
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="white"
                    class="bi bi-person-plus-fill" viewBox="0 0 16 20">
                    <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                    <path fill-rule="evenodd"
                        d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5" />
                </svg></a>
        </div>
        <div class="card-body table-responsive overflow-auto">
            @include('tables.index')
        </div>
        <div class="card-footer d-flex justify-content-center">
            {{ $contacts->links('pagination::bootstrap-4') }}
        </div>
    </div>
</div>
