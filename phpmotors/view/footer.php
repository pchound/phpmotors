</div>
<div id="last">
    <hr id = "last_line">
    <div id="year_clock"></div>
</div>
</main>

<script>
        const navigation = document.querySelector('.navigation')
        const ham = document.querySelector('.ham');

        ham.addEventListener('click', () => {navigation.classList.toggle('responsive')}, false);

        // To solve the mid resizing issue with responsive class on
        window.onresize = () => {if (window.innerWidth > 760) navigation.classList.remove('responsive')};
</script>

<script src="js/small_nav.js"></script>
<script src="js/year_clock.js"></script>

</body>
</html>