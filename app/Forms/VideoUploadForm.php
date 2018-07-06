<?php

namespace CodeFlix\Forms;

use Kris\LaravelFormBuilder\Form;

class VideoUploadForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('thumb', 'file', [
                'required' => false,
                'label' => 'Thumbnail',
                'rules' => 'image|max:1024'
            ])
            ->add('file', 'file', [
                'required' => false,
                'label' => 'Arquivo de vídeo',
                'rule' => 'mimetypes:video/mp4'
            ]);
    }
}
