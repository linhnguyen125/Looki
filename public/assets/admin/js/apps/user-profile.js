$(function () {
    document.getElementById("province").onchange = function () {
        var url = document.getElementById("updateDistrict").value;
        var value = document.getElementById("province").value;
        $.ajax({
            url: url,
            type: 'GET',
            data: {
                provinceId: value
            }
        }).done(function (data) {
            $("#district").html(data);
        });
    };

    document.getElementById("district").onchange = function () {
        var url = document.getElementById("updateWard").value;
        var value = document.getElementById("district").value;
        $.ajax({
            url: url,
            type: 'GET',
            data: {
                districtId: value
            }
        }).done(function (data) {
            $("#ward").html(data);
        });
    };
})

// function updateDistrict(object) {
//     var url = document.getElementById("updateDistrict").value;
//     var value = object.value;
//     $.ajax({
//         url: url,
//         type: 'GET',
//         data: {
//             provinceId: value
//         }
//     }).done(function(data) {
//         $("#district").html(data);
//     });
// }

// function updateWard(object) {
//     var url = document.getElementById("updateWard").value;
//     var value = object.value;
//     $.ajax({
//         url: url,
//         type: 'GET',
//         data: {
//             districtId: value
//         }
//     }).done(function (data) {
//         $("#ward").html(data);
//     });
// }
