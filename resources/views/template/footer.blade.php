<footer class="blog-footer container" id="foot" style="background-color: white;">
    <q-layout :style-fn="myTweak" class="container-fluid" container style="height: 200px">
        <q-footer class="bg-grey-8 text-white">
            <footer class="blog-footer" style="background-color: white;">
                <div class="row justify-content-center">
                    <p class="text-muted">
                        KEMENTERIAN PARIWISATA DAN EKONOMI KREATIF REPUBLIK INDONESIA | 2020
                    </p>
                </div>
                <div class="row justify-content-center">
                    <ul class="list-unstyled socila-list">
                        <li><a href="https://www.kemenparekraf.go.id/"><img src="/image/logo/Logo_Kemenparekraf.png"
                                    style="height: 60px; width: 60px" /></a>
                        </li>
                        <li><a href="https://www.del.ac.id/"><img src="/image/logo/Logo_ITDel.png"
                                    style="height: 60px; width: 60px" alt="" /></a></li>
                    </ul>
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