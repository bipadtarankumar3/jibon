<div class="row gy-3">
    <div class="col-6">
        <label>Business Name</label>
        <input type="text" name="business_name" value="{{ $system_info->business_name ?? '' }}" class="form-control">
    </div>
    <div class="col-6">
        <label>System Name</label>
        <input type="text" name="system_name" value="{{ $system_info->system_name ?? '' }}" class="form-control">
    </div>
    <div class="col-12">
        <label>Address</label>
        <input type="text" name="address" value="{{ $system_info->address ?? '' }}" class="form-control">
    </div>
    <div class="col-4">
        <label>Email Address</label>
        <input type="text" name="email" value="{{ $system_info->email ?? '' }}" class="form-control">
    </div>
    <div class="col-4">
        <label>Contact Number</label>
        <input type="text" name="contact_number" value="{{ $system_info->contact_number ?? '' }}" class="form-control">
    </div>
    <div class="col-4">
        <label>Currency</label>
        <input type="text" name="currency" value="{{ $system_info->currency ?? '' }}" class="form-control">
    </div>

    <!-- Logo 1 -->
    <div class="col-6">
        <label>Logo 1</label>
        <input type="file" name="logo1" class="form-control">
        @if(isset($system_info->logo_1))
            <img src="{{ URL::to('public/' . $system_info->logo_1) }}" alt="Logo 1" style="width: 100px; height: auto; margin-top: 10px;">
        @endif
    </div>

    <!-- Logo 2 -->
    <div class="col-6">
        <label>Logo 2</label>
        <input type="file" name="logo2" class="form-control">
        @if(isset($system_info->logo_2))
            <img src="{{ URL::to('public/' . $system_info->logo_2) }}" alt="Logo 2" style="width: 100px; height: auto; margin-top: 10px;">
        @endif
    </div>

    <!-- Submit Button -->
    <div class="col-12 text-end">
        <button type="button" class="btn btn-primary" onclick="saveSystemInfo()" >Save</button>
    </div>
</div>
