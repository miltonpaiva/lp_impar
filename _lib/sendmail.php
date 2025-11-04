<?php
/**
* SEND MAIL
* Desenvolvedor: Darmison Fonteles
*/

class sendmail_wp {

    /**
    * Send mail to subscriber
    * @param $message string
    * @param $to string
    * @return boolean
    *
    * @author jovanepires
    */

    public function send_mail($nome, $email, $empresa, $fone, $estado, $cidade, $cargo, $msg) {

      $to       = 'darmisonfontelesdev@gmail.com';
      $subject  = "Nova Cotação: ".$fone;
      $subject  = utf8_decode($subject);

      //To send HTML mail, the Content-type header must be set
      $headers  = 'MIME-Version: 1.0' . "\r\n";
      $email_sistema = 'darmisonfontelesdev@gmail.com';
      $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
      $headers .= 'Reply-To: '.$email. "\r\n";
      // $headers .= 'Cc: '.$email. "\r\n";
      //Additional headers
      $headers .= 'From: '.$email_sistema."\r\n";
      $fonts    = "'Open Sans'";

      $produtos = '';
      $cart     = $_SESSION['carrinho'];

      foreach($cart as $id => $qtd){

      $cod       = get_post_meta($id, "equipamento_desc", true);
      //$codbarras = get_post_meta($id, "wpcf_cod_barras", true);
      $thumb     = wp_get_attachment_image_src(get_post_thumbnail_id($id), 'thumbnail' );
      $url       = $thumb['0'];

          if(has_post_thumbnail($id)) :
            $produtos .= '<tr style="border-bottom: 1px solid #f5f5f5;"><td width="55" align="center" valign="middle" style="padding-top: 6px;"><img style="border: 1px solid #ccc;" src="'.$url.'" width="50px" height="50px" alt="'.get_the_title().'" title="'.get_the_title().'" /></td><td width="2" height="62" align="center" valign="middle">&nbsp;</td><td width="258" align="left">'.get_the_title($id).'</td><td width="91" align="center">'.$cod.'</td><td width="67" align="center"> '.$qtd.'</td></tr>';

          else :
            $produtos .= '<tr style="border-bottom: 1px solid #f5f5f5;"><td width="55" align="center" valign="middle" style="padding-top: 6px;"><img src="'.get_template_directory_uri().'/assets/images/noimage-50x50.jpg" width="50px" height="50px" alt="'.get_the_title().'" title="'.get_the_title().'" /></td><td width="2" height="62" align="center" valign="middle">&nbsp;</td><td width="258" align="left">'.get_the_title($id).'</td><td width="91" align="center">'.$cod.'</td><td width="67" align="center"> '.$qtd.'</td></tr>';
          endif;
      }

    if($msg) {
        $block_msg = '<tr><td style="font-size: 12px; color: #001781;">&nbsp;</td><td>&nbsp;</td></tr><tr><td colspan="2" style="font-size: 12px; color: #001781; text-align: center;"><strong>Observações</strong></td></tr><tr><td height="34" colspan="2" style="font-size: 14px; color: #333; text-align: center;">'.$msg.'</td></tr>';
    }

      //Body
      $body       = '<html><link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,700,300,600,400" rel="stylesheet" type="text/css" />';
$body       .= '<body style="font-family: '.$fonts.', serif !important;color: #333;">';
$body       .= '<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" rules="all" style="text-align:center;background: #f5f5f5;"><tr>
  <td height="296" align="center" valign="top"><br>
    <table width="60%" border="0" align="center" cellpadding="0" cellspacing="0"><tr><td valign="top"><table width="100%" border="0"  align="center" cellpadding="10" cellspacing="0" style="background: #fff;border-top: 5px solid #001781;"><tr>
      <td style="text-align: center"><a href="http:/casamagalhaes.cvtt.com.br" target="_blank"><img src="https://www.convertte.com.br/cvtt/wp-content/uploads/2019/01/Grupo-Casa-Magalhaes.png" alt="Casa Magalhães" width="125" height="85"/></a></td></tr>
  <tr>
    <td colspan=2>
    <table width="100%" border="0" cellspacing="2" cellpadding="2"  style="font-size: 14px; color: #333;">
      <tr>
        <td colspan="2" style="font-size: 12px; color: #001781; font-weight: bold; text-align: center;"><h3>Informações da Cotação</h3></td>
      </tr>
      <tr>
        <td style="font-size: 12px; color: #001781;">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td width="17%" style="font-size: 12px; color: #001781;"><strong>Nome: </strong></td>
        <td width="83%">'.$nome.'</td>
      </tr>
      <tr>
        <td style="font-size: 12px; color: #001781;"><strong>E-mail:</strong></td>
        <td>'.$email.'</td>
      </tr>
      <tr>
        <td style="font-size: 12px; color: #001781;"><strong>Empresa:</strong></td>
        <td>'.$empresa.'</td>
      </tr>
      <tr>
        <td style="font-size: 12px; color: #001781;"><strong>Estado:</strong></td>
        <td>'.$estado.'</td>
      </tr>
      <tr>
      <td style="font-size: 12px; color: #001781;"><strong>Cidade:</strong></td>
        <td>'.$cidade.'</td>
      </tr>
      <tr>
        <td style="font-size: 12px; color: #001781;"><strong>Telefone:</strong></td>
        <td>'.$fone.'</td>
      </tr>
      <tr>
        <td style="font-size: 12px; color: #001781;"><strong>Cargo</strong></td>
        <td>'.$cargo.'</td>
      </tr>
      <tr>
        <td style="font-size: 12px; color: #001781;"><strong>Observações</strong></td>
        <td>'.$msg.'</td>
      </tr>
    </table></td>
  </tr>
  <tr>
  <td style="text-align: center; font-size: 14px;" colspan=2><p style="color: #001781; font-weight: bold !important;"><span style="text-align: center">Confira a lista de produtos solicitados</span>:</p></td></tr>
              <tr>
                <td style="text-align: center" colspan=2>
                <table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-size: 14px; color: #001781;">
                <tr style="color: #fff; border-bottom: 2px solid #001781">
                  <td width="55" height="35" align="center" valign="middle" bgcolor="#001781"><strong>FOTO</strong></td>
                  <td width="2" height="35" align="center" valign="middle" bgcolor="#001781">&nbsp;</td>
                  <td width="258" height="35" align="center" valign="middle" bgcolor="#001781"><strong>PRODUTO</strong></td>
                  <td width="91" height="35" align="center" valign="middle" bgcolor="#001781"><strong>REF</strong></td>
                  <td width="67" height="35" align="center" valign="middle" bgcolor="#001781"><strong>QTD</strong></td>
                </tr>'.$produtos.'</table></td>
              </tr>
              <tr>
    <td height="34" colspan=2 style="color: #ab5a30;text-align: center; font-size: 10px; height: 12px;">&nbsp;</td></tr></table></td></tr><tr><td height="29" valign="top">&nbsp;</td></tr><tr><td height="14" align="center" valign="top"><p style="line-height: 15px !important; font-size:13px;"><b style="color: #3d4197;">Casa Magalhães</b><br>
      <span style="color: #3d4197; margin-top: 5px; margin-bottom: 10px; float: left; width: 100%;">comercial@casamagalhaes.com.br<br>
      (85) 9999.9999 </span></p></td></tr><tr><td height="15" align="center" valign="top">&nbsp;</td></tr></table></td></tr></table>';
$body       .= '</body></html>';
      //Mail it
      return (int) mail($to, $subject, $body, $headers);
    }
}