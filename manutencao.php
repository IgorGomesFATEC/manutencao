<?php
//header
include_once 'includes/header.php';
//selecionando o id
$id = $_GET['id'];
?>
<div class="container center">
<form class="col s12" action="CRUD/create.php" method="POST">
	<div class="row">
	<div class="col s12">
		<h5 class="center">Peças utilizadas</h5>
		<div class="row center">
		    <div class="col s12 center">
		      <div class="row">
		        <div class="input-field col s8">
		          <i class="material-icons prefix">search</i>
		          <input type="text" id="pecas" class="autocomplete" name="pecas">
		          <label for="pecas">Peças no estoque</label>
		        </div>
		        <br>
		        <div class="right-align">
		 			<button class="btn waves-effect waves-light" type="submit" name="btn-add-peca">
		 			Submit<i class="material-icons right">add</i>
  				</button>
  			</div>
		        <div class="col">
				</div>
				<input type="hidden" name="id-ordem" placeholder="id da ordem de serviço clicada" id="id-ordem" value="<?php echo $id?>">
					
		     		<!--<div class="row">
					<div class="input-field col s6">
						<i class="material-icons prefix">textsms</i>
	          			<input id="descricao" type="text" class="validate materialize-textarea">
	          			<label for="descricao">Descrição do serviço</label>
	        		</div>
				</div>-->
		      </div>
		    </div>
		  </div>
		</div>
	</div>
</form>
	<div class="col s12 center"><h5>Peças selecionadas</h5></div>
	<br>
	 <table class="highlight centered">
	        <thead>
	          <tr>
	              <th>Marca da peça</th>
	              <th>Modelo da peça</th>
	              <th>Descrição da peça</th>
	          </tr>
	        </thead>

	        <tbody>
	        	<?php
	        	$sql = "SELECT * FROM pecas_utilizadas pu INNER JOIN itens_sme p ON pu.id_itens = p.id_itens INNER JOIN ordem_servico o on o.id_ordem_servico = pu.id_ordem_servico where pu.id_ordem_servico = '$id'";
		    $resultado = mysqli_query($connect, $sql);
		     while ($dados = mysqli_fetch_array($resultado)) 
     		{             
	        	?>
	          <tr>
	            <td><?php echo $dados['MARCA'];?></td>
	            <td><?php echo $dados['MODELO'];?></td>
	            <td><?php echo $dados['descricao'];?></td>
	          </tr>
	      <?php } ?>
	        </tbody>
	      </table>
</div>
<br>

<div class="right-align">
	<a class="btn waves-effect waves-light modal-trigger" style="margin: 10px;" href="#modal-conc">Concluir Serviço<i class="material-icons right">add</i></a>
</div>
<br>
<!-- Modal Structure -->
<form class="col s12 " action="CRUD/edit.php" method="POST"> 

<div id="modal-conc" class="modal bottom-sheet"  >
  <div class="modal-content">
    
    <h4>Concluir Serviço</h4>
      <!-- Page Layout here -->
      <div class="row">
        <div class="col s12">
          <div class="row">
			<div class="input-field col s6">
	          <textarea id="textarea1" class="materialize-textarea" name="descricao"></textarea>
	          <label for="textarea1">Descrição</label>
	        </div>
          </div>
          <div class="row">
            <div class="input-field col s1">
              <input type="text" name="ordem_servico" id="ordem_servico" value="<?php echo $id?>">
            </div>
            <div class="right-align">
				<button class="btn waves-effect waves-light" style="margin: 10px;" type="submit" name="btn-conc-ordem">Concluir Serviço<i class="material-icons right">add</i></button>
			</div>
          </div>
        </div>
      </div>
  </div>
</div>
</form>
<?php
include_once 'includes/footer.php'
?>
<script type="text/javascript">
//TODO tentar alimentar a tabela com ajax



$(document).ready(function(){
  $('.modal').modal();

  var dados;
  $.ajax({
	type:'POST',
	url: 'get-pecas.php?pecas=',
	dataType:'json',
	async:false,
	success: function(data){
  	   dados = data;
 	},
	error: function(err){
	   console.log(err.responseText);
	}
  });

  console.log(dados);
  

  $('#pecas').autocomplete({
	source: 'get-pecas.php',
	data:dados
  });

 /*  $.ajax({
        type:'POST',
        url:'home_ajax.php',
        dataType:'json',
        success:function(data){
         for(var i=0;i<data.length;i++)
          {
            $("#id-ordem").val(data[i].ordem_servico)
          }
        },
        error:function(err){
          console.log(err);
        }
    })*/

});
 /*$(document).ready(function(){
    $('#pecas').autocomplete({
      data: {
        "Apple": null,
        "Microsoft": null,
        "Google": 'https://placehold.it/250x250'
      },
    });
  });*/
</script>