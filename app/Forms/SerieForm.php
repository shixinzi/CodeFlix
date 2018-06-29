<?php

namespace CodeFlix\Forms;

use Kris\LaravelFormBuilder\Form;

class SerieForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('title', 'text', [
                'label' => 'Título',
                'rule' => 'required|max:255'
            ])
            ->add('description', 'textarea', [
                'label' => 'Descrição',
                'rule' => 'required|max:255'
            ])
            ->add('thumb_file', 'file', [
                'label' => 'Thumbnail',
                'rule' => 'required|image|max:1024'
            ]);
    }
}
