@if($model->email_verified_at !== null)
    <svg width="35" class="mx-auto" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#29bd00"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M4 12.6111L8.92308 17.5L20 6.5" stroke="#3dff9b" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></g></svg>
@else
    <svg width="40" class="mx-auto" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><g id="Menu / Close_SM"><path id="Vector" d="M16 16L12 12M12 12L8 8M12 12L16 8M12 12L8 16" stroke="#ff9999" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></g></g></svg>
@endif
