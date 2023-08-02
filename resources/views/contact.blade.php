    

@include('navbar')

<h1 class="heading">contact us</h1>

<!-- contact section  -->

<section class="contact">

    <div class="image">
        <img src="assets/images/contact1.png" alt="">
    </div>

    <form action="">

        <div class="inputBox">
            <input type="text" placeholder="name">
            <input type="email" placeholder="email">
        </div>

        <input type="text" placeholder="subject" class="box">

        <textarea placeholder="message" name="" id="" cols="30" rows="10"></textarea>

        <input type="submit" class="btn" value="send">

    </form>

</section>

@include('footer')
















<!-- custom js file link -->
<script src="js/script.js"></script>

</body>
</html>