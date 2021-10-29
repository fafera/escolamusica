<?php
namespace App\Services;

use PDF;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Repositories\ProfessorRepository;

class ExportarAulasService {
    protected $mes, $ano;
    protected $defaultDay = 1;
    protected $path = "public/pdf/";

    public function __construct(ProfessorRepository $professorRepository)
    {
        $this->professorRepository = $professorRepository;
    }
  
    private function setData($mes, $ano) {
        $this->mes = $mes;
        $this->ano = $ano;
    }

    public function export($mes, $ano) {
        $this->setData($mes, $ano);
        
        $professores = $this->professorRepository->all();
        $arquivosPDF = collect();
        foreach($professores as $professor) {
            $aulasPorAluno = $this->getAulasPorAlunoProfessor($professor);
            $corpo = $this->montarCorpoPDF($aulasPorAluno);
            $corpo->professor = $professor;
            $arquivosPDF->push($this->gerarPDF($corpo));       
        }
        $zip = $this->gerarZIP($arquivosPDF);
        return $zip;
        //Professores

        //Aulas do professor no mes

        //Formatar PDF

        //Exportar arquivo
    }
    private function gerarZIP($arquivosPDF) {
        $zipFile = Storage::path('public/zip/').'relatorios-'.$this->mes.'-'.$this->ano.'.zip';
        $zip = new \ZipArchive();
        $zip->open($zipFile, \ZipArchive::CREATE | \ZipArchive::OVERWRITE);

        foreach($arquivosPDF as $arquivo) {
            $zip->addFile(Storage::path($arquivo['path'].$arquivo['filename']), $arquivo['filename']);
        }
        $zip->close();
        return $zipFile;
        /*$zip->close();
        Storage::put($this->path.$zip_file, $zip_file); */
        
    }
    private function montarCorpoPDF($aulasPorAluno) {
        $corpo = collect();

        foreach($aulasPorAluno as $aulasAluno) {
            $relatorioAluno = collect();
            $relatorioAluno->nome = $aulasAluno->first()->aluno->nome;
            if(isset($aulasAluno->first()->matricula)) {
                $relatorioAluno->curso = $aulasAluno->first()->matricula->curso->titulo;
                $relatorioAluno->duracao = $aulasAluno->first()->matricula->modalidade->duracaoBRTime;
            }
            $relatorioAluno->aulas = collect();
            foreach($aulasAluno->sortBy('data') as $aula) {
                $aulaInfo = collect();
                $aulaInfo->data = $aula->dataBR;
                $aulaInfo->status = $aula->statusFormatado; 
                if($aula->tipo == 'teste') {
                    $aulaInfo->aulaTeste =  "Aula teste";
                }
                $aulaInfo->descricao = $aula->descricao;
                $relatorioAluno->aulas->push($aulaInfo);   
            }
            $corpo->push($relatorioAluno);
        }
        return $corpo;
    }
   
    private function gerarPDF($corpo) {
        $nomeArquivo = $this->getNomeArquivo($corpo);
        $pdfFile['path'] = $this->path;
        $pdfFile['filename'] = $nomeArquivo;
        $pdf = PDF::loadView('pdf/relatorio', ['info' => $corpo]);
        $pdfFile['content'] = Storage::put($this->path.$nomeArquivo, $pdf->output() );
        /* if(!Storage::exists($this->path.$nomeArquivo)) {
            $pdf = PDF::loadView('pdf/relatorio', ['info' => $corpo]);
            $pdfFile['content'] = Storage::put($this->path.$nomeArquivo, $pdf->output() );
        } else {
            $pdfFile['content'] = Storage::get($this->path.$nomeArquivo);
        } */
        return $pdfFile;
    }
    private function getNomeArquivo($corpo) {
        return Str::of($corpo->professor->nome)->slug('-')."-".$this->mes."-".$this->ano.".pdf";
    }
    private function getAulasPorAlunoProfessor($professor) {
        $data = Carbon::createFromFormat('Y-m', $this->ano."-".$this->mes);
        /* $aulas = $professor->aulas->merge($professor->aulasTeste)->whereBetween('data', [$data->firstOfMonth()->format('Y-m-d'), $data->lastOfMonth()->format('Y-m-d')]); */
        $aulas = $professor->aulas()->doMes($this->mes, $this->ano)->concat($professor->aulasTeste()->doMes($this->mes, $this->ano));
        
        $aulas = $aulas->sortBy(function($aula) {
            return $aula->aluno->nome;
        });
        $aulas = $aulas->groupBy('id_aluno');
        
        return $aulas;
    }

}
