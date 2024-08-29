<footer>
    <div class="container-fluid text-white text-right" style="background-color: #424750">
        <div class="container">
            <div class="row pb-4 pt-2 align-items-center">
                <div class="col-md-6">
                    <p>شنبه تا چهارشنبه از ساعت ۹ - ۱۷ و پنجشنبه‌ها از ساعت ۹ - ۱۳ پاسخگوی شما هستیم</p>
                    <p>برای مشاوره رایگان با ما تماس بگیرید: 1111-021</p>
                </div>
                <div class="col-md-6 text-left">
                    <a href="#"><img src="../img/enamad.png" alt="" class="img-fluid bg-white rounded py-3 "></a>
                    <a href="#"><img src="../img/samandehi.png" alt="" class="img-fluid bg-white rounded py-3 px-2"></a>
                    <a href="#"><img src="../img/etehadie.png" alt="" class="img-fluid bg-white rounded py-3"></a>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid text-white py-4 bg-dark" style="background-color: #212529">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12 text-right">
                    <span>کلیه حقوق این سایت متعلق به کلینیک طلایی می‌باشد.</span>
                </div>
                <div class="col-md-6 col-sm-12">
                    <i class="fab fa-linkedin-in" style="font-size: 1.8rem"></i>
                    <i class="fab fa-instagram mx-3" style="font-size: 1.8rem"></i>
                    <i class="fab fa-telegram-plane" style="font-size: 1.8rem"></i>
                </div>
            </div>
        </div>
    </div>

</footer>
<script>
    $(document).ready(function() {
        Total();
        $(document).on('change paste keyup','.count',function(){
            var count = $(this).val();
            var price = $(this).parent().siblings().find('.price');
            var baseprice = price.val();
            var totalprice = $(this).parent().siblings().find('.lastprice');
            totalprice.val(count*baseprice);
            Total();
        });
        function Total() {
            var sum = 0;
            $('.count').each(function () {
                sum += +$(this).val();
                $('#lastcount').html('<h4>'+sum+'</h4>');
            });

            var amount = 0;
            $('.lastprice').each(function () {
                amount += +$(this).val();
                $('#lasttotal').html('<h4>'+addCommas(amount)+'</h4>');
            });
        }

    });
    function addCommas(x) {
        var parts = x.toString().split(".");
        parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        return parts.join(".");
    }


</script>
</body>
</html>