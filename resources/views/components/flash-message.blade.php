@if (session('succes'))
 <div> class="alert alert-success">{{ session(key: 'success') }}</div>   
@endif
@if (session('warning'))
 <div> class="alert alert-success">{{ session(key: 'warning') }}</div>   
@endif
@if (session('danger'))
 <div> class="alert alert-success">{{ session(key: 'danger') }}</div>   
@endif
