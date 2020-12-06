@include('admin.layouts.header')

<div class="container">
    <div class="row form-group">
        <div class="title">Tambah User</div>
    </div>
    <div class="container-fluid" id="vue">
    	@if($role === 2)
    		<tambah-user-byadmin></tambah-user-byadmin>
    	@elseif($role === 3)
    		<tambah-user></tambah-user>
    	@endif        
    </div>
</div>
@include('admin.layouts.footer')

