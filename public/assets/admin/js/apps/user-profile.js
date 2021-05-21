
function updateDistrict(object) {
    var url = document.getElementById("updateDistrict").value;
    var value = object.value;
    $.ajax({
        url: url,
        type: 'GET',
        data: {
            provinceId: value
        }
    }).done(function(data) {
        $("#district").html(data);
    });
}

function updateWard(object) {
    var url = document.getElementById("updateWard").value;
    var value = object.value;
    $.ajax({
        url: url,
        type: 'GET',
        data: {
            districtId: value
        }
    }).done(function(data) {
        $("#ward").html(data);
    });
}
