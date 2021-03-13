$('.menuTrigger').on('click', () => {
    $('.small_screen_menu').toggle('display');
});
$('.drop').on('click', () => {
    $('.down').toggle('display');
});
$('.drop').on('mouseleave', () => {
    $('.down').css('display', 'none');
});
$('.nav-item').on('click', function() {
    $(this).siblings().removeClass('active');
    $(this).addClass(' active');
});

// ===============================ticket bookimg=========//
$('.fromD').on('change', () => {
    $show = $('.fromD').val();
    $showt = $('.toD').val();
    $showv = $('.Vehicle').val();
    $showg = $('.seatval').val();
    if ($showg > 0) {
        $('.btnre').removeClass('disabled');
    } else {
        $('.btnre').addClass('disabled');
    };
    $.ajax({
        type: 'post',
        url: 'price.php',
        data: { 'val': $show, 'valt': $showt, 'valv': $showv, 'valg': $showg },
        cache: false,
        success: function(returnData) {
            var formatter = new Intl.NumberFormat('en-US', {
                style: 'currency',
                currency: 'NGN',
            });
            $priceTag = formatter.format(returnData);
            $('.totalPrice').html($priceTag);
            $('#totalPrice').val(returnData);
        }
    });
    $.ajax({
        type: 'post',
        url: 'toPlace.php',
        data: { 'val': $show },
        cache: false,
        success: function(returnData) {
            $('.toD').html(returnData);
        }
    });
    $.ajax({
        type: 'post',
        url: 'vehicle.php',
        data: { 'val': $show, 'valt': $showt },
        cache: false,
        success: function(returnData) {
            $('.Vehicle').html(returnData);
        }
    });
    $.ajax({
        type: 'post',
        url: 'seats.php',
        data: { 'val': $show, 'valt': $showt, 'valv': $showv },
        cache: false,
        success: function(returnData) {
            $('.seats').html(returnData);
        }
    });
    $.ajax({
        type: 'post',
        url: 'selectSeats.php',
        data: { 'val': $show, 'valt': $showt, 'valv': $showv },
        cache: false,
        success: function(returnData) {
            $('.seatval').html(returnData);
        }
    });
});
$('.toD').on('change', () => {
    $shown = $('.fromD').val();
    $showt = $('.toD').val();
    $showv = $('.Vehicle').val();
    $showg = $('.seatval').val();
    if ($showg > 0) {
        $('.btnre').removeClass('disabled');
    } else {
        $('.btnre').addClass('disabled');
    };
    $.ajax({
        type: 'post',
        url: 'price.php',
        data: { 'val': $show, 'valt': $showt, 'valv': $showv, 'valg': $showg },
        cache: false,
        success: function(returnData) {
            var formatter = new Intl.NumberFormat('en-US', {
                style: 'currency',
                currency: 'NGN',
            });
            $priceTag = formatter.format(returnData);
            $('.totalPrice').html($priceTag);
            $('#totalPrice').val(returnData);
        }
    });
    $.ajax({
        type: 'post',
        url: 'vehicle.php',
        data: { 'val': $show, 'valt': $showt },
        cache: false,
        success: function(returnData) {
            $('.Vehicle').html(returnData);
        }
    });
    $.ajax({
        type: 'post',
        url: 'seats.php',
        data: { 'val': $show, 'valt': $showt, 'valv': $showv },
        cache: false,
        success: function(returnData) {
            $('.seats').html(returnData);
        }
    });
    $.ajax({
        type: 'post',
        url: 'selectSeats.php',
        data: { 'val': $show, 'valt': $showt, 'valv': $showv },
        cache: false,
        success: function(returnData) {
            $('.seatval').html(returnData);
        }
    });
});
$('.Vehicle').on('change', () => {
    $shown = $('.fromD').val();
    $showt = $('.toD').val();
    $showv = $('.Vehicle').val();
    $showg = $('.seatval').val();
    if ($showg > 0) {
        $('.btnre').removeClass('disabled');
    } else {
        $('.btnre').addClass('disabled');
    };
    $.ajax({
        type: 'post',
        url: 'price.php',
        data: { 'val': $show, 'valt': $showt, 'valv': $showv, 'valg': $showg },
        cache: false,
        success: function(returnData) {
            var formatter = new Intl.NumberFormat('en-US', {
                style: 'currency',
                currency: 'NGN',
            });
            $priceTag = formatter.format(returnData);
            $('.totalPrice').html($priceTag);
            $('#totalPrice').val(returnData);
        }
    });
    $.ajax({
        type: 'post',
        url: 'seats.php',
        data: { 'val': $show, 'valt': $showt, 'valv': $showv },
        cache: false,
        success: function(returnData) {
            $('.seats').html(returnData);
        }
    });
    $.ajax({
        type: 'post',
        url: 'selectSeats.php',
        data: { 'val': $show, 'valt': $showt, 'valv': $showv },
        cache: false,
        success: function(returnData) {
            $('.seatval').html(returnData);
        }
    });
});
$('.seatval').on('change', () => {
    $shown = $('.fromD').val();
    $showt = $('.toD').val();
    $showv = $('.Vehicle').val();
    $showg = $('.seatval').val();
    if ($showg > 0) {
        $('.btnre').removeClass('disabled');
    } else {
        $('.btnre').addClass('disabled');
    };
    $.ajax({
        type: 'post',
        url: 'price.php',
        data: { 'val': $show, 'valt': $showt, 'valv': $showv, 'valg': $showg },
        cache: false,
        success: function(returnData) {
            var formatter = new Intl.NumberFormat('en-US', {
                style: 'currency',
                currency: 'NGN',
            });
            $priceTag = formatter.format(returnData);
            $('.totalPrice').html($priceTag);
            $('#totalPrice').val(returnData);
        }
    });
});

// 
// var $checkboxes = $('#indeterminate-checkbox');

// $checkboxes.click(function() {
//     var countCheckedCheckboxes = $checkboxes.filter(':checked').length;
//     alert(countCheckedCheckboxes);
// });
// $('.back').on('click', function() {
//     window.history.back();
// });
// $('.serv').on('mouseenter', () => {
//     // $('.inner_serv').css('margin-top', '0px');
//     // $(this).find("div").addClass('margin');
//     alert($(this).attr('id'))
// })