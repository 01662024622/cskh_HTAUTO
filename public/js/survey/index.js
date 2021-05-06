
// $(document).on('keydown', 'input[pattern]', function(e){
//     var input = $(this);
//     var oldVal = input.val();
//     var regex = new RegExp(input.attr('pattern'), 'g');
//     setTimeout(function(){
//         var newVal = input.val();
//         if(!regex.test(newVal)){
//             input.val(oldVal);
//         }
//     }, 0);
// });
let page = $('#load_page')
$().ready(function() {
    $("#add-form").submit(function(e) {
        e.preventDefault();
    }).validate({
        rules: {
            name_gara: {
                required: true,
            },
            name: {
                required: true,
            },
            phone: {
                required: true,
            },
            name_sale: {
                required: true,
            },
            phone_sale: {
                required: true,
            },
            address: {
                required: true,
            },
            province: {
                required: true,
            },
            year: {
                required: true,
            },
            month: {
                required: true,
            },
            day: {
                required: true,
            },
            city: {
                required: true,
            }
        },
        messages: {
            name_gara: {
                required: 'Câu trả lời của bạn không hợp lệ?',
            },
            name: {
                required: 'Câu trả lời của bạn không hợp lệ?',
            },
            phone: {
                required: 'Câu trả lời của bạn không hợp lệ?',
            },
            name_sale: {
                required: 'Câu trả lời của bạn không hợp lệ?',
            },
            phone_sale: {
                required: 'Câu trả lời của bạn không hợp lệ?',
            },
            address: {
                required: 'Câu trả lời của bạn không hợp lệ?',
            },
            province: {
                required: 'Câu trả lời của bạn không hợp lệ?',
            },
            year: {
                required: 'Câu trả lời của bạn không hợp lệ?',
            },
            month: {
                required: 'Câu trả lời của bạn không hợp lệ?',
            },
            day: {
                required: 'Câu trả lời của bạn không hợp lệ?',
            },
            city: {
                required: 'Câu trả lời của bạn không hợp lệ?',
            }
        },
        submitHandler: function(form) {
            page.show();
            $('#submit-button').prop('disabled', true);
            console.log(form)
            form.submit();
            page.hide()
            $('#submit-button').prop('disabled', false);
        }
    });
});
var yearOption='<option disabled selected value> -- Chọn năm -- </option>';
for (let i=1920;i<2005;i++){
    yearOption=yearOption+'<option>' +i+'</option>';
}
$('#year').html(yearOption);
