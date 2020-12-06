<footer class="row footer" id="foot" style="background-color: white;">
    <q-layout view="lHh lpr lFf" container style="height: 300px">
        <q-footer class="bg-grey-8 text-white">
            <footer class="blog-footer" style="background-color: white; height: 190px">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-2"></div>
                        <div class="col-md-4" style="border-right: 3px solid black;">
                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-4">
                                    <a href="https://www.kemenparekraf.go.id/">
                                        <img src="/image/logo/Logo_Kemenparekraf.png"
                                             style="height: 120px; width: 120px"/>
                                    </a>
                                </div>
                                <div class="col-md-5">
                                    <p class="text-muted" style="text-align: left;">
                                        KEMENTERIAN PARIWISATA DAN EKONOMI KREATIF REPUBLIK INDONESIA | 2020
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card-title-home" style="text-align: left;">Total Visit: {{$countVisit}}</div>
                            <div class="card-title-home" style="text-align: left;">Total Visitor: {{$countVisitor}}
                            </div>
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                </div>
            </footer>
    </q-layout>
</footer>
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
                return {minHeight: offset ? `calc(50vh - ${offset}px)` : '50vh'}
            }
        }
    })
</script>
<script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({pageLanguage: 'id'}, 'google_translate_element');
    }
</script>
<script type="text/javascript"
        src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</html>
