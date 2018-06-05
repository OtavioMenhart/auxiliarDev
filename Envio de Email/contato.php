<div class="col-md-6">	
                    <form id="form" name="form" accept-charset="utf-8"> 
                    	<div class="row">
                            <div class="col-md-12">	
                                <label>Nome Completo:</label>
                                <input class="required" name="nome" id="nome" type="text"/>
                            </div>  
                        </div>
                    	<div class="row">
                            <div class="col-md-6">	
                                <label>E-mail:</label>
                                <input class="required" name="email" id="email" type="email"/>
                            </div> 
                            <div class="col-md-6">	
                                <label>Tel. Fixo ou Celular:</label>
                                <input class="required" name="telefone" id="telefone" onKeyPress="mascara(this,tel)" minlength="13" maxlength="14" type="tel"/>
                            </div> 
                        </div>
                    	<div class="row">
                            <div class="col-md-12">	
                                <label>Assunto:</label>
                                <select class="required" name="assunto" id="assunto">
                                    <option value="">SELECIONAR</option>
                                    <option value="Dúvida">Dúvida</option>
                                    <option value="Serviços">Serviços</option>
                                    <option value="Críticas ou Sugestões">Críticas ou Sugestões</option>
                                    <option value="Outros">Outros</option>
                                </select> 
                        	</div>
                        </div>
                    	<div class="row">
                            <div class="col-md-12">	
                                <label>Mensagem:</label>
                                <textarea class="required" name="mensagem" id="mensagem"></textarea>
                            </div> 
                            <div class="col-md-12">	
                                <button name="bt_enviar" id="bt_enviar" type="submit" class="btn_contato">
                                    <i class="fa fa-envelope-o"></i> Enviar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <script>

                $(document).ready(function(){
                    $('#form').submit(function(){
                        event.preventDefault();
                        $('#bt_enviar').prop("disabled",true);
                        $('#bt_enviar').html('<i class="fa fa-envelope-o"></i> Enviando');
                        var nome = $('#nome').val();
                        var email = $('#email').val();
                        var telefone = $('#telefone').val();
                        var assunto = $('#assunto').val();
                        var mensagem = $('#mensagem').val();

                        $.post('mail.php',{
                            enviar:'ok',
                            nome:nome,
                            email:email,
                            telefone:telefone,
                            assunto:assunto,
                            mensagem:mensagem
                            },function(data,status){
                                if(status=='success'){
                                    $('#nome').val('');
                                    $('#email').val('');
                                    $('#telefone').val('');
                                    $('#assunto').val('');
                                    $('#mensagem').val('');
                                    alert("E-mail enviado com sucesso");   
                                    $('#bt_enviar').prop("disabled",false);
                                    $('#bt_enviar').html('<i class="fa fa-envelope-o"></i> Enviar');                             
                                }
                                else{
                                    alert("Erro ao enviar o e-mail");
                                }
                            });
                    
                    }); 
                });
            </script>