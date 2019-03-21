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
          $("#Patrimonio").hide()
          $("#ordem_servico").hide();
         // $("#Marca").val(data.marca);
          //$("#Modelo").val(data.modelo);
         // $("#Descricao").val(data.Descricao);
         
        },
        error:function(err){
          console.log(err);
        }
    })
  });
   