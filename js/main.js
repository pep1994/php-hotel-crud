function init () {

    getPriceAndStatus();

    $('#sum').click(getSum);
    
  }

  $(document).ready(init);


  
  function getPriceAndStatus() {  

    $.ajax({
        method: "GET",
        url: "../php/getPagamenti.php",
        dataType: "json",
        success: function (data) {
            console.log(data);

            for (var element of data) {

                $('#status ul').append('<li>' + element.status + ":" + '</li>');
                $('#price ul').append('<li>' + element.price + "€" + '</li>');

            }
            
        },
        error: function (err) {
            alert(err);
        }
        
    });
  }


  function getSum () {

    $('#list-sum').html(" ");
        
    $.ajax({
        method: "GET",
        url: "../php/getSum.php",
        dataType: "json",
        success: function (data) {

            console.log(data);

            for (var element of data) {
                
                for (var key in element) {
                    $('#list-sum').append("<li>" + key + ": " + element[key] +  "</li>");
                        
                    }
                }

                $('#list-sum li').css('line-height', 2);
                $('#list-sum li:contains(sum)').after("<hr>");

            },

            error: function (err) {
                alert(err);
            }
               
    });

    }