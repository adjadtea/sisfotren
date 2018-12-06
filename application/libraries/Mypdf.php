<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mypdf extends TCPDF{
	private $headerText;
	public function __construct($param){
		$this->CI =& get_instance();
		parent::__construct($param['orientasi'],$param['unit'],$param['size']);
		
		$this->SetCreator('AKHJAT JUNAJAT');
		$this->SetAuthor('AKHJAT JUNAJAT');
		$this->SetTitle('SISTEM INFORMASI PONDOK PESANTREN, '.$this->config->item('client_name'));
		$this->SetSubject('SISTEM INFORMASI PONDOK PESANTREN, '.$this->config->item('client_name'));
		$this->SetKeywords('SISFO-PONTREN, '.$this->config->item('client_name'));
		
		$this->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$this->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
		
		$this->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$this->SetHeaderMargin(PDF_MARGIN_HEADER);
		$this->SetFooterMargin(PDF_MARGIN_FOOTER);
		
		$this->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
		$this->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
		$this->setImageScale(PDF_IMAGE_SCALE_RATIO);
		$this->SetFont('dejavusans', '',6);
	}
	public function Header() {
		$image_file = K_PATH_IMAGES.'logo.jpg';
		$text1 = '<h5 align="center">'.$this->config->item('client_name').'</h5>';
		$text2 = '';
		$text3 = '<div align="center">'.
			'<small>'.
			$this->config->item('client_address').
			'</small>'.
			'</div>';
		$header = '<table width="85%" align="center">'.
			'<tr>'.
				'<td width="100%" style="vertical-align:middle;">'.
					'<h3>'.$this->config->item('client_name').'</h3><br/>'.
					'<br>'.
					'<small>'.$this->config->item('client_address').'</small>'.
				'</td>'.'</tr>'.'</table>';
		//Image($file, $x='', $y='', $w=0, $h=0, $type='', $link='', $align='', $resize=false, $dpi=300, $palign='', $ismask=false, $imgmask=false, $border=0, $fitbox=false, $hidden=false, $fitonpage=false, $alt=false, $altimgs=array()) {
		$this->Image($image_file, 15, 5, 15, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
		$this->SetFont('dejavusans', '', 11);
		$this->MultiCell(0, 15, $header, 0, 'C', false, 1, '', '', true, true, true, true, 0);
    }
	public function Footer() {
		$this->SetY(-15);
		$this->SetFont('dejavusans', 'I', 8);
		$this->Cell(0, 8, 'Hal. '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
		$this->Cell(0, 8, 'SIMPEG', 0, false, 'R', 0, '', 0, false, 'T', 'M');
	}
}

/* End of file mypdf.php */
/* Location: ./application/libraries/mypdf.php */