
$(document).ready(function () {
    $.validator.addMethod(
            "space",
            function (value, element, regexp) {
                return this.optional(element) || regexp.test(value);
            },
            "Please check your input."
            );
    //Khi bàn phím được nhấn và thả ra thì sẽ chạy phương thức này
    $("#usercreate").validate({
        rules: {
            username: {
                required: true,
                space: /\s{1}/,
                // regex: /^[a-zA-Z-' ]*$/,
                minlength: 5,
                maxlength: 10
            },
            email: {
                required: true,
                minlength: 5,
                maxlength: 100
            }
        },
        messages: {
            username: {
                required: "Vui lòng nhập tên đăng nhập",
                space: "Vui lòng không có khoảng trống",
                // regex: "Vui lòng nhập chỉ ký tự",
                minlength: "Username tối thiểu 5 ký tự",
                maxlength: "Username tối đa 10 ký tự"
            },
            email: {
                required: "Bắt buộc phải điền email"
            }
        }
    });
});

