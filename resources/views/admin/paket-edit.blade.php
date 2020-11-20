@include('admin.layouts.header')
<div class="row mt-4 ml-2">
    <div class="container-fluid" id="vue">
        <form method="post" action="{{url('save-new-paket')}}" enctype="multipart/form-data">
            {{csrf_field()}}
            <textarea name="harga1" id="a" value="hai</br>h</br>a</br>h</br>a"></textarea> 
            <input type="submit" name="submit" value="submit" onclick="divide()" /> 
        </form>
    </div>
</div>
@include('template.footer')

<script type="text/javascript"> 
    // }

    function display() { 
        var txt; 
        txt = "hai</br>h</br>a</br>h</br>a"; 
        var text = txt.split("</br>"); 
        var str = text.join('\n'); 
        // document.write(str); 
        return str;
    } 
</script>