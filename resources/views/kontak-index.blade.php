<link href="{{ asset('css/style.css') }}" rel="stylesheet">
@include('template.header')
<div class="title">Kontak Pengelola</div>

<div class="row">
    <div class="container background">
        <div class="row form-group detail-body">
            <div class="col-md-4"></div>
            <div class="col-md-8">
                @foreach($list as $data)
                <!-- <div class="row"> -->
                <div class="detail-title">{{ $data->nama }}</div>
                <div class="row">
                    <div class="col-md-4">Posisi / Tanggung Jawab</div>
                    <div class="col-md-8">{{ $data->posisi }}</div>
                </div>
                <div class="row">
                    <div class="col-md-4">Email</div>
                    <div class="col-md-8">{{ $data->email}}</div>
                </div>
                <div class="row">
                    <div class="col-md-4">No. HP</div>
                    <div class="col-md-8">{{ $data->no_hp}}</div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@include('admin.layouts.footer')

<script type="text/javascript"> 
    function display() { 
        var txt; 
        txt = "hai</br>h</br>a</br>h</br>a"; 
        var text = txt.split("</br>"); 
        var str = text.join('\n'); 
        document.write(str); 
        // return str;
    } 
</script>