<!-- Teaser / Slider -->
<div id="teaser">
    <div class="flexslider loading">
        <ul class="slides">
            <li>
                <img src="<?= base_url() ?>assets/images/slides/s1.jpg" alt="banners">
            </li>
            <li>
                <img src="<?= base_url() ?>assets/images/slides/s2.jpg" alt="banners">
            </li>
            <li>
                <img src="<?= base_url() ?>assets/images/slides/s3.jpg" alt="banners">
            </li>
            <li>
                <img src="<?= base_url() ?>assets/images/slides/s4.jpg" alt="banners">
            </li>
        </ul>
    </div>
</div>


<div id="main" class="site-main container_16">
    <div class="inner">

        <!-- First widget areea -->
        <div class="grid_12 first-home-widget-area">
            <aside id="flexlatestnews" class="WPlookLatestNews flex-container-news">
                <div class="widget-title mright mleft">
                    <h3>सन्देश</h3>
                    <div class="clear"></div>
                </div>

                <div class="latestnews-body home flexslider-news">
                    <ul class="slides">
                        <li>
                            <div class="image fright"><img class="radius" src="<?= base_url() ?>assets/images/home/tikaram.jpg" alt="Image alt"></div>
                            <div class="content fleft">
                                <h3>संरक्षक :</h3>
                                <p align="justify" class="description">

                                    मुझे यह जानकर अति प्रसन्नता हुई है कि मेघवाल विकास समिति अलवर अपनी नई वेबसाइट को नए सिरे से प्रारंभ करने जा रही है। इस वेबसाइट के माध्यम से समिति विकास के नए द्धार को खोलने का प्रयास कर रही है। यह वेबसाइट समिति को वैश्विक बना देगी। विश्व में कही भी बैठा व्यक्ति समिति की गतिविधियों की जानकारी मात्र ऊंगलिया हिलाकर प्राप्त कर सकेगा। <br><br>

                                    मै इस वेबसाइट को नए सिरे से प्रारंभ करने के प्रयासों की सराहना करता हू। यह प्रयास सफल रहे, शुभ परिणाम दे, ऐसी मेरी मंगल कामना है। <br><br>

                                    <strong>टीकाराम जूली</strong><br>

                                    संरक्षक, मेघवाल विकास समिति जिला अलवर
                                </p>
                            </div>
                            <div class="clear"></div>
                        </li>
                    </ul>
                    <hr>
                    <ul class="slidess">
                        <li>
                            <div class="image fright"><img class="radius" src="<?= base_url() ?>assets/images/home/jila-adhyaksh.jpg" width="100%" alt="Image alt"></div>
                            <div class="content fleft">
                                <h3>जिलाध्यक्षः</h3>
                                <p align="justify" class="description">

                                    मेघवाल विकास समिति, जिला अलवर अपनी इस वेबसाइट के माध्यम से सूचना तकनीक के इस वर्तमान समय के साथ तालमेल स्थापित करने का प्रयास कर रही है। वर्तमान में इन्टरनेट को सूचनाओं और ज्ञान के स्रोत के रू प में देखा जा रहा है। ऐसे में मेघवाल विकास समिति की सूचनाओं, गतिविधियो को इन्टरनेट पर डालने की आवश्यकता अनुभव की जा रही थी, ताकि दूरदराज बैठा व्यक्ति समिति से सम्बन्धित समिति की गतिविधियो की जानकारी ले सके।
                                    <br><br>

                                    हमारा यह प्रयास रहेगा की यह वेबसाइट मेघवाल समाज को अधिक संगठित, सशक्त व एकजूट करते हूए समाज व देश के विकास को तीव्रता प्रदान करने में योगदान देगी। यद्धपि मेघवाल समाज अभी भी अशिक्षा, गरीबी, बेरोजगारी और व्यवसाय के संकट से संघर्ष कर रहा है। ऐसे समाज के लिए वेबसाइट की तो वास्तव में अति आवश्यकता है। आज के डिजिटल दौर में घर बैठे मोबाइल के द्धारा समिति की सम्पूर्ण जानकारी सदस्यों तक पहुंचे जा सके। यह वेबसाइट भी ऐसा ही प्रयास है।
                                    <br><br>
                                    इस वेबसाइट में समिति के बारे में अधिकाधिक जानकारी प्रस्तुत करने का प्रयास है। कमियों व सुझावों का सदैव स्वागत है। यह प्रयास सफल रहेगा इसी आशा के साथ।
                                    <br><br>
                                    <strong> आपका एम आर साँवरिया </strong><br>

                                    जिलाध्यक्ष मेघवाल विकास समिति, जिला अलवर
                                </p>
                            </div>
                            <div class="clear"></div>
                        </li>
                    </ul>

                </div>
            </aside>
        </div>


        <?php echo Modules::run('site_blocks/_sidebar_block'); ?>


        <!-- Forth widget areea -->
        <div class="grid_16 forth-home-widget-area">
            <aside id="wpltfbf-2" class="widget WPlookAnounce radius">
                <div class="announce-body mright mleft">
                    <div class="margin">
                        <h1>श्री बाबा गरीबनाथ छात्रावास</h1>
                        <br>
                        <a class="button grey square" href="<?= site_url('hostels/boys') ?>">अधिक जानने के लिए यहां क्लिक करें</a>
                    </div>
                </div>
            </aside>
        </div>

        <?php echo Modules::run('site_blocks/_dist_members_hp'); ?>
        <div class="clear"></div>

    </div>
</div>