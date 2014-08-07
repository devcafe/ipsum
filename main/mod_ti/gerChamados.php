<!-- Javascript -->
<script src="mod_ti/resources/js/gerChamados.js"></script>

<!-- CSS -->
<link rel="stylesheet" href = "mod_ti/resources/css/gerChamados.css?1">

<div class = "formInner">
	<div class = "chamadosBG">
		<legend> Chamados </legend>
		<div class = "painel">
			<a href="#" id="gerCadChamado"> Abrir um chamado novo</a>
				<div class = "filtro">
					<form method = "post">
						<div class = "filtro01">
							<label for = "exibir"> Exibir: </label>
							<select name = "exibirFiltro" id = "exibirFiltro">
								<option value = "Todos"> Todos(menos fechados) </option>	
								<option value = "Aberto"> Aberto </option>
								<option value = "Fechado"> Fechado </option>
								<option value = "Aguardando"> Aguardando </option>
								<option value = "Analise"> Em analise </option>
							</select>	
						</div>
					</form>
				</div>
		</div>
		<div id = "listaChamados">
			
		</div>
	</div>
</div>

<!-- Modals -->
<!-- Adicionar descrição -->
<div id = "descricaoModal" title = "Adicionar comentario">
	<textarea id = "novoComentarioChamado"> </textarea>
	<input type = "hidden" id = "idHiddenChamado">

	<div class = "area01">
		<label for = "prioridade"> Prioridade: </label>
		<select name = "prioridade" id = "prioridade">
			<option value = "Critica"> Critica </option>
			<option value = "Alta"> Alta </option>
			<option value = "Media"> Media </option>
			<option value = "Baixa"> Baixa </option>
		</select>

		<label for = "status"> Status: </label>
		<select name = "status" id = "status">
			<option value = "Aberto"> Aberto </option>
			<option value = "Fechado"> Fechado </option>
			<option value = "Aguardando"> Aguardando </option>
			<option value = "Analise"> Em analise </option>
		</select>	
	</div>

	<input type = "button" name = "addNovoComentario" id = "addNovoComentario" value = "Adicionar comentario">


</div>
