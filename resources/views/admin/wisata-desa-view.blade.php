<link href="{{ asset('css/admin_style.css') }}" rel="stylesheet">
@include('admin.layouts.header')
<div class="container" id="vue">
	<p>{!! $objek->deskripsi !!}</p>
	<p><?php echo htmlspecialchars_decode($objek->deskripsi); ?></p>
    <wisata-desa-detail-admin></wisata-desa-detail-admin>
</div>
@include('admin.layouts.footer')

