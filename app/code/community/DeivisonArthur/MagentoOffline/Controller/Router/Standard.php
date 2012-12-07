<?php

/*=========================================================================================================================================================
 *
 *  PROJETO Magento Offline V2.0
 *  +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
 *  O módulo One Step Checkout normatizado para a localização brasileira.
 *  site do projeto: http://onestepcheckout.com.br/MagentoOffline/
 *  +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
 *
 *
 *
 *  Mantenedores do Projeto:
 *  +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
 *
 *  Deivison Arthur Lemos Serpa
 *  deivison.arthur@gmail.com
 *  www.deivison.com.br
 *  (21)9203-8986
 *
 *  Denis Colli Spalenza
 *  http://www.xpdev.com.br
 *
 *  +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
 *
 *
 *
 *  GOSTOU DO MÓDULO?
 *  +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
 *  Se você gostou, se foi útil para você, se fez você economizar aquela grana pois estava prestes a pagar caro por aquele módulo pago, pois não achava um
 *  solução gratuita que te atendesse e queira prestigiar o trabalho feito efetuando uma doação de qualquer valor, não vou negar e vou ficar grato, você
 *  pode fazer isso visitando a página do projeto em: http://onestepcheckout.com.br/MagentoOffline/
 *  +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
 *
/*=========================================================================================================================================================
 */


class DeivisonArthur_MagentoOffline_Controller_Router_Standard extends Mage_Core_Controller_Varien_Router_Standard
{
     
    public function match(Zend_Controller_Request_Http $request)
    {
		 
		$storeenabled = Mage::getStoreConfig('MagentoOffline/settings/enabled', $request->getStoreCodeFromPath());
		if ($storeenabled)
		{  
			Mage::getSingleton('core/session', array('name' => 'adminhtml'));
			if (!Mage::getSingleton('admin/session')->isLoggedIn())
			{  
				Mage::getSingleton('core/session', array('name' => 'front'));
				
				$front = $this->getFront();
				$response = $front->getResponse();
			    $response->setHeader('HTTP/1.1','503 Service Temporarily Unavailable');
				$response->setHeader('Status','503 Service Temporarily Unavailable');
				$response->setHeader('Retry-After','5000');
	 			$htmlGen = Mage::getStoreConfig('MagentoOffline/settings/message', $request->getStoreCodeFromPath()).'<div style="width: 100%;text-align: center;height: 14px; position: fixed; margin-left: 0px; bottom: 30px; "><a style="color:#aaa;text-decoration: none;" href="http://onestepcheckout.com.br/MagentoOffline" target="_blank"><img src="http://onestepcheckout.com.br/MagentoOffline/logop.png" style="border:none; margin-right:3px;"/><strong>Magento</strong>Offline</a>';
				$response->setBody(html_entity_decode( $htmlGen , ENT_QUOTES, "utf-8" ));
				$response->sendHeaders();
				$response->outputBody();
				
				exit;
			}
			else
			{				
				$showreminder = Mage::getStoreConfig('MagentoOffline/settings/showreminder', $request->getStoreCodeFromPath());
				if ($showreminder)
				{
					$front = $this->getFront();
					$response = $front->getResponse()->appendBody('<div style="height:50px; background:red; color: white; position:fixed; bottom:0px; width:99.50%;padding:3px; z-index:100000;text-trasform:capitalize;"><h2 style="color: #fff;">Seu shop esta Offline!</h2><label style="font-size: 12px">Obs: Voc&ecirc; somente esta visualizando essa p&aacute;gina porque esta logado na administr&ccedil;&atilde;o do Magento!</label></div>');
				}
			}
		}
		return parent::match($request);
        
    }

    
   
}