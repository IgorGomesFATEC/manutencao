<?php
//header
include_once 'includes/header.php';
?>
<div class="container">
<form id='form-add'>
	<div class="row">
	<div class="col s12">
		<h5 class="center">Peças utilizadas</h5>
		<div class="row">
		    <div class="col s12">
		      <div class="row">
		        <div class="input-field col s6">
		          <i class="material-icons prefix">search</i>
		          <input type="text" id="pecas" class="autocomplete">
		          <label for="pecas">Autocomplete</label>
		        </div>
		     		<div class="row">
					<div class="input-field col s6">
						<i class="material-icons prefix">textsms</i>
	          			<input id="descricao" type="text" class="validate materialize-textarea">
	          			<label for="descricao">Descrição do serviço</label>
	        		</div>
				</div>
				<div class="row">
					<button class="btn waves-effect waves-light right" type="submit" name="btn-concluir">adicionar peça
	    				<i class="material-icons right">add</i>
	 				</button>
				</div>
		      </div>
		    </div>
		  </div>
		</div>
	</div>
</form>
	<div class="col s12 center"><h5>Peças selecionadas</h5></div>
	 <table class="highlight centered">
	        <thead>
	          <tr>
	              <th>Marca</th>
	              <th>Modelo</th>
	              <th>Descrição</th>
	          </tr>
	        </thead>

	        <tbody>
	        	<?php

	        	?>
	          <tr>
	            <td></td>
	            <td></td>
	            <td></td>
	            <td></td>
	          </tr>
	      <?php  ?>
	        </tbody>
	      </table>

</div>
<?php
include_once 'includes/footer.php'
?>
<script type="text/javascript">
//TODO tentar alimentar a tabela com ajax
$(document).ready(function(){
    $('#pecas').autocomplete({
	source: 'get-pecas.php',
	data:{
		for (i = 0) {
			Things[i]
		},
	},
  });
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