
</main>


<footer>
    
    <figure><img class="logoB" src="<?php echo $urlAccueil ?>assets/img/logo.jpg"></figure>
   <nav>
       <ul class="footer">
           <li>
               <a href="<?php echo $urlMentions?>"data-scroll>Mentions Légales</a>
             </li>
             <li><a href="<?php echo $urlContact ?>"data-scroll>Contact</a></li>
       </ul>
   </nav>
   </footer>
        <script  src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="  crossorigin="anonymous"></script>
        <script type="text/javascript" src="<?php echo $urlAccueil ?>assets/js/nav.js"></script>
        <script>
            // JE PEUX ECRIRE DU CODE JS
            // MAIS JE PEUX AUSSI ECRIRE DU CODE PHP
            urlAjax = "<?php echo $this->generateUrl('ajax'); ?>";  
        </script>
        <script type="text/javascript" src="<?php echo $urlAccueil ?>assets/js/ajax.js"></script>
        <script src="https://use.fontawesome.com/releases/v5.0.1/js/all.js"></script>
        <script type="text/javascript" src="<?php echo $urlAccueil ?>assets/js/script.js"></script>

    </body>
</html>
