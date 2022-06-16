$(document).ready(function(){
    //Aqui ele pega o atributo data-confirm (data-confirm = "mensagem de confirmação") que também esta no link que ele colocou no index
    //Depois de clicar ele vai receber o que está no href do index 
    $('a[data-confirm]').click(function(){
 
        //Criando a var que recebe o caminho do href 
        var href = $(this).attr('href');
 
        //checa algo para ver se a aba do modal já abriu
        if(!$('#confirm-delete').length){
            //Insere o modal "confirm-delete" no body
            //Append = atribuir janela modal que estiver nesse local
            $('body').append('<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><h4>Excluir usuário</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body">Tem certeza que deseja excluir o usuário selecionado?</div><div class="modal-footer"><button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button><a class="btn btn-danger text-white" id="dataComfirmOK">Apagar</a></div></div></div></div>');
        }
        //Id do link que ele criou dentro do modal, ela atribui no href a var href (var que criou anteriormente)
        //Portanto, se ele clicar nesse link ele será redirecionado para "deleta_usuario.php" que faz a remoção do usuário
        $('#dataComfirmOK').attr('href', href);
 
        //Abre o modal que ele criou no body
        $('#confirm-delete').modal({show: true});
 
        return false;
    });
});