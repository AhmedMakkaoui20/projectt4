<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing page using html css</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <header>
        <nav>
            <div class="logo">
                EstateNex
            </div>
            <div class="menu">
                <a href="#">Home</a>
                <a href="#services">Our Service</a>
                <a href="#whyus">Why Us?</a>
                <a href="#properties">Properties</a>
                <a href="#contact">Contact Us</a>
            </div>
            <div class="register">
                <a href="register.php">Register</a>
            </div>
        </nav>

        <section id="home" class="home">
            <span>Home</span>
            <h1>Connecting Dreams Building Homes</h1>
        </section>

     <!-- SERVICES -->

    <section id="services" class="services">
        <h2>Our Services</h2>
        <div class="service-container">
            <div class="service-img">
                <img src="images/service.png" alt="">
            </div>
            <div class="service-txt">
                <p>At EstateNex, we take immense pride in offering a comprehensive range of real estate 
                    services designed to meet all your property needs. Our dedicated team of experts is 
                    committed to providing top-notch assistance, including property management, buying 
                    and selling support, and investment advisory. Whether you're in pursuit of your dream 
                    home, exploring profitable investment opportunities, or entrusting us with property 
                    management, we possess the knowledge and expertise to guide you every step of the way. 
                    With a focus on integrity and client satisfaction, EstateNex serves as your trusted 
                    partner in navigating the dynamic and competitive real estate market. Our commitment 
                    extends beyond transactions, aiming to create lasting relationships by delivering 
                    personalized solutions tailored to your unique goals. Let EstateNex be your beacon, 
                    guiding you towards success in finding your ideal property, making lucrative investments, 
                    and ensuring the seamless management of your valuable assets. Driven by a passion for 
                    excellence, we go beyond industry standards, redefining the essence of real estate 
                    services with innovation, transparency, and customer satisfaction. Explore our services
                    and let us help you turn your real estate goals into a vibrant reality.</p>
            </div>
        </div>
    </section>

    <!--WHY US-->

    <section id="whyus" class="whyus">
    <h2>Why Us?</h2>
    <div class="whyus-container">
        <div class="whyus-box">
            <h3>Maximum Exposure</h3>
            <p>Our real estate selling platform employs advanced marketing strategies 
            and leverages various channels to ensure your property gets maximum exposure. 
            From targeted online advertising to social media campaigns, we make sure your 
            listing reaches a wide and relevant audience, increasing the likelihood of a 
            quick and successful sale.</p>
        </div>

        <div class="whyus-box">
            <h3>User-Friendly Interface</h3>
            <p>We prioritize user experience with an intuitive and easy-to-navigate platform. 
                Whether you're a seasoned real estate professional or a first-time seller, 
                our platform's user-friendly interface ensures a seamless experience. Streamlined 
                processes, clear instructions, and interactive features make listing and managing 
                your property a hassle-free process.</p>
        </div>

        <div class="whyus-box">
            <h3>Data-Driven Insights</h3>
            <p>Gain a competitive edge with our platform's robust analytics and data-driven insights. 
                We provide sellers with comprehensive reports on market trends, property values, and 
                buyer behavior, empowering you to make informed decisions. This strategic advantage 
                enables you to position your property effectively and optimize your selling strategy 
                for success.</p>
        </div>

        <div class="whyus-box">
            <h3>Secure Transactions</h3>
            <p>We prioritize the security of your transactions through advanced encryption and secure 
                payment gateways. Our platform ensures transparency at every step of the selling process, 
                from initial listing to closing the deal. Sellers can trust that their transactions are 
                protected, fostering confidence among both buyers and sellers for a smooth and secure 
                real estate transaction.</p>
        </div>

    </div>
</section>

 <!--Properties-->

 <section id="properties" class="properties">
    <h2>Properties</h2>
    <p>Here are some photos of houses recently sold on our platform</p>
    
    <div class="property-images">
        <img class="property-image" src="images/house1.png" alt="Property 1">
        <img class="property-image" src="images/house2.png" alt="Property 2">
        <img class="property-image" src="images/house3.png" alt="Property 3">
        <img class="property-image" src="images/house4.png" alt="Property 4">
    </div>
</section>

 <!--Contact Us-->

 <section id="contact" class="contact">
    <h2>Contact Us</h2>
    <p>If you have any questions feel free to reach out</p>
    <div class="contact-boxes">
        <div class="contact-box">
            <h3>Email</h3>
            <p>amakkaoui1@student.gsu.edu</p>
        </div>
        
        <div class="contact-box">
            <h3>Phone Number</h3>
            <p>+1 (123) 456 6523</p>
        </div>
        
        <div class="contact-box">
            <h3>Address</h3>
            <p>Atlanta, GA 30303</p>
        </div>
    </div>
</section>

     <footer>
        <p>Designed by: Ahmed Makkaoui</p>
    </footer>

    </header>
</body>
</html>