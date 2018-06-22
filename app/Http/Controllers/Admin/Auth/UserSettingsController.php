<?php

namespace CodeFlix\Http\Controllers\Admin\Auth;

use CodeFlix\Forms\UserSettingsForm;
use CodeFlix\Repositories\UserRepository;
use Illuminate\Http\Request;
use CodeFlix\Http\Controllers\Controller;
use Kris\LaravelFormBuilder\Form;

class UserSettingsController extends Controller
{
    /**
     * @var UserRepository
     */
    private $repository;

    /**
     * UserSettingsController constructor.
     */
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }


    public function edit()
    {
        /** @var Form $form */
        $form = \FormBuilder::create(UserSettingsForm::class, [
            'url' => route('admin.user_settings.update'),
            'method' => 'PUT'
        ]);

        return view('admin.auth.settings', compact('form'));
    }


    public function update(Request $request)
    {
        /** @var Form $form */
        $form = \FormBuilder::create(UserSettingsForm::class);

        if (!$form->isValid()){
            return redirect()
                ->back()
                ->withErrors($form->getErrors())
                ->withInput();
        }
        $data = $form->getFieldValues();
        $this->repository->update($data,\Auth::user()->id);
        $request->session()->flash('message', 'Senha alterado com sucesso.');
        return redirect()->route('admin.user_settings.edit');
    }

}
