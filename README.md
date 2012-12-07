Projeto Magento Offline - Módulo para colocar seus projeto temporariamente em offline
=================

Bem sabe aquela hora que precisamos mexer na programação do Magento e exatamente nessa hora tem alguém tentando comprar algo? Bem depois de me deparar várias vezes nessa situação resolvi implementar algo simples que coloca-se o Magento Offline para os Clientes com uma frase tipo "Em manutenção!" e que eu conseguisse paralelamente mexer no desenvolvimento dele.

Ou seja, basicamente esse módulos exatamente isso, ele coloca o seu site offiline para seus clientes enquanto você atualiza algo em seus scripts. Ele te reconhece e não exibe a página de manutenção para você, sabe como? Basta estar logado na admin do Magento que as páginas serão exibidas normalmente para vc. Ainda se tem a possibilidade de exibir um alerta de site offline para o administrador ou não.

Ele trabalha antes do carregamento de qualquer outro módulo ou theme do Magento, setando o seu status como 503 para os monitores de buscas, fazendo com que você não perca a posição nos monitores de busca.

Versões
=================
Ele funciona tanto para Magento Community tanto para a versão Enterprise! A partir da versão 1.4+

Obs: Esse módulo também funciona com múltiplas lojas do Magento!

Demostração
=================
A demostração online de seu funcionamento pode ser visualizada em: http://onestepcheckout.com.br/final3/magento-1.5.1.0/

Para testar a administração: http://onestepcheckout.com.br/final3/magento-1.5.1.0/admin
login: demo
senha: demo123

Você verá uma mensagem padrão que pode ser personalizada, algo +/- assim:
http://onestepcheckout.com.br/MagentoOffline/onestepcheckout.com.br-final3-magento-1.5.1.0-.png

Existe a possibilidade de editar o html apresentado nessa página inicial pela administração do módulo!

