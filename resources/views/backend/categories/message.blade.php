@if(session('message'))
    <div class="alert alert-info text-align">
        <strong>{{ session('message') }}</strong>
    </div>

    @elseif(session('error-message'))
        <div class="alert alert-danger text-align">
            <strong>{{ session('error-message') }}</strong>
        </div>


    @elseif(session('trash-message'))
    <div class="alert alert-info text-align">
        <strong>{{ session('trash-message') }}</strong>
    </div>
@endif