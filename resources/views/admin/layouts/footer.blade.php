<div class="row footer" id="foot">
    <q-layout view="lHh lpr lFf" container style="height: 400px">
        <q-footer elevated class="bg-grey-8 text-white">
            <footer class="blog-footer" style="background-color: white;">
                <div class="row justify-content-center">
                    <p class="text-muted">
                        KEMENTERIAN PARIWISATA DAN EKONOMI KREATIF REPUBLIK INDONESIA | 2020
                    </p>
                </div>
                <div class="row justify-content-center">
                    <ul class="list-unstyled socila-list">
                        <li><a href="https://www.kemenparekraf.go.id/"><img src="/image/logo/Logo_Kemenparekraf.png"
                                                                            style="height: 60px; width: 60px"/></a>
                        </li>
                        <li><a href="https://www.del.ac.id/"><img src="/image/logo/Logo_ITDel.png"
                                                                  style="height: 60px; width: 60px"
                                                                  alt=""/></a></li>
                    </ul>
                </div>
            </footer>
    </q-layout>
</div>
</div>
</div>
</body>
<script src="{{ asset('js/app.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/vue@^2.0.0/dist/vue.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/quasar@1.14.3/dist/quasar.umd.min.js"></script>
<script>
    new Vue({
        el: '#foot'
    })

</script>
</html>
