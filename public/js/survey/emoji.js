$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
let page =$("#load_page")
var type = 0;
let data = ["", "", "", "", ""];
const option = ["", "Tốt", "Bình Thường", "Kém"];
const property = ["attitude", "knowledge", "time", "cost", "quality"];

function changeLv(type, lv) {
    data[type - 1] = option[lv];
    $('.checked-emoji-' + type).addClass('hidden')
    $('.emoji-' + type).removeClass('emoji-active')
    $('.emoji-' + type + '-' + lv).addClass('emoji-active')
    $('.check-emoji-' + type + '-' + lv).removeClass('hidden')
}


$("#add-form").submit(function (e) {
    e.preventDefault();
    let formData = new FormData();
    formData.append("customer_code",$('#eid').val())
    formData.append("note",$('#note').val())
    for (let i = 0; i < data.length; i++) {
        if (data[i] === ""){
            $('.error').addClass('hidden');
            $(window).scrollTop($("#type-check-" + i).offset().top);
            $('#error-'+i).removeClass('hidden')
            return;
        }
        formData.append(property[i],data[i]);
    }
    page.show()
    $('#submit-button').prop('disabled', true);
    $.ajax({
        url: "/HT02",
        type: "POST",
        data: formData,
        dataType: 'json',
        async: false,
        processData: false,
        contentType: false,
        success: function (response) {
            window.location.replace("http://htauto.com.vn");
        }, error: function (xhr, ajaxOptions, thrownError) {
            toastr.error(thrownError);
        },
    });
    page.hide()
    $('#submit-button').prop('disabled', false);
})

$('input[type="radio"]').on('change', function (e) {
    console.log(e.type);
    if ($('input[name="valid"]:checked').val() == 0) {
        $('.container-note').removeClass('hidden')
    } else $('.container-note').addClass('hidden')
});
$('.checkbox-container').on('click', function () {
    if ($(this).hasClass('checkbox-checked')) {
        $('.checkbox-' + $(this).data('type')).removeClass('hidden')
    } else {
        $('.checkbox-' + $(this).data('type')).addClass('hidden')
        $(this).removeClass('hidden')
    }
    $(this).toggleClass('checkbox-checked')
    $(this).find('.fa').toggleClass('fa-square-o').toggleClass('fa-check-square-o')
    if ($(this).data('option') === 1 || $(this).data('option') === 0) {
        $('.checkbox-special').removeClass('hidden')
    }
})
