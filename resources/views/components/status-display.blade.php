<!--component to display session status (if any)-->
@if (session('status'))
    <div>{{ session('status') }}</div>
@endif