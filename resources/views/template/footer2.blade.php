<div class="row">
    <footer class="mt-5 footer container-fluid" id="foot" style="background-color: #f7f7f7;">
        <q-layout view="lHh lpr lFf" container style="height: 400px">
            <q-footer class="bg-grey-8 text-white">

                <footer class="blog-footer">
                    <div class="container-fluid">
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <b>
                                                <p
                                                    style="text-align: left; color: #6c757d !important; font-family: 'BentonSans Regular';">
                                                    Peta Lokasi {{ config('app.name', 'Desa Wisata') }}</p>
                                            </b>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <iframe
                                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d30132.95940715932!2d98.93113207525435!3d2.6613087887!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3031eea4f04ecdf9%3A0xdcb418d291eb80ce!2sParapat%2C%20Girsang%20Sipangan%20Bolon%2C%20Kabupaten%20Simalungun%2C%20Sumatera%20Utara!5e1!3m2!1sid!2sid!4v1613059192266!5m2!1sid!2sid"
                                            class="w-100" height="300" frameborder="0" style="border:0;"
                                            allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <b>
                                                        <p
                                                            style="text-align: left; color: #6c757d !important; font-family: 'BentonSans Regular';">
                                                            Hubungi Kami</p>
                                                    </b>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <p
                                                        style="text-align: left; color: #6c757d !important; font-family: 'BentonSans Regular';">
                                                        Kelompok Sadar Wisata (Pokdarwis)</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <p
                                                        style="text-align: left; color: #6c757d !important; font-family: 'BentonSans Regular';">
                                                        {{ config('app.name', 'Desa Wisata') }}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <p
                                                        style="text-align: left; color: #6c757d !important; font-family: 'BentonSans Regular';">
                                                        Telepon & Whatsapp:
                                                        <?php echo(strip_tags($kontak_pokdarwis->deskripsi)); ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-5">
                                        <div class="col-md-12">
                                            <b>
                                                <p
                                                    style="text-align: left; color: #6c757d !important; font-family: 'BentonSans Regular';">
                                                    Total Visit: {{$countVisit}}</p>
                                                <p
                                                    style="text-align: left; color: #6c757d !important; font-family: 'BentonSans Regular';">
                                                    Total Visitor: {{$countVisitor}}</p>
                                            </b>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-3">
                                        <a href="https://www.kemenparekraf.go.id/">
                                            <img src="/image/logo/Logo_Kemenparekraf.png"
                                                 style="height: 70px; width: 70px"/>
                                        </a>
                                    </div>
                                    <div class="col-md-8 mt-1">
                                        <p class="text-muted"
                                           style="text-align: left; font-family: 'BentonSans Regular';">
                                            KEMENTERIAN PARIWISATA DAN EKONOMI KREATIF REPUBLIK INDONESIA | 2020
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
        </q-layout>
    </footer>
</div>
</div>
<script src="{{ asset('js/app.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/vue@^2.0.0/dist/vue.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/quasar@1.14.3/dist/quasar.umd.min.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fontfaceobserver/2.0.4/fontfaceobserver.standalone.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.slim.min.js'></script>
<script src="{{ asset('js/script_menu.js') }}"></script>
<script>
    new Vue({
        el: '#homes',
        data() {
            return {
                slide: 'first'
            }
        }
    })
    new Vue({
        el: '#berita-terbaru'
    })
    new Vue({
        el: '#wisata-desa'
    })
    new Vue({
        el: '#booking-wisata'
    })
    new Vue({
        el: '#menus'
    })
    new Vue({
        el: '#foot',
        methods: {
            myTweak(offset) {
                return {
                    minHeight: offset ? `calc(50vh - ${offset}px)` : '50vh'
                }
            }
        }
    })
</script>
<script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
            pageLanguage: 'id'
        }, 'google_translate_element');
    }
</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
</script>

</html>
