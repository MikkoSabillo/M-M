<?php include "../nav/header.php"?>
        <div class="page-header" style="margin-top: 0px;">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2>Contact</h2>
                    </div>
                    <div class="col-12">
                        <a class="sb" href="Homepage.php">Home</a>
                        <a href="Contact.php">Contact</a>
                    </div>
                </div>
            </div>
        </div>
        <main>
        <div class="contact">
            <div class="container">
                <div class="section-header text-center">
                    <p>Get In Touch</p>
                    <h2>Contact for any query</h2>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="contact-info">
                            <h2>Quick Contact Info</h2>

                            <div class="contact-info-item">
                                <div class="contact-info-icon">
                                    <i class="fa fa-map-marker-alt"></i>
                                </div>
                                <div class="contact-info-text">
                                    <h3>Address</h3>
                                    <p>+Paterno St. Tacloban CIty</p>
                                </div>
                            </div>


                            <div class="contact-info-item">
                                <div class="contact-info-icon">
                                    <i class="far fa-clock"></i>
                                </div>
                                <div class="contact-info-text">
                                    <h3>Opening Hour</h3>
                                    <p>Mon - Fri, 9:00 AM - 9:00 PM</p>
                                </div>
                            </div>
                            <div class="contact-info-item">
                                <div class="contact-info-icon">
                                    <i class="fa fa-phone-alt"></i>
                                </div>
                                <div class="contact-info-text">
                                    <h3>Call Us</h3>
                                    <p>+9123456789</p>
                                </div>
                            </div>
                            <div class="contact-info-item">
                                <div class="contact-info-icon">
                                    <i class="far fa-envelope"></i>
                                </div>
                                <div class="contact-info-text">
                                    <h3>Email Us</h3>
                                    <p>123@123.com</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="contact-form">
                            <div id="success"></div>
                            <form name="sentMessage" id="contactForm" method="post">
                                <div class="control-group">
                                    <input type="text" class="form-control" id="name" placeholder="Your Name" required="required" name="name"><br>
                           
                                </div>
                                <div class="control-group">
                                    <input type="email" class="form-control" id="email" placeholder="Your Email" name="email" required="required"> <br>
                                
                                </div>
                                <div class="control-group">
                                    <input type="text" class="form-control" id="subject" placeholder="Subject" required="required" name="subject"> <br>
                       
                                </div>
                                <div class="control-group">
                                    <textarea class="form-control" id="message" placeholder="Message" required="required" name="message"></textarea><br>
                 
                                </div>
                                <div>
                                    <button class="btn btn-custom" type="submit" id="sendMessageButton" name="submit">Send Message</button>
                                </div>
                            </form>
                        </div>
                    </div>
           
                </div>
            </div>
        </div>
<?php include "../nav/footer.php"?>