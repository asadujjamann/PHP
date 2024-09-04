<?php
    $jsonData = file_get_contents("./json/cv.json");
    $cv = json_decode($jsonData, true);

    include "./templates/header.php";
?>


<div class="content">
    <!-- Header Start -->
    <div class="header" id="header">
        <div class="content-inner">
            <p><?= $cv["hero"]["greetings"]?>,</p>
            <h1><?= $cv["hero"]["introText"]?></h1>
            <h2></h2>
            <div class="typed-text">
                <?php
                    $expertises = $cv["hero"]["expertises"];
                    $lastElement = end($expertises);

                    foreach($expertises as $myExpertise){
                        echo $myExpertise;
                        if($myExpertise !== $lastElement){
                            echo ", ";
                        }
                    }
                ?>
            </div>

            <!-- 
            <div class="typed-text">
                Web Developer, WordPress Developer, Front-End Developer
            </div>
            -->
        </div>
    </div>
    <!-- Header End -->

    <!-- Large Button Start -->
    <div class="large-btn">
        <div class="content-inner">
            <!-- <a class="btn" href="#!"><i class="fa fa-download"></i>Resume</a>
            <a class="btn" href="#contact"><i class="fa fa-hands-helping"></i>Hire Me</a> -->
        </div>
    </div>
    <!-- Large Button End -->


    <!-- About Start -->
    <div class="about" id="about">
        <div class="content-inner">
            <div class="content-header">
                <h2>
                    <?= $cv["about"]["heading"]?>
                </h2>
            </div>
            <div class="row align-items-center">
                <div class="col-12">
                    <p>
                        <?= $cv["about"]["description"]?>
                    </p>
                    <a class="btn" href="#contact">
                        <i class="fa fa-hands-helping"></i>
                        <?= $cv["about"]["buttonText"]?>
                    </a>
                </div>
            </div>
            <div class="row skills-row">
                <?php 
                $skills = $cv["about"]["skills"];
                foreach($skills as $key => $value): ?>
                    <div class="col-md-6">
                        <div class="skills">
                            <div class="skill-name">
                                <p><?= $key?></p><p><?= $value?></p>
                            </div>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="<?= (int) $value?>" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- <div class="row">
                <div class="col-md-6">
                    <div class="skills">
                        <div class="skill-name">
                            <p>HTML, CSS</p><p>95%</p>
                        </div>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>

                        <div class="skill-name">
                            <p>PHP</p><p>85%</p>
                        </div>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="skills">
                        <div class="skill-name">
                            <p>JavaScript</p><p>85%</p>
                        </div>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="skill-name">
                            <p>WordPress Development</p><p>95%</p>
                        </div>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div> -->

        </div>
    </div>
    <!-- About End -->

    <!-- Education Start -->
    <div class="education" id="education">
        <div class="content-inner">
            <div class="content-header">
                <h2>Education</h2>
            </div>
            <div class="row align-items-center">

                <?php 
                    foreach($cv["education"]["description"] as $degreeItem):
                ?>

                <div class="col-md-6">
                    <div class="edu-col">
                        <span>
                            <?= $degreeItem["startTime"] ?> <i>to</i>
                            <?= $degreeItem["endTime"] ?>
                        </span>
                        <h3><?= $degreeItem["degreeName"] ?></h3>
                        <p><?= $degreeItem["degreeInfo"] ?></p>
                    </div>
                </div>
                
                <?php endforeach ?>

                <!-- <div class="col-md-6">
                    <div class="edu-col">
                        <span>2017 <i>to</i> 2018</span>
                        <h3>Master Degree</h3>
                        <p>I completed my post-graduation in Mathematics from National University (NU) during the 2017-2018 academic year. This advanced study deepened my analytical and problem-solving skills, which I now apply to my work in web development. My background in mathematics enhances my approach to coding and algorithmic thinking.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="edu-col">
                        <span>2013 <i>to</i> 2017</span>
                        <h3>Bachelor Degree</h3>
                        <p>I completed my graduation in Mathematics from National University (NU) between 2013 and 2017. This background has provided me with a strong analytical foundation and problem-solving skills that enhance my work in web development. My mathematical training helps me approach complex coding challenges with a logical and structured mindset.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="edu-col">
                        <span>2010 <i>to</i> 2012</span>
                        <h3>College</h3>
                        <p>I attended Domar Govt College from 2010 to 2012, where I pursued a science background that laid a solid foundation for my technical skills. The analytical thinking and problem-solving abilities I developed during these years have been instrumental in shaping my career as a web developer.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="edu-col">
                        <span>2006 <i>to</i> 2010</span>
                        <h3>High School</h3>
                        <p>I attended Domar M.L. High School from 2006 to 2010, where I pursued a science background, laying a strong foundation for my technical skills. My passion for problem-solving and analytical thinking, developed during these formative years, has greatly contributed to my career as a web developer.</p>
                    </div>
                </div> -->

            </div>
        </div>
    </div>
    <!-- Education Start -->

    <!-- Experience Start -->
    <div class="experience" id="experience">
        <div class="content-inner">
            <div class="content-header">
                <h2>Experience</h2>
            </div>
            <div class="row align-items-center">
                <?php 
                    $experience_details = $cv["experience"]["description"];
                    foreach($experience_details as $experience_item):
                ?>
                <div class="col-md-6">
                    <div class="exp-col">
                        <span>
                            <?= $experience_item["from"] ?> <i>to</i> 
                            <?= $experience_item["to"] ?>
                        </span>
                        <h3><?= $experience_item["workPlace"] ?></h3>
                        <h4><?= $experience_item["location"] ?></h4>
                        <h5><?= $experience_item["designation"] ?></h5>
                        <p><?= $experience_item["jobInfo"] ?></p>
                    </div>
                </div>
                <?php endforeach ?>

