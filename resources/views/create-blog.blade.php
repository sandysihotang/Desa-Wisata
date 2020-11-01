@include('template.header')
<div class="row mt-4 ml-2">
    <div class="container-fluid" id="vue">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <p class="h2 font-weight-bold text-center">Tulis Cerita Kamu</p>
                </div>
                <div class="row" style="width: 100%;">
                    <div class="container">
                        <div class="row">
                            <editor-blog/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('template.footer')
