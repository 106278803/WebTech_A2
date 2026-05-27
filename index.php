<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Home page for the website">
        <meta name="author" content="Lachie Colville">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" href="styles\style.css">
        <link rel="icon" href="styles/cross.png">

        <title>Website Wellness Home</title>
    </head>
    <body>
    <!--Header that contains the nav bar and regular headings-->
        <?php include 'header.inc' ?>
        <br>
    <!-- Main content, structured as a grid -->
        <main class="bgimage grid">
            <section>
                <h2 style="color:brown; font-style: italic">Wellness is well-worth it</h2>
                <p>Website wellness is the one-stop-shop for all your digital wellbeing needs. At website wellness, we provide a variety of different web-based and phone-based services that can help improve you life as soon as possible!</p>
            </section>
            <section>
                <h2>Please check out some of our services!</h2>
                <table>
                    <tr>
                        <th>Services</th>
                        <th>Availability</th>
                        <th>Pricing</th>
                    </tr>
                    <tr>
                        <td>Prescription Renewal</td>
                        <td>Telehealth/Zoom</td>
                        <td rowspan="3">All free!</td>
                    </tr>
                    <tr>
                        <td>Therapy</td>
                        <td>Zoom</td>
                    </tr>
                    <tr>
                        <td>GP Consultation</td>
                        <td>Telehealth/Zoom</td>
                    </tr>
                </table>
            </section>
            <section>
                <h2>Join us</h2>
                <p>We are always on the lookout for interested individuals to join our team. If you are interested in joining us, please have a look at our <a href="jobs.html" class="nogap">jobs page</a> for all current openings and our <a href="apply.html" class="nogap">apply page</a> to apply for any current job openings both related to wellness and the technical side of our website!</p>
            </section>
            <section>
                <h2>Telehealth sessions are regularly available!</h2>
                <img src="styles/telehealth.jpeg" alt="A photo of a telehealth appointment">
            </section>    
        </main>
        
        <!--Footer housing all relevnant information-->
        <?php include 'footer.inc' ?>
        
    </body>
</html>