<!--                 
<div class="col-md-6">
    <div class="exp-col">
        <span>Apr-2021 <i>to</i> Present</span>
        <h3>Upwork</h3>
        <h4>USA</h4>
        <h5>WordPress Developer</h5>
        <p>I am currently working on Upwork as a WordPress Developer, collaborating with various clients to create and customize websites. My projects range from building new WordPress sites to enhancing existing ones, ensuring they meet clients' needs and expectations. I focus on delivering high-quality solutions, leveraging my expertise to provide tailored and effective services.</p>
    </div>
</div>
<div class="col-md-6">
    <div class="exp-col">
        <span>Jan-2022 <i>to</i> Jul-2022</span>
        <h3>WPDesigns</h3>
        <h4>United Kingdom</h4>
        <h5>Figma to WordPress</h5>
        <p>At WPDesigns, an agency I worked with through Upwork, I specialized in converting Figma designs into fully functional WordPress Elementor websites. My role involved translating design concepts into responsive and user-friendly web pages while maintaining design integrity. I collaborated closely with designers and clients to ensure the final product met their vision and expectations.</p>
    </div>
</div>
<div class="col-md-6">
    <div class="exp-col">
        <span>Jan-2023 <i>to</i> Dec-2023</span>
        <h3>Codersoft It Institute</h3>
        <h4>Dianjpur, Bangladesh</h4>
        <h5>Trainer | WordPress Development</h5>
        <p>At Codersoft IT Institute, I worked as a Trainer for WordPress Development, teaching students to build and customize WordPress sites. My training encompassed HTML, CSS, JavaScript, PHP, and WordPress, providing a thorough grounding in web development. This role enhanced my ability to explain complex concepts and support students in mastering essential skills.</p>
    </div>
</div>
<div class="col-md-6">
    <div class="exp-col">
        <span>Apr-2019 <i>to</i> May-2021</span>
        <h3>Rafusoft</h3>
        <h4>Dinajpur, Bangladesh</h4>
        <h5>Web Developer</h5>
        <p>At Rafusoft, I worked as a Website Developer, where I was responsible for designing, developing, and maintaining websites. I collaborated with clients to understand their requirements and implemented solutions using a range of technologies. My role involved ensuring optimal website performance and delivering projects that met high standards of quality and functionality.</p>
    </div>
</div>

-->
            </div>
        </div>
    </div>
    <!-- Experience Start -->

    <!-- Services Start -->
    <div class="service" id="service">
        <div class="content-inner">
            <div class="content-header">
                <h2>Services</h2>
            </div>
            <div class="row align-items-center">
                <?php 
                    $services_details = $cv["services"]["description"];
                    foreach($services_details as $service_item):
                ?>
                <div class="col-md-6">
                    <div class="srv-col">
                        <i class="<?= $service_item["icon_classes"] ?>"></i>
                        <h3><?= $service_item["serviceTitle"] ?></h3>
                        <p><?= $service_item["serviceInfo"] ?></p>
                    </div>
                </div>
                <?php endforeach ?>
