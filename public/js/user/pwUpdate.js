$('#current-pw').change(function() {
    $.ajax({
        type:"POST",
        url: '/application/controller/json.php',
        dataType: 'json',
        success: function(data) {
            var str = '';
            for(var id in data) {
                str += data[id];
            }
            alert(str);
        },
        error: function() {
            alert('error');
        }
    });
});