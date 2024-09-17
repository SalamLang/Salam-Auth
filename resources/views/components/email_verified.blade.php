@if($model->email_verified_at !== null)
    <span>correct</span>
@else
    <span>incorrect</span>
@endif
