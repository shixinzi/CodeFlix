<?php
namespace CodeFlix\Forms;

use Kris\LaravelFormBuilder\Form;

class VideoUploadForm extends Form
{
    public function buildForm()
    {
        $this->add('thumb','file',[
                'required' => false,
                'label' => 'Capa',
                'rules' => 'image|max:2048',
            ]);

        $this->add('file','file',[
                'required' => false,
                'label' => 'Arquivo de vídeo',
                'rules' => 'mimetypes:video/mp4',
            ]);
        $this->add('duration','text',[
                'label' => 'Duração',
                'rules' => 'required|integer|min:1',
            ]);
    }
}