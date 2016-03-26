<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require('fpdf17/fpdf.php');

class Pdf extends FPDF
{
  function __construct($orientation='P', $unit='mm', $size='A4') {
    parent::__construct($orientation,$unit,$size);
  }

  public function setHeader($cabecalho) {
  	$this->cabecalho = $cabecalho;
  }

  public function Header() {
  	date_default_timezone_set('America/Sao_Paulo');
  	$this->SetFont('Arial', 'B', 12);
    $logo = 'assets/uploads/empresas/'.$this->cabecalho['logo'];
    if(file_exists($logo)) {
      $this->Image($logo);
    }
    $this->SetXY(12, 10);
    $this->Cell(0, 15, 'EVOLUÇÃO MÉDICA', 0, 1, 'C');
    $this->SetY(30);
    $this->Cell(0,0, '', 'B', 1, 'C');
    $this->Ln(4);

    //Dados do paciente
    $this->SetFont('Arial','',9);
    $this->Write(5,'Nº Atend: '.$this->cabecalho['num_atend']);
    $this->SetX(110);
    $this->Write(5,'Data: '.date('d/m/Y H:i'));
    $this->Ln();
    $this->Write(5,'Paciente: '.$this->cabecalho['nome_paciente']);
    $this->SetX(110);
    $this->Write(5,'Dt. Nascimento - Idade: '.$this->cabecalho['dt_nasc'].' - '.$this->cabecalho['idade'].' anos');
    $this->Ln();
    $this->Write(5,'Médico Internação: '.$this->cabecalho['medico_internacao']);
    $this->SetX(110);
    $this->Write(5,'CID: '.$this->cabecalho['cd_cid']);
    $this->Ln();
    $this->Write(5,'Médico Assistente: '.$this->cabecalho['medico_assistente']);
    $this->Ln();
    $this->Ln(4);

    $this->Cell(0, 0, '', 'B', 1, 'C');
    $this->Ln(8);
  }
}
