    $("#divBtnEdit button").on("click", function(e){
    $.ajax({
        type:'POST',
        url:'home_ajax.php',
        dataType:'json',
        success:function(data){
          //console.log(data.problema);
          //$("#problema").val(data.problema);
          $("#Patrimonio").val(data.patrimonio);
          $("#ordem_servico").val(data.ordem_servico);
         // $("#Marca").val(data.marca);
          //$("#Modelo").val(data.modelo);
         // $("#Descricao").val(data.Descricao);
         
        },
        error:function(err){
          console.log(err);
        }
    })
  });
    $("#Feito").on("click",function(){
      $.ajax({
        type: 'POST',
        url:'home_ajax',
        dataType:'json',
        success:function(data){
          var $pronto = $(this);
          var $i = $(this).attr("data-id");
          alert(console.log($i));

          if($pronto.prop("checked") == false)
          {
            $(".manutencao").show();
            $(".ok").hide();
            alert("nao esta checado");
          }
          else
          {
            $(".manutencao").hide();
            $(".ok").show();
            alert("checado");
          }
        },
        error:function(err){
          console.log(err);
        }
      })
    });

    $(document).ready(function(){
    $('.datepicker').datepicker();
  });

  $('.textarea').val('New Text');
  M.textareaAutoResize($('.textarea'));