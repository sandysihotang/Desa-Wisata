@include('admin.layouts.header')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

<div class="container" id="vue">    
    <div class="title">Tambah Paket Wisata</div>
    <paket-tambah></paket-tambah>
</div>

<script type="text/javascript">
    $('#file-upload').change(function() {
        var i = $(this).prev('label').clone();
        var file = $('#file-upload')[0].files[0].name;
        $(this).prev('label').text(file);
    });
</script>

@include('admin.layouts.footer')