<!-- 
<div class="col-md-6">
    <div class="srv-col">
        <i class="fa fa-desktop"></i>
        <h3>Web Development</h3>
        <p>I provide expert web development services, delivering customized and innovative solutions to meet diverse client needs.</p>
    </div>
</div>
<div class="col-md-6">
    <div class="srv-col">
        <i class="fa fa-laptop"></i>
        <h3>WordPress Development</h3>
        <p>I provide expert WordPress development services, specializing in creating, customizing, and optimizing websites to meet clients' specific needs.</p>
    </div>
</div>
<div class="col-md-6">
    <div class="srv-col">
        <i class="fa fa-search"></i>
        <h3>Figma to WordPress</h3>
        <p>I offer services in converting Figma designs to WordPress, ensuring seamless integration of design elements into functional, responsive websites.</p>
    </div>
</div>
<div class="col-md-6">
    <div class="srv-col">
        <i class="fa fa-envelope-open-text"></i>
        <h3>Front-End Development</h3>
        <p>In addition to my WordPress expertise, I provide professional front-end development services, ensuring that websites are visually appealing, responsive, and user-friendly.</p>
    </div>
</div> -->
            </div>
        </div>
    </div>
    <!-- Services Start -->

    <!-- Portfolio Start -->
    <div class="portfolio" id="portfolio">
        <div class="content-inner">
            <div class="content-header">
                <h2>Portfolio</h2>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <ul id="portfolio-flters">
                        <li data-filter="*" class="filter-active">All</li>

                        <?php 
                            $filter_items = $cv["portfolio"]["portfilio_filters"];
                            foreach($filter_items as $filter_item):
                        ?>
                        <li data-filter=".<?= $filter_item["attr_value"]?>">
                            <?= $filter_item["item_name"]?>
                        </li>
                        <?php endforeach ?>

                        <!-- <li data-filter=".web-dev">WordPress Dev</li>
                        <li data-filter=".front-end">Front-End Dev</li> -->
                    </ul>
                </div>
            </div>
            <div class="row portfolio-container">

                <?php 
                    $portfilio_items = $cv["portfolio"]["portfilio_items"];
                    foreach($portfilio_items as $portfilio_item):
                ?>

                <div class="col-lg-4 col-md-6 portfolio-item <?= $portfilio_item['attr_value']?> ">
                    <div class="portfolio-wrap">
                        <figure>
                            <img 
                                src="img/portfolio/<?= $portfilio_item['img_name_with_extension']?>" 
                                class="img-fluid" 
                                alt="<?= $portfilio_item['title']?>"
                            >
                            <a 
                                href="img/portfolio/<?= $portfilio_item['img_name_with_extension']?>"
                                data-lightbox="portfolio" 
                                data-title="<?= $portfilio_item['title']?>" 
                                class="link-preview" 
                                title="Preview"
                            >
                            <i class="fa fa-eye"></i></a>
                            <a 
                                href="<?= $portfilio_item['project_link']?>"
                                target="<?php
                                $http_has = str_contains($portfilio_item['project_link'], 'http');
                                echo $http_has == true ? '_blank' : '_self';
                                ?>"
                                class="link-details" 
                                title="More Details"
                            ><i class="fa fa-link"></i></a>
                            <div class="portfolio-title">
                                <?= $portfilio_item['title']?>
                                <span><?= $portfilio_item['working_field']?></span>
                            </div>
                        </figure>
                    </div>
                </div>

                <?php endforeach ?>

<!-- 
<div class="col-lg-4 col-md-6 portfolio-item web-dev">
    <div class="portfolio-wrap">
        <figure>
            <img src="img/portfolio/TreeStar.webp" class="img-fluid" alt="TreeStar">
            <a href="img/portfolio/TreeStar.webp" data-lightbox="portfolio" data-title="Children and Teens Counseling Practice" class="link-preview" title="Preview"><i class="fa fa-eye"></i></a>
            <a href="https://treestar.au/" target="_blank" class="link-details" title="More Details"><i class="fa fa-link"></i></a>
            <div class="portfolio-title">
                Children and Teens Counseling Practice
                <span>WordPress Development</span>
            </div>
        </figure>
    </div>
</div>

