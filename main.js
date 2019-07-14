$(function() {
  $("#btn_cargar_mas").on("click", function() {
  var id = {id:$("#btn_cargar_mas").attr("name")};
    $.ajax({
      type : 'POST',
      url : '?b=ajax',
      data : id,
      $dataType : 'json',
      success: function(data) {
        var result = $.parseJSON(data);
        if (result.length<2) {
          $("#btn_cargar_mas").hide();
        }

        for (var i = 0; i < result.length; i++) {
          var text1 =`
          <br>
        <div class="card">
          <div id="carouselExampleControls`+result[i].id_publicacion+`" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
            `;
        if (result[i].img1) {
          var text2 = `
          <div class="carousel-item active">
            <img class="d-block w-100" src="app/imgs_pub/`+result[i].img1+`" alt="`+result[i].img1+`">
          </div>
          `;
        }else {
          var text2='';
        }
        if (result[i].img2) {
          var text3 = `
          <div class="carousel-item">
            <img class="d-block w-100" src="app/imgs_pub/`+result[i].img2+`" alt="`+result[i].img2+`">
          </div>
          `;
        }else {
          var text3='';
        }
        if (result[i].img3) {
          var text4 = `
          <div class="carousel-item">
            <img class="d-block w-100" src="app/imgs_pub/`+result[i].img3+`" alt="`+result[i].img3+`">
          </div>
          `;
        }else {
          var text4='';
        }
        if (result[i].img4) {
          var text5 = `
          <div class="carousel-item">
            <img class="d-block w-100" src="app/imgs_pub/`+result[i].img4+`" alt="`+result[i].img4+`">
          </div>
          `;
        }else {
          var text5='';
        }
          var text6 = `

          </div>
          <a class="carousel-control-prev" href="#carouselExampleControls`+result[i].id_publicacion+`" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleControls`+result[i].id_publicacion+`" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
        <div class="card-body">
          <h5 class="card-title">`+result[i].titulo+`</h5>
          <p class="card-text">`+result[i].texto+`</p>
          <p>publicado: `+result[i].fecha+`</p>
        </div>
        </div>
      <br><br>

          `;
          $("#card_pub").append(text1+text2+text3+text4+text5+text6);
          $("#btn_cargar_mas").attr("name",result[i].id_publicacion)

          //result[i]
        }

      },
      error : function(data) {
        alert("error")
      }

    });
  });

  ////////////////////////////////////

  $("#btn_cargar_mas_table").on("click", function() {
  var id = {id:$("#btn_cargar_mas_table").attr("name")};
    $.ajax({
      type : 'POST',
      url : '?b=ajax',
      data : id,
      $dataType : 'json',
      success: function(data) {
        var result = $.parseJSON(data);
        if (result.length<2) {
          $("#btn_cargar_mas_table").hide();
        }

        for (var i = 0; i < result.length; i++) {
          var trText = `
          <tr>  
          <td>`+result[i].fecha+`</td>
          <td>`+result[i].titulo+`</td>
          <td>`+result[i].texto+`</td>
          <td>`+result[i].img1+`</td>
          <td><a class="btn btn-danger" href="?b=deletePub&pub=`+result[i].id_publicacion+`&img1=`+result[i].img1+`&img2=`+result[i].img2+`&img3=`+result[i].img3+`&img4=`+result[i].img4+`"><i class="fas fa-trash"></i></a></td>
          </tr>
          `;
          $("#miTr").append(trText);
          $("#btn_cargar_mas_table").attr("name",result[i].id_publicacion)

          //result[i]
        }

      },
      error : function(data) {
        alert("error")
      }

    });
  });
});
