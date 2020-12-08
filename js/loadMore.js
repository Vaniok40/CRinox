let offset = 0;

$(document).ready(function(){
    $.ajax({
        type: "GET",
        url: "loadFirstTime.php",
        data:{
            'offset': offset,
            'limit': 5
        },
        success: function(data){
            $(".works-grid").append(data);
            button()
            offset += 5;
        }
    })
})

$(".check-more").click(function(){
    $.ajax({
        type: "GET",
        url: "loadMore.php",
        data:{
            'offset': offset,
            'limit': 5
        },
        success: function(data){
            $(".works-grid").append(data);
            button()
            offset += 5
        }
    })
})