<div class="col-lg-4 col-md-6 portfolio-item web-dev">
    <div class="portfolio-wrap">
        <figure>
            <img src="img/portfolio/Rentproof.webp" class="img-fluid" alt="Rentproof">
            <a href="img/portfolio/Rentproof.webp" data-lightbox="portfolio" data-title="Developing a Rental Market" class="link-preview" title="Preview"><i class="fa fa-eye"></i></a>
            <a href="https://rentproof.co/" target="_blank" class="link-details" title="More Details"><i class="fa fa-link"></i></a>
            <div class="portfolio-title">
                Developing a Rental Market
                <span>WordPress Development</span>
            </div>
        </figure>
    </div>
</div>

<div class="col-lg-4 col-md-6 portfolio-item front-end">
    <div class="portfolio-wrap">
        <figure>
            <img src="img/portfolio/Formilla.com.webp" class="img-fluid" alt="Formilla.com">
            <a href="img/portfolio/Formilla.com.webp" data-lightbox="portfolio" data-title="Templates for Formilla.com" class="link-preview" title="Preview"><i class="fa fa-eye"></i></a>
            <a href="https://rentproof.co/" target="_blank" class="link-details" title="More Details"><i class="fa fa-link"></i></a>
            <div class="portfolio-title">
                Dashboard & Popup Templates for Formilla.com
                <span>Front-End Development</span>
            </div>
        </figure>
    </div>
</div>

<div class="col-lg-4 col-md-6 portfolio-item web-dev">
    <div class="portfolio-wrap">
        <figure>
            <img src="img/portfolio/Hoem.webp" class="img-fluid" alt="Hoem">
            <a href="img/portfolio/Hoem.webp" data-lightbox="portfolio" data-title="Managing rental property with ease" class="link-preview" title="Preview"><i class="fa fa-eye"></i></a>
            <a href="https://hoem.co/" target="_blank" class="link-details" title="More Details"><i class="fa fa-link"></i></a>
            <div class="portfolio-title">
                Managing rental property with ease
                <span>WordPress Development</span>
            </div>
        </figure>
    </div>
</div>

<div class="col-lg-4 col-md-6 portfolio-item web-dev">
    <div class="portfolio-wrap">
        <figure>
            <img src="img/portfolio/Northan-Star-Heat.webp" class="img-fluid" alt="Northan Star Heat">
            <a href="img/portfolio/Northan-Star-Heat.webp" data-lightbox="portfolio" data-title="Northan Star Heat" class="link-preview" title="Preview"><i class="fa fa-eye"></i></a>
            <a href="https://northernstarheat.com/" target="_blank" class="link-details" title="More Details"><i class="fa fa-link"></i></a>
            <div class="portfolio-title">
                One-stop-shop for all heating and cooling needs
                <span>WordPress Development</span>
            </div>
        </figure>
    </div>
</div>

<div class="col-lg-4 col-md-6 portfolio-item front-end">
    <div class="portfolio-wrap">
        <figure>
            <img src="img/portfolio/Eduport-Bootstrap-Template-Redesign.webp" class="img-fluid" alt="Eduport Bootstrap Template">
            <a href="img/portfolio/Eduport-Bootstrap-Template-Redesign.webp" data-lightbox="portfolio" data-title="Eduport Bootstrap Template" class="link-preview" title="Preview"><i class="fa fa-eye"></i></a>
            <a href="https://eduport-redesign.netlify.app/" target="_blank" class="link-details" title="More Details"><i class="fa fa-link"></i></a>
            <div class="portfolio-title">
                Eduport Bootstrap Template Redesign
                <span>Front-End Development</span>
            </div>
        </figure>
    </div>
</div> -->

            </div>
        </div>
    </div>
    <!-- Portfolio Start -->

    <!-- Review Start -->
    <div class="review" id="review">
        <div class="content-inner">
            <div class="content-header">
                <h2>My Client Says</h2>
            </div>
            <div class="row align-items-center review-slider">
                <?php 
                    $review_items = $cv["reviews"]["review_items"];
                    foreach($review_items as $review_item):
                ?>

                <div class="col-md-12">
                    <div class="review-slider-item">
                        <div class="review-text">
                            <p><?= $review_item['client_speech']?></p>
                        </div>
                        <div class="review-img">
                            <img src="img/review/<?= $review_item['img_name_with_extension']?>" alt="Tonny">
                            <div class="review-name">
                                <h3><?= $review_item['client_name']?></h3>
                                <p><?= $review_item['client_company']?></p>
                            </div>
                        </div>
                    </div>
                </div>

                <?php endforeach ?>
<!-- 
<div class="col-md-12">
    <div class="review-slider-item">
        <div class="review-text">
            <p>
                Asad is awesome to work with. We will definitely requesting his help on future projects. He's fast, responsive, talented, and on time! I couldn't have asked for a better experience. Thanks again Asad!
            </p>
        </div>
        <div class="review-img">
            <img src="img/review/Tonny.webp" alt="Tonny">
            <div class="review-name">
                <h3>Tony Gilyana</h3>
                <p>Formilla.com</p>
            </div>
        </div>
    </div>
</div>
<div class="col-md-12">
    <div class="review-slider-item">
        <div class="review-text">
            <p>
                A very positive experience working with Asad. The project was completely well and in a timely manner. He was considerate of deadlines and always maintained professional communication. I look forward to working with Asad again.
            </p>
        </div>
        <div class="review-img">
            <img src="img/review/Client.webp" alt="Client">
            <div class="review-name">
                <h3>Danielle Verrilli</h3>
                <p>Treestar.com</p>
            </div>
        </div>
    </div>
</div>
<div class="col-md-12">
    <div class="review-slider-item">
        <div class="review-text">
            <p>
                Asad did a great job and completely met my needs. Great communication, finished work on time, and overall a really good experience! Looking forward to working together again! Thank you!
            </p>
        </div>
        <div class="review-img">
            <img src="img/review/Client.webp" alt="Client">
            <div class="review-name">
                <h3>Mike Flynn</h3>
                <p>United States</p>
            </div>
        </div>
    </div>
</div> -->

            </div>
        </div>
    </div>
    <!-- Review End -->

    <!-- Contact Start -->
    <div class="contact" id="contact">
        <div class="content-inner">
            <div class="content-header">
                <h2>Contact</h2>
            </div>
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="contact-info">
                        <p>
                            <i class="fa fa-user"></i>
                            <?= $cv["contact"]["contact_items"]["developer_name"]?>
                        </p>
                        <p>
                            <i class="fa fa-tag"></i>
                            <?= $cv["contact"]["contact_items"]["designation"]?>
                        </p>
                        <p>
                            <i class="fa fa-envelope"></i>
                            <a href="mailto:<?= $cv["contact"]["contact_items"]["email"]?>">
                            <?= $cv["contact"]["contact_items"]["email"]?>
                            </a>
                        </p>
                        <p>
                            <i class="fa fa-phone"></i>
                            <a href="tel:<?= $cv["contact"]["contact_items"]["phone"]?>">
                                <?= $cv["contact"]["contact_items"]["phone"]?>
                            </a>
                        </p>
                        <p>
                            <i class="fa fa-map-marker"></i>
                            <?= $cv["contact"]["contact_items"]["address"]?>
                        </p>
                        <div class="social">

                            <?php 
                                $profile_links = $cv["contact"]["other_profile_links"];
                                foreach ($profile_links as $profile_link):
                            ?>
                            <a 
                                class="btn" 
                                href="<?= $profile_link['profile_link']?>"
                                target="<?php
                                $http_has = str_contains($profile_link['profile_link'], 'http');
                                echo $http_has == true ? '_blank' : '_self' ?>"
                            >
                                <i class="<?= $profile_link['icon_classes']?>"></i>
                            </a>
                            <?php endforeach ?>

                            <!-- <a class="btn" href="#!">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a class="btn" href="#!">
                                <i class="fa-brands fa-upwork"></i>
                            </a>
                            <a class="btn" href="#!">
                                <i class="fab fa-twitter"></i>
                            </a> -->
                            
                        </div>

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form">
                        <form action="#!">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" 
                                    placeholder="<?= $cv["contact"]["contact_form"]["placeholder_name"]?>" 
                                    required/>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="email" class="form-control" 
                                    placeholder="<?= $cv["contact"]["contact_form"]["placeholder_email"]?>" 
                                    required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" 
                                placeholder="<?= $cv["contact"]["contact_form"]["placeholder_subject"]?>" 
                                required/>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" rows="5" placeholder="<?= $cv["contact"]["contact_form"]["placeholder_message"]?>"></textarea>
                            </div>
                            <div>
                                <button class="btn" type="submit">
                                    <?= $cv["contact"]["contact_form"]["submit_btn_text"]?>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->


<?php include "./templates/footer.php"; ?>


