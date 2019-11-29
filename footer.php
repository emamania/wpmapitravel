    <footer>
        <div class="footer">
            <div class="emagrid md-grid-12">
                <div class="md-cols-5">
                    <div class="info">
                        <h3>Machupicchu Travel</h3>
                        <p><strong>E-mail:</strong><a rel="nofollow" href="/chat/" class="live-chat" target="_blank">info@machupicchu.biz</a></p>
                        <p><strong>Hotmail:</strong><a rel="nofollow" href="/chat/" class="live-chat" target="_blank">mapitravel@hotmail.com</a></p>
                        <p><strong>Teléfonos: </strong><a href="/skype/" target="_blank">+51-84-223010</a></p>
                        <p><strong>Móvil:</strong><a rel="nofollow" href="https://media.perunoticias.net/html/skype.html" class="live-skype" target="_blank">+51-984630919 - +51 984654111</a></p>
                        <p><strong>Oficina Cusco:</strong><span> Jr. José Santos Chocano G-5, Urb. Santa Mónica.</span></p>
                        <p><strong>Oficina Machupicchu:</strong> <span> Calle Imperio de los Incas S/N</span></p>
                        <p><img alt="Contactanos por Whatsaap" style="margin-right:3px;float:left;width: 20px;display: flex;" src="https://www.machupicchu.com.pe/imagenes/whatsapp.png"><strong>WhatsApp:</strong> <a href="#" target="_blank">+51984630919 - +51 984654111 - +51923375399</a></p>
                        <?php 
                            setlocale(LC_TIME, "es_ES");
                            //	echo 1("%A");
                                
                            //	$dias7 = strtotime($hoy."+ 7 days");
                            //	echo "Tipo de cambio para MT  3.30 del " . strftime(date("d")). " de ". strftime(date("F")). " al " . strftime(date("d", $dias7)). " de " . strftime(date("F", $dias7));
                            // Mostrar el nombre del Mes en español %B
                            function MostrarFechas(){
                                $fLunes;
                                $fSuma;
                                $hoy = date("d-m-Y");
                                switch(date("w")){
                                    case 1:
                                        $fLunes = strtotime($hoy."+ 0 days");
                                        $fSuma = strtotime($hoy."+ 7 days");
                                        break;
                                    case 2:
                                        $fLunes = strtotime($hoy."- 1 days");
                                        $fSuma = strtotime($hoy."+ 6 days");
                                        break;
                                    case 3:
                                        $fLunes = strtotime($hoy."- 2 days");
                                        $fSuma = strtotime($hoy."+ 5 days");
                                        break;
                                    case 4:
                                        $fLunes = strtotime($hoy."- 3 days");
                                        $fSuma = strtotime($hoy."+ 4 days");
                                        break;
                                    case 5: 
                                        $fLunes = strtotime($hoy."- 4 days");
                                        $fSuma = strtotime($hoy."+ 3 days");
                                        break;
                                    case 6:
                                        $fLunes = strtotime($hoy."- 5 days");
                                        $fSuma = strtotime($hoy."+ 2 days");
                                        break;
                                    case 0:
                                        $fLunes = strtotime($hoy."- 6 days");
                                        $fSuma = strtotime($hoy."+ 1 days");
                                        break;
                                    default :
                                        echo "No concuerda con ningun dia de la semana";
                                        break;
                                }
                                return $fechaMostrar = "Tipo de cambio para Machu Picchu Travel S/. 3.40 del ".strftime(date("d",$fLunes))." de ".strftime("%B",$fLunes)." al ".strftime(date("d",$fSuma))." de ". strftime("%B", $fSuma);
                                }
                            echo '<p>'. MostrarFechas().'</p>';
                            
                        ?>
                    </div>
                </div>
                <div class="md-cols-4">
                    <div class="destinos">
                        <h3>Todo sobre Machu Picchu</h3>                        
                        <div class="arti">
                            <div class="omega">
                                <ul>
                                    <li><a href="http://www.entradasamachupicchu.com">Entradas a Machupicchu</a></li>
                                    <li><a href="http://news.machupicchu.com.pe">Noticias de Machupicchu</a></li>
                                    <li><a href="http://testimonios.machupicchu.com.pe">Referencias a Machupicchu</a></li>
                                    <li><a href="http://www.machupicchutravelagency.com/">Tours to Machu Picchu</a></li>
                                </ul>
                            </div>
                            <div class="alpha">
                                <ul>
                                    <li><a href="http://www.machupicchuviajes.com/maravillas-del-peru">Destinos del Perú</a></li>
                                    <li><a href="http://www.agenciadeviajesmachupicchu.com/modules/news/article.php?storyid=73">Aerolíneas a Perú</a></li>
                                    <li><a href="http://www.hotelesperu.com/">Hoteles en Perú</a></li>
                                    <li><a href="http://www.caminoinca.pe/">Camino Inca</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="md-cols-3">
                    <div class="our">
                        <h3>Premio a la Calidad</h3>
                        <div class="embed-responsive embed-16by9">
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/jx9WmW8iVV4"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footbar">
            <div class="emagrid md-grid-1">
                <div class="copyright">
                    <div class="rs">
                        <ul>
                            <li><p>Siguenos en:</p></li>
                            <li>
                                <a href="https://www.facebook.com/machupicchu" target="_blank" rel="nofollow">
                                    <i class="fab"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://twitter.com/machupicchusa" target="_blank" rel="nofollow">
                                    <i class="twi"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.instagram.com/machupicchutravel" target="_blank" rel="nofollow">
                                    <i class="ins"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.youtube.com/machupicchutravel/videos" target="_blank" rel="nofollow">
                                    <i class="you"></i>
                                </a>
                            </li>                            
                        </ul>
                    </div>
                    <p>Copyright 2019 © MACHUPICCHU BIZ</p>
                </div>
            </div>
        </div>
        <div class="footinfo">
            <div class="messenger">
                <a href="#">
                                
                </a>
            </div>
            <div class="whatsapp">
                <a href="https://api.whatsapp.com/send?phone=51984630919&text=Hola Machupicchu Travel. Me gustaría información sobre.">
                    <div class="cb-whats_b"><div class="cb-whats_ico"></div></div>
                    <p>Consulta aquí sobre tu Viaje</p>                              
                </a>
            </div>
        </div>
    </footer>
    <?php wp_footer(); ?>
</body>
</html>