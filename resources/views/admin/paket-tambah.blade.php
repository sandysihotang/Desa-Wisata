@include('admin.layouts.header')
<div class="row mt-4 ml-2">
    <div class="container-fluid" id="vue">
        <div class="container-fluid">
            <div class="row">
                <div class="container">
                    <div class="row" style="width: 100%;">
                        <div class="container">
                            <div class="row">
                                <form method="post" action="{{url('save-new-paket')}}" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    ENTER TEXT: 
                                    <br> 
                                    <textarea rows="20" 
                                              cols="50" 
                                              name="harga1" 
                                              id="a"> 
                                  </textarea> 
                                  <input type="hidden" name="hiddenharga" id="hiddenharga" />
                                    <br> 
                                    <br> 
                                    <input type="submit" 
                                           name="submit"
                                           value="submit" 
                                           onclick="divide()" /> 
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('template.footer')

<script type="text/javascript"> 
        function divide() { 
            var txt; 
            txt = document.getElementById('a').value; 
            var text = txt.split("\n"); 
            var str = text.join('</br>'); 
            // document.write(str); 
            document.getElementById('hiddenharga').value = str;
        } 
    </script> 
