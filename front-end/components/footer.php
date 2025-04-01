<footer>
    <div class="container">
        <div class="logo">
            <a href="#">
                <img style="width: 90px;" src="https://investinbmc.com/wp-content/uploads/2022/12/BMCPH-logo-web-1.png" alt="Logo">
            </a>
        </div>
        <div class="about">
            <div class="description">
                Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC.
            </div>
        </div>
        <div class="connect">
            <ul>
                <li>
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                </li>
                <li>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                </li>
                <li>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                </li>
            </ul>
        </div>
    </div>
</footer>

</body>
<!-- @slick slider -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<!-- @theme js -->
<script src="../front-end/assets/script/theme.js"></script>
<!-- @funcy box -->
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


<script>

        $(document).ready(function() {
            $('#toggleMode').click(function() {
                $('body').toggleClass('dark-mode');

                const icon = $('#modeIcon');
                if ($('body').hasClass('dark-mode')) {
                    icon.removeClass('bi-brightness-high').addClass('bi-moon-fill');
                } else {
                    icon.removeClass('bi-moon-fill').addClass('bi-brightness-high');
                }
            });
        });

    </script>
</html>