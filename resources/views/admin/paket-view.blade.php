<link href="{{ asset('css/admin_style.css') }}" rel="stylesheet">
@include('admin.layouts.header')
<div class="container" id="vue">
	<?php 
		$encodetext = htmlentities($paket->harga_termasuk);
        $finaltext = html_entity_decode($encodetext);
        ?>
        <p><?php echo($paket->harga_termasuk) ?></p>
    <paket-detail></paket-detail>
</div>
@include('template.footer